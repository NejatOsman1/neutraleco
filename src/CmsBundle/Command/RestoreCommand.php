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

class RestoreCommand extends Command
{
    private $output;
    private $containerInterface;

    public function __construct(ContainerInterface $Container){
        $this->containerInterface = $Container;

        parent::__construct();
    }

    private $database_host     = null;
    private $database_port     = null;
    private $database_name     = null;
    private $database_user     = null;
    private $database_password = null;
    private $database_socket   = null;

    protected function configure()
    {
        $this
            ->setName('trinity:db:restore')
            ->setDescription('Restore database backup from file')
            ->addOption(
                'file',
                'f',
                InputOption::VALUE_OPTIONAL,
                'Filename to restore.',
                false
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dump_folder = $this->containerInterface->get('kernel')->getProjectDir() . '/var/backup/';

        if($input->getOption('file')){
            $f = $input->getOption('file');

            if(file_exists($dump_folder . $f)){
                $timestamp = filemtime($dump_folder . $f);

                $output->writeln('Restoring from file <info>' . $f . '</info> [' . date('Y-m-d H:i:s', $timestamp) . '] ...');

                // Get SQL data from config
                $this->database_host     = $this->containerInterface->getParameter('database_host');
                $this->database_port     = $this->containerInterface->getParameter('database_port');
                $this->database_name     = $this->containerInterface->getParameter('database_name');
                $this->database_user     = $this->containerInterface->getParameter('database_user');
                $this->database_password = $this->containerInterface->getParameter('database_password');
                $this->database_socket   = $this->containerInterface->getParameter('database_socket');

                $this->restoreDump($output, $dump_folder . $f);

                $output->writeln('Restoring done.');
            }else{
                $output->writeln('<error>Invalid file:    ' . $f . '</error>');
            }
        }else{
            // Show available dumps

            $output->writeln('Select one of the following dumps ...');
            $output->writeln('');
            $dumps = [];

            foreach(scandir($dump_folder) as $file){
                if(is_file($dump_folder . $file) && preg_match('/^.*?\.sql$/', $file)){
                    $dumps[filemtime($dump_folder . $file)] = $file;
                }
				if(is_file($dump_folder . $file) && preg_match('/^.*?\.sql.gz$/', $file)){
                    $dumps[filemtime($dump_folder . $file)] = $file;
                }
            }

            krsort($dumps);
            foreach($dumps as $timestamp => $file){
                $output->writeln(date('Y-m-d H:i:s', $timestamp) . '        <info>' . $file . '</info>');
            }

            $output->writeln('');
            $output->writeln('Run <info>bin/console trinity:db:restore -f file.sql</info> to start restore.');
        }

        return Command::SUCCESS;
    }

    protected function restoreDump($output, $f){
        $mysqli = new \mysqli($this->database_host, $this->database_user, $this->database_password, $this->database_name, $this->database_port, $this->database_socket);
        $mysqli->select_db($this->database_name);
        $mysqli->query("SET NAMES 'utf8'");
        $mysqli->query('SET FOREIGN_KEY_CHECKS=0');

        $output->writeln('');

        $output->writeln('Clearing data from existing tables ...');

        $queryTables    = $mysqli->query('SHOW TABLES');
        while($row = $queryTables->fetch_row()){ $mysqli->query("DELETE FROM `" . $row[0] . "`"); }

        $output->writeln('Importing from file ...');

		$finfo = finfo_open();
		$filetype = finfo_file($finfo, $f, FILEINFO_MIME_TYPE);

        $f = file_get_contents($f);

		if ($filetype == 'application/gzip') {
			$f = gzdecode($f);
		}

        $f = explode('-- -------------------------', $f);

        // dump($f);die();

        foreach($f as $sql){
            $mysqli->query($sql);
        }

        $mysqli->query('SET FOREIGN_KEY_CHECKS=1');
        $output->writeln('');
    }
}
