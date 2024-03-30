<?php
namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Question\ConfirmationQuestion;

use Sensio\Bundle\GeneratorBundle\Manipulator\ConfigurationManipulator;
use Sensio\Bundle\GeneratorBundle\Manipulator\KernelManipulator;
use Sensio\Bundle\GeneratorBundle\Manipulator\RoutingManipulator;
use Sensio\Bundle\GeneratorBundle\Model\Bundle;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class StatsCommand extends Command
{
    private $output;

    private $em = null;
    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface){
        $this->containerInterface = $containerInterface;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:stats')
            ->setDescription('Stats overview')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->containerInterface->get('doctrine.orm.entity_manager');

        $output->writeln('Amount stats:');
        $output->writeln('');
        $output->writeln('Amount of settings: <info>' . count($this->em->getRepository('CmsBundle:Settings')->findAll()) . '</info>');
        $output->writeln('Amount of users   : <info>' . count($this->em->getRepository('CmsBundle:User')->findAll()) . '</info>');
        $output->writeln('Amount of pages   : <info>' . count($this->em->getRepository('CmsBundle:Page')->findAll()) . '</info>');
        $output->writeln('');

        $headers = [
            'ID',
            'Title',
            'Lang ID',
            'Language',
            'Host',
            'Site key',
            'Base URI',
            'Pages',
        ];

        $hasWebshop = false;
        if(file_exists(str_replace('CmsBundle/Command', 'Trinity/WebshopBundle/', __DIR__))){
            $hasWebshop = true;
        }

        if($hasWebshop){
            $headers[] = 'Webshop';
            $headers[] = 'Webshop config';
            $headers[] = 'B2B';
            $headers[] = 'Categories';
            $headers[] = 'Orders';
        }

        $rows = [];
        $sorted = [];
        foreach($this->em->getRepository('CmsBundle:Settings')->findAll() as $Settings){
            $siteid = 'x';//$Settings->getSiteKey();
            if(empty($sorted[$siteid])){
                $sorted[$siteid] = [];
            }
            $sorted[$siteid][] = $Settings;
        }

        foreach($sorted as $key => $settings_list){
            foreach($settings_list as $Settings){
                $row = [
                    $Settings->getId(),
                    $Settings->getLabel(),
                    $Settings->getLanguage()->getId(),
                    $Settings->getLanguage()->getLabel() . ' (' . strtoupper($Settings->getLanguage()->getLocale()) . ')',
                    (!empty($Settings->getHost() && $Settings->getHost() != 'null') ? $Settings->getHost() : ''),
                    $Settings->getSiteKey(),
                    $Settings->getBaseUri(),
                    ($Settings->getPages()->count() ? $Settings->getPages()->count() : '<error>0</error>'),
                ];

                if($hasWebshop){
                    $Webshop = $this->em->getRepository('TrinityWebshopBundle:Webshop')->findOneBy(['cms_settings' => $Settings]);
                    if($Webshop && $Webshop->getSettings()){
                        $row[] = '<info>YES</info> (' . $Webshop->getId() . ')';
                        $row[] = '<info>YES</info> (' . $Webshop->getSettings()->getId() . ')';
                        $row[] = ($Webshop->getSettings()->getB2b() ? '<info>YES</info>' : '<error>NO</error>');
                        $row[] = ($Webshop->getCategories()->count() ? $Webshop->getCategories()->count() : '<error>0</error>');
                        $row[] = ($Webshop->getOrders()->count() ? $Webshop->getOrders()->count() : '<error>0</error>');
                    }else{
                        $row[] = '<error>NO</error>';
                        $row[] = '';
                        $row[] = '';
                        $row[] = '';
                        $row[] = '';
                    }
                }

                $rows[] = $row;
            }
        }

        $output->writeln('Here is a list of all available settings');
        $output->writeln('');

        $table = new Table($output);
        $table->setHeaders($headers)->setRows($rows)->render();







        if ($hasWebshop) {
            $output->writeln('');
            $output->writeln('Product stats');
            $output->writeln('');

            $products = $this->em->getRepository('TrinityWebshopBundle:Product')->findAll();
            $products_count = count($products);
            $with_image        = 0;
            $type_simple       = 0;
            $type_configurable = 0;
            $type_grouped      = 0;
            $type_downloadable = 0;
            $type_digital      = 0;
            $visible           = 0;
            $without_image     = 0;
            foreach($products as $P){
                if($P->getMedia()->count()){
                    $with_image++;
                }

                if($P->getVisible()){
                    $visible++;
                }

                switch ($P->getType()) {
                    case 0: $type_simple++; break;
                    case 1: $type_configurable++; break;
                    case 2: $type_grouped++; break;
                    case 3: $type_downloadable++; break;
                    case 4: $type_digital++; break;
                }
            }


            $headers = [
                'Product count',
                'With images',
                'visible',
                'Simple',
                'Configurable',
                'Grouped',
                'Downloadable',
                'Digital',
            ];

            $rows = [[
                $products_count,
                $with_image,
                $visible,
                $type_simple,
                $type_configurable,
                $type_grouped,
                $type_downloadable,
                $type_digital,
            ]];

            $table = new Table($output);
            $table->setHeaders($headers)->setRows($rows)->render();

            $output->writeln('');
            $output->writeln('Order stats');
            $output->writeln('');

            $headers = [
                'Orders',
                'Paid',
                'Cancelled',
                'Open',
                'Invoice',
                'Finished',
            ];

            $rows = [[
                '-',
                '-',
                '-',
                '-',
                '-',
                '-',
            ]];

            $table = new Table($output);
            $table->setHeaders($headers)->setRows($rows)->render();
        }






        $output->writeln('');

        // $categories = $this->em->getRepository('TrinityWebshopBundle:Category')->findAll();

        /*$output->writeln('Cloning ' . count($products) . ' categories ...');
        $output->writeln('------------------------------------------------------------------------------------------------');
        $output->writeln('');

        

        $output->writeln('');
        $output->writeln('Done!');*/

        return Command::SUCCESS;
    }
}