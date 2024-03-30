<?php

namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\StringInput;

class CronTasksRunCommand extends Command {

    private $output;
    private $Container;

    public function __construct(ContainerInterface $Container){
        $this->Container = $Container;

        parent::__construct();
    }

    protected function configure() {
        $this
                ->setName('trinity:run')
                ->setDescription('Runs Cron Tasks if needed')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        $this->output = $output;
        $em = $this->Container->get('doctrine.orm.entity_manager');
        $translator = $this->Container->get('translator');
        $crontasks = $em->getRepository('CmsBundle:CronTask')->tasksActive();

        $size = count($crontasks);

        if ($size > 0) {
            $output->writeln('[' . date('Y-m-d H:i:s') . '] <comment>Running Cron Tasks...</comment>');
            // dump($crontasks);die();
            foreach ($crontasks as $CronTask) {

                $commands = $CronTask->getCommands();
                if(in_array('trinity:search:index', $commands) || in_array('trinity:webshop:index', $commands)){
                    // dump("IGNORE");
                }else{
                    if($CronTask->getRunning()) {
                        $nextrun = $CronTask->getNextRun();
    
                        $now = new \DateTime();
                        $now->modify('-1 day');
                        $reset = ($nextrun <= $now);
    
                        if ($reset) {
                            $CronTask->setRunning(false);
                            $em->persist($CronTask);
                            $em->flush();
                        }
                    }
    
                    if(!$CronTask->getRunning()){
                        $lastrun = $CronTask->getLastRun();
    
                        $nextrun = $CronTask->getNextRun();
                        $now = new \DateTime();
                        $run = ($nextrun <= $now);
    
                        if ($run) {
                            $output->writeln(sprintf('[' . date('Y-m-d H:i:s') . '] Running Cron Task "<info>%s</info>"', $CronTask));
    
                            // Set $lastrun for this crontask
                            $CronTask->setLastRun(new \DateTime());
                            $CronTask->setRunning(true);
    
                            $em->persist($CronTask);
                            $em->flush();
    
                            try {
                                $commands = $CronTask->getCommands();
    
                                if(!is_array($commands)){
                                    $commands = [$commands];
                                }
    
                                foreach($commands as $command){
                                    $output->writeln(sprintf('[' . date('Y-m-d H:i:s') . '] Executing command "<comment>%s</comment>"...', $command));
    
                                    // Run the command
                                    $this->runCommand($command);
    
                                    // Set running to false
                                    $CronTask->setRunning(false);
                                    $em->persist($CronTask);
                                    $em->flush();
    
                                    if($CronTask->getSingleRun()){
                                        $CronTask->setStatusTask(false);
                                        $em->persist($CronTask);
                                        $em->flush();
                                    }
    
                                    if($CronTask->getDeleteAfterRun()){
                                        $em->remove($CronTask);
                                        $em->flush();
                                    }
                                }
                            } catch (\Exception $e) {
                                $output->writeln('[' . date('Y-m-d H:i:s') . '] <error>ERROR</error>' . $e);
                            }
                        } else
                        {
                            $output->writeln(sprintf('[' . date('Y-m-d H:i:s') . '] Skipping Cron Task "<info>%s</info>", next run: ' . $nextrun->format('Y-m-d H:i:s'), $CronTask));
                        }
                    }else{
                        $output->writeln(sprintf('[' . date('Y-m-d H:i:s') . '] Cron Task "<info>%s</info>" is currently running...', $CronTask));
                    }
                }
            }
        }

        return Command::SUCCESS;
    }

    private function runCommand($string) {
        // explode namespace and arguments
        $namespace = explode(' ', $string)[0];

        // Set input
        $command = $this->getApplication()->find($namespace);
        $input = new StringInput($string);

        // Send all output to the console
        $returnCode = $command->run($input, $this->output);

        return $returnCode != 0;
    }

}
