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

class BackupCommand extends Command
{
    private $output;
    private $display           = false;
    private $data              = false;
    private $tables            = false;
    private $limit_days        = 14;
    private $prefix            = '';
    
    private $database_host     = null;
    private $database_port     = null;
    private $database_name     = null;
    private $database_user     = null;
    private $database_password = null;
    private $database_socket   = null;
    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface){
        $this->containerInterface = $containerInterface;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:db:backup')
            ->setDescription('Create backup from database')
            ->addArgument('prefix', InputArgument::OPTIONAL, 'Table prefix')
            ->addOption(
                'display',
                's',
                InputOption::VALUE_NONE,
                'Display the output on screen.'
            )
            ->addOption(
                'data',
                'd',
                InputOption::VALUE_NONE,
                'Only return data.'
            )
            ->addOption(
                'tables',
                't',
                InputOption::VALUE_NONE,
                'Only return tables.'
            )
            ->addOption(
                'limit',
                'm',
                InputOption::VALUE_OPTIONAL,
                'Delete backups after...'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->display    = ($input->getOption('display'));
        $this->data       = ($input->getOption('data'));
        $this->tables     = ($input->getOption('tables'));
        $this->limit_days = (int)($input->getOption('limit'));
        $this->prefix     = $input->getArgument('prefix');

        if(empty($this->limit_days)){
            $this->limit_days = 7;
        }

        /*
            CLEAR OLDER LOG FILES
         */

        $log_limit_days = 3; // 3 DAYS
        $logs_folder = $this->containerInterface->get('kernel')->getProjectDir().'/var/log/';
        $output->writeln('');
        $output->writeln('Checking log files <info>older then ' . $log_limit_days . ' days</info>...');
        $limit = strtotime('-' . $log_limit_days . ' DAY');
        $files = scandir($logs_folder);
        $n = 0;
        foreach($files as $df){
            if(is_file($logs_folder.$df)){
                if(filemtime($logs_folder.$df) < $limit){
                    $output->writeln("\t" . 'DELETE: <info>' . $logs_folder.$df . '</info>');
                    unlink($logs_folder.$df);
                    $n++;
                }
            }
        }
        if($n == 0){
            $output->writeln("\t" . 'No older log files found to delete.');
        }
        $output->writeln('');

        /*
            MOVING ON WITH BACKUP
         */

        $output->writeln('Creating backup (<info>' . (($this->data && $this->tables) || (!$this->data && !$this->tables) ? 'Full' : '') . ($this->data && !$this->tables ? 'Only data' : '') . ($this->tables && !$this->data ? 'Only tables' : '') . ($this->prefix ? ', ' . $this->prefix : '') . '</info>) ...');

        $f = 'dump_' . ($this->prefix ? $this->prefix . '_' : '') . ($this->data && !$this->tables ? 'data_' : '') . ($this->tables && !$this->data ? 'tables_' : '') . date('YmdHis') . '.sql.gz';

        // Get SQL data from config
        $this->database_host     = $this->containerInterface->getParameter('database_host');
        $this->database_port     = $this->containerInterface->getParameter('database_port');
        $this->database_name     = $this->containerInterface->getParameter('database_name');
        $this->database_user     = $this->containerInterface->getParameter('database_user');
        $this->database_password = $this->containerInterface->getParameter('database_password');
        $this->database_socket   = $this->containerInterface->getParameter('database_socket');

        $dump = $this->generateDump();

        if($this->display){
            echo $dump;
        }else{

            /*
                CLEAR OLDER BACKUP FILES
             */

            $dump_folder = $this->containerInterface->get('kernel')->getProjectDir().'/var/backup/';
            if(!file_exists($dump_folder)){
                mkdir($dump_folder);
            }else{
                $output->writeln('');
                $output->writeln('Checking old backups <info>older then ' . $this->limit_days . ' days</info>...');
                $limit = strtotime('-' . $this->limit_days . ' DAY');
                $files = scandir($dump_folder);
                $n = 0;
                foreach($files as $df){
                    if(is_file($dump_folder.$df)){
                        if(filemtime($dump_folder.$df) < $limit){
                            $output->writeln("\t" . 'DELETE: <info>' . $dump_folder.$df . '</info>');
                            unlink($dump_folder.$df);
                            $n++;
                        }
                    }
                }
                if($n == 0){
                    $output->writeln("\t" . 'No older backups found to delete.');
                }
                $output->writeln('');
            }

            file_put_contents($dump_folder . $f, $dump);

            $output->writeln('Created backup in file: <info>' . $dump_folder . $f . '</info>');
        }

        return Command::SUCCESS;
    }

    protected function generateDump(){
        $mysqli = new \mysqli($this->database_host, $this->database_user, $this->database_password, $this->database_name, $this->database_port, $this->database_socket);
        $mysqli->select_db($this->database_name);
        $mysqli->query("SET NAMES 'utf8'");

        $queryTables    = $mysqli->query('SHOW TABLES');
        $target_tables = [];
        while($row = $queryTables->fetch_row())
        {
            $target_tables[] = $row[0];
        }

        $content = 'SET FOREIGN_KEY_CHECKS=0;';

        foreach($target_tables as $table)
        {

            if(!empty($this->prefix)){
                if(!preg_match('/^' . $this->prefix . '/', $table)){
                    continue;
                }
            }

            // Parse column types
            $coltypes = [];
            $res_tmp = $mysqli->query("SELECT DATA_TYPE FROM information_schema.COLUMNS WHERE TABLE_SCHEMA LIKE '" . $this->database_name . "' AND TABLE_NAME = '" . $table . "'");
            while($row_tmp    = $res_tmp->fetch_assoc()){
                $coltypes[] = $row_tmp['DATA_TYPE'];
            }

            $result        = $mysqli->query('SELECT * FROM '.$table);
            $fields_amount = $result->field_count;
            $rows_num      = $mysqli->affected_rows;
            $res           = $mysqli->query('SHOW CREATE TABLE '.$table);
            $TableMLine    = $res->fetch_row();


            $column_heads = [];
            $column_integer = [];
            $column_tinyint = [];
            $column_double = [];
            $column_decimal = [];
            $column_nullable = [];
            $column_datetime = [];
            $column_key = [];

            $res = $mysqli->query("SHOW FIELDS FROM `" . $table . "`");
            $i = 0;

            while($row = $res->fetch_row()){
                $column_heads[$i] = $row[0];
                $column_tinyint[$i] = (strtolower($coltypes[$i]) == 'tinyint');
                $column_double[$i] = (strtolower($coltypes[$i]) == 'double');
                $column_integer[$i] = (substr(strtolower($row[1]), 0, 3) == 'int');
                $column_decimal[$i] = (substr(strtolower($row[1]), 0, 7) == 'decimal');
                $column_nullable[$i] = ($row[2] == 'YES');
                $column_datetime[$i] = (strtolower($coltypes[$i]) == 'datetime');
                $column_key[$i] = (!empty($row[3]) ? $row[3] : null);
                $i++;
            }

            $heads = '`' . implode('`,`', $column_heads) . '`';

            if(!$this->data || $this->tables){
                $content .="\n\n--\n-- -------------------------\n--\n\n";
                $content .="DROP TABLE IF EXISTS `$table`;";
                $content .="\n\n--\n-- -------------------------\n--\n\n";
                $content        =   $content . "".$TableMLine[1].";";
            }

            $rows = 0;

            if(!$this->tables || $this->data){
                for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0)
                {
                    $rows = $result->num_rows;
                    while($row = $result->fetch_row())
                    {
						//when started (and every after 100 command cycle):
                        if ($st_counter%100 == 0 || $st_counter == 0 )
                        {
                            $content .="\n\n--\n-- -------------------------\n--\n\n";
                            $content .= "INSERT INTO ".$table." (" . $heads . ") VALUES";
                        }
                        $content .= "\n(";
                        for($j=0; $j<$fields_amount; $j++)
                        {
                            $row[$j] = str_replace("\n","\\n", addcslashes(($row[$j]), '"\\/') );
                            if(!empty($row[$j]) || $row[$j] == 0){
                                $val = '"' . $row[$j] . '"';
                                if($column_integer[$j]){
                                    $val = $row[$j];
                                }
                                if($column_tinyint[$j]){
                                    $val = $row[$j];
                                }
                                if($column_double[$j]){
                                    $val = $row[$j];
                                }
                                if($column_decimal[$j]){
                                    if(empty($row[$j])){
                                        $val = 0;
                                    }else{
                                        $val = $row[$j];
                                    }
                                }
                                if($column_datetime[$j]){
                                    if(empty($row[$j])){
                                        $val = 'NULL';
                                    }
                                }
                            }else{
                                $val = '""';
                                if($column_integer[$j]){
                                    $val = 0;
                                }
                                if($column_tinyint[$j]){
                                    $val = 0;
                                }
                                if($column_double[$j]){
                                    $val = 0;
                                }
                                if($column_decimal[$j]){
                                    $val = 0;
                                }
                                if($column_nullable[$j]){
                                    $val = 'NULL';
                                }
                                if($column_datetime[$j]){
                                    $val = 'NULL';
                                }
                            }
                            // $val = str_replace(["\r", "\n"], ["", ""], $val);

                            if($column_integer[$j] || $column_tinyint[$j] || $column_double[$j]){
                                if(!$column_nullable[$j]){
                                    $val = (int)$val;
                                }else{
									if (is_numeric($row[$j]) && $row[$j] == 0) {
										// skip
									} else if (empty($row[$j])){
                                        $val = 'NULL';
                                    }
                                }
                            }
                            if($column_key[$j] && empty($val) && $row[$j] != 0){
                                $val = 'NULL';
                            }

                            $content .= $val;
                            if ($j<($fields_amount-1))
                            {
                                    $content.= ',';
                            }
                        }
                        $content .=")";
                        //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                        if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num)
                        {
                            $content .= ";";
                        }
                        else
                        {
                            $content .= ",";
                        }
                        $st_counter=$st_counter+1;
                    }
                }
            }

            /*if(!$this->data || $this->tables || ($this->data && $rows)){
                $content .="\n\n--\n-- -------------------------\n--\n\n";
            }*/
        }

        $content .= "\n\n" . 'SET FOREIGN_KEY_CHECKS=0;';
        // die();
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        /*$backup_name = $backup_name ? $backup_name : $name.".sql";
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");
        echo $content; exit;*/

		$content = gzencode($content, 9);

        return $content;
    }
}