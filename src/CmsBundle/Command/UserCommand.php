<?php
namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\Output;

use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;
use App\CmsBundle\Entity\User;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Totp\TotpAuthenticatorInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserCommand extends Command
{
    private $output;
    private $username;
    private $email;
    private $password;
    private $super;
    private $Container;
    private $passwordHasher;
    private $totpAuthenticator;

    public function __construct(ContainerInterface $Container, UserPasswordHasherInterface $passwordHasher, TotpAuthenticatorInterface $totpAuthenticator)
    {
        $this->passwordHasher = $passwordHasher;
        $this->Container = $Container;
        $this->totpAuthenticator = $totpAuthenticator;

        parent::__construct();
    }

    /**
     * Initialize command params
     * 
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('trinity:user')
            ->setDescription('User actions for Trinity.')
            ->addArgument('action', InputArgument::OPTIONAL, 'Command to run.')
            ->addArgument('username', InputArgument::OPTIONAL, 'Username to run it on.')
            ->addArgument('email', InputArgument::OPTIONAL, 'Username to run it on.')
            ->addArgument('password', InputArgument::OPTIONAL, 'Username to run it on.')
            ->addOption(
                'super',
                's',
                InputOption::VALUE_NONE,
                'Super admin (omits role select)',
                null
            )
        ;
    }

    /**
     * Execute command
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return integer
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('');
        $action         = $input->getArgument('action');
        $this->username = $input->getArgument('username');
        $this->email    = $input->getArgument('email');
        $this->password = $input->getArgument('password');
        $this->super    = $input->getOption('super');

        if($action == 'create'){
            $this->createUser($input, $output);
        }else if($action == 'password'){
            $this->changePassword($input, $output);
        }else if($action == 'roles'){
            $this->changeRoles($input, $output);
        }else if($action == 'generate'){
            $this->generatePassword($input, $output);
        }elseif ('disable_2fa' == $action) {
            $this->disable2fa($input, $output);
        } elseif ('enable_2fa' == $action) {
            $this->enable2fa($input, $output);
        } elseif ('2fa_codes' == $action) {
            $this->generate2faCodes($input, $output);
        } else{
            $this->askWhatToDo($input, $output);
        }

        $output->writeln('');
        $output->writeln('Done!');
        $output->writeln('');

        return Command::SUCCESS;
    }

    /**
     * Add question when user doesnt supply an direct action
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return void
     */
    private function askWhatToDo($input, $output){
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            'What do you want to do? (defaults to <info>create</info>)',
            ['create', 'password', 'generate', 'disable_2fa', 'enable_2fa', '2fa_codes'],
            0
        );
        $question->setErrorMessage('Invalid option: %s.');

        $action = $helper->ask($input, $output, $question);
        if($action == 'create'){
            $this->createUser($input, $output);
        }else if($action == 'password'){
            $this->changePassword($input, $output);
        }else if($action == 'generate'){
            $this->generatePassword($input, $output);
        } elseif ('disable_2fa' == $action) {
            $this->disable2fa($input, $output);
        } elseif ('enable_2fa' == $action) {
            $this->enable2fa($input, $output);
        } elseif ('2fa_codes' == $action) {
            $this->generate2faCodes($input, $output);
        }
    }

    /**
     * Ask for username
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return void
     */
    private function requestUsername($input, $output){
        if(empty($this->username)){
            $helper = $this->getHelper('question');
            $question = new Question('Enter username: ', 'admin');
            $this->username = $helper->ask($input, $output, $question);
        }
    }

    /**
     * Show (hidden) password question
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return string
     */
    private function requestPassword($input, $output){
        if(!empty($this->password)){
            return $this->password;
        }
        $helper = $this->getHelper('question');
        $question = new Question('Enter password: ', 'admin');
        $question->setHidden(true);
        $question->setHiddenFallback(false);
        return $helper->ask($input, $output, $question);
    }

    /**
     * Show role selector (for new user)
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return string
     */
    private function selectRole($input, $output){ 
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            'Select role to assign (defaults to <info>user</info>)',
            ['user', 'admin'],
            1
        );
        $question->setErrorMessage('Invalid option: %s.');

        return $helper->ask($input, $output, $question);
    }

    /**
     * Create new user
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return void
     */
    private function createUser($input, $output){
        $this->requestUsername($input, $output);

        if(empty($this->username)){
            $output->writeln('<error>No username given.</error>');
        }else{

            $em = $this->Container->get('doctrine.orm.entity_manager');
            $User = $em->getRepository('CmsBundle:User')->findOneByUsername($this->username);
            if(!empty($User)){
                $output->writeln("\t" . '<error>User \'' . $this->username . '\' already exists...</error>');
            }else{
                $output->writeln('Creating new user with username <info>' . $this->username . '</info>...');

                $password = $this->requestPassword($input, $output);

                $User = new User();
                $User->setUsername($this->username);
                $User->setEmail((!empty($this->email) ? $this->email : $this->username));
                $User->setFirstname('');
                $User->setLastname('');
                $User->setEnabled(true);
                // $User->setEnabled(true);
                

                if($this->super){
                    // Is super amdin
                    $User->setRoles(['ROLE_USER', 'ROLE_SUPER_ADMIN']);
                }else{
                    $role = $this->selectRole($input, $output);
                    $User->setRoles(['ROLE_' . strtoupper($role)]);
                }

                $User->setPassword($this->passwordHasher->hashPassword($User, $password));
                
                $em->persist($User);
                $em->flush();

                $output->writeln("\t" . '<info>User created!</info>');
            }
        }
    }

    /**
     * Generate password
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return void
     */
    private function generatePassword($input, $output){
        $password = $this->requestPassword($input, $output);

        $output->writeln("\t" . '<info>' . $this->passwordHasher->hashPassword($User, $password) . '</info>');
    }

    /**
     * Change password for user
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return void
     */
    private function changePassword($input, $output){
        $this->requestUsername($input, $output);

        if(empty($this->username)){
            $output->writeln('<error>No username given.</error>');
        }else{

            $em = $this->Container->get('doctrine.orm.entity_manager');
            $User = $em->getRepository('CmsBundle:User')->findOneByUsername($this->username);
            if(empty($User)){
                $output->writeln("\t" . '<error>User \'' . $this->username . '\' doesn\'t exists...</error>');
            }else{
                $output->writeln('Changing password for user <info>' . $this->username . '</info>...');

                $password = $this->requestPassword($input, $output);

                $User->setPassword($this->passwordHasher->hashPassword($User, $password));
                
                $em->persist($User);
                $em->flush();

                $output->writeln("\t" . '<info>Password changed!</info>');
            }
        }
    }

    /**
     * Change roles for user
     * 
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     * 
     * @return void
     */
    private function changeRoles($input, $output){
        $this->requestUsername($input, $output);

        if(empty($this->username)){
            $output->writeln('<error>No username given.</error>');
        }else{

            $em = $this->Container->get('doctrine.orm.entity_manager');
            $User = $em->getRepository('CmsBundle:User')->findOneByUsername($this->username);
            if(empty($User)){
                $output->writeln("\t" . '<error>User \'' . $this->username . '\' doesn\'t exists...</error>');
            }else{
                $output->writeln('Current roles for user <info>' . $this->username . '</info>...');

                foreach($User->getRoles() as $role){
                    $output->writeln('<info>' . $role . '</info>');
                }
            }
        }
    }

    /**
     * Disable 2FA for user.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    private function disable2fa($input, $output): void
    {
        $this->requestUsername($input, $output);

        if (empty($this->username)) {
            $output->writeln('<error>No username given.</error>');
        } else {
            $em = $this->Container->get('doctrine.orm.entity_manager');
            $User = $em->getRepository('CmsBundle:User')->findOneByUsername($this->username);
            if (empty($User)) {
                $output->writeln("\t".'<error>User \''.$this->username.'\' doesn\'t exists...</error>');
            } else {
                $output->writeln('Disabling 2FA for user <info>'.$this->username.'</info>...');

                $User->setTotpEnabled(false);

                $em->persist($User);
                $em->flush();

                $output->writeln("\t".'<info>2FA disabled!</info>');
            }
        }
    }

    /**
     * Enable 2FA for user.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    private function enable2fa($input, $output): void
    {
        $this->requestUsername($input, $output);

        if (empty($this->username)) {
            $output->writeln('<error>No username given.</error>');
        } else {
            $em = $this->Container->get('doctrine.orm.entity_manager');
            $User = $em->getRepository('CmsBundle:User')->findOneByUsername($this->username);
            if (empty($User)) {
                $output->writeln("\t".'<error>User \''.$this->username.'\' doesn\'t exists...</error>');
            } else {
                $output->writeln('Enabling 2FA for user <info>'.$this->username.'</info>...');

                $User->setTotpEnabled(true);
                $User->setTotpSecret($this->totpAuthenticator->generateSecret());

                $em->persist($User);
                $em->flush();

                $output->writeln("\t".'<info>2FA enabled!</info>');
            }
        }
    }

    /**
     * Generate 2FA codes.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     */
    private function generate2faCodes($input, $output): void
    {
        $this->requestUsername($input, $output);

        if (empty($this->username)) {
            $output->writeln('<error>No username given.</error>');
        } else {
            $em = $this->Container->get('doctrine.orm.entity_manager');
            $User = $em->getRepository('CmsBundle:User')->findOneByUsername($this->username);
            if (empty($User)) {
                $output->writeln("\t".'<error>User \''.$this->username.'\' doesn\'t exists...</error>');
            } else {
                $output->writeln('Generate 2FA codes for user <info>'.$this->username.'</info>...');
                $output->writeln('');

                $hashes = [];
                for($i = 0; $i < 10; $i++){
                    $hash = strtoupper(substr(md5(rand(10000000,99999999) . md5(time()) . md5($User->getId()) . rand(10000000,99999999)), 0, 12));
                    $hashes[] = $hash;
                }

                $User->setBackUpCodes($hashes);
                $em->persist($User);
                $em->flush();

                foreach($hashes as $hash){
                    $output->writeln("\t".'- <info>' . $hash . '</info>');
                }
                $output->writeln('');
            }
        }
    }
}