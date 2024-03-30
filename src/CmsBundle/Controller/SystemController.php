<?php

namespace App\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SystemController extends StorageController{
    
    private $database_host     = null;
    private $database_port     = null;
    private $database_name     = null;
    private $database_user     = null;
    private $database_password = null;
    private $database_socket   = null;
    private $data              = null;
    private $tables            = null;
    private $prefix            = null;

    /**
     * @Route("/admin/system", name="admin_system")
     * @Template()
     */
    public function indexAction(Request $request){
        parent::init($request);

        if(!empty($_POST)){
            if(!empty($_POST['export'])){
                // Create new backup
                $this->createBackup($_POST['export']);
            }
        }

        $dumps = [];
        $dump_folder = $this->containerInterface->get('kernel')->getProjectDir() . '/var/backup/';
        if(file_exists($dump_folder)){
            foreach(scandir($dump_folder) as $file){
                if(is_file($dump_folder . $file) && preg_match('/^.*?\.sql$/', $file)){
                    $dumps[filemtime($dump_folder . $file)] = $file;
                }
				if(is_file($dump_folder . $file) && preg_match('/^.*?\.sql.gz$/', $file)){
                    $dumps[filemtime($dump_folder . $file)] = $file;
                }
            }
            krsort($dumps);
        }

        $this->breadcrumbs->addRouteItem($this->trans('Systeem', [], 'cms'), 'admin_system');

        return $this->attributes([
            'dumps' => $dumps
        ]);
    }

    /**
     * @Route("/admin/system/download", name="admin_system_download")
     */
    public function downloadAction(Request $request){
        $dump_folder = $this->containerInterface->get('kernel')->getProjectDir() . '/var/backup/';

        if(!empty($_GET['file']) && file_exists($dump_folder . $_GET['file'])){
            header("Content-Type: application/sql");
            header('Content-Length: ' . filesize($dump_folder . $_GET['file']));
            header("Content-disposition: attachment; filename=\"" . $_GET['file'] . "\"");
            echo readfile($dump_folder . $_GET['file']);
            exit;
        }

        return $this->redirect($this->generateUrl('admin_system'));
    }

    /**
     * @Route("/admin/log/{page}/{filter}/{val}", name="admin_log")
     * @Template()
     */
    public function logAction(Request $request, $page = 1, $filter = null, $val = null){
        parent::init($request);

        $em = $this->getDoctrine()->getManager();
        
        $limit = 25;
        $offset = (($page * $limit) - $limit);

        $this->breadcrumbs->addRouteItem($this->trans('Systeem log', [], 'cms'), 'admin_log');

        $start = date('Y-m-d');
        $end = date('Y-m-d');

        if(!empty($_GET['s']) && !empty($_GET['e'])){
            $start = $_GET['s'];
            $end = $_GET['e'];
        }

        $countAll = $em->getRepository('CmsBundle:Log')->filter(true, $this->Settings, null, null, null, null, $limit, $offset);

        $filter_active = false;
        if(!empty($filter) && !empty($val)){
            $filter_active = true;
            $count = $em->getRepository('CmsBundle:Log')->filter(true, $this->Settings, $filter, $val, $start, $end, $limit, $offset);
            $logs = $em->getRepository('CmsBundle:Log')->filter(false, $this->Settings, $filter, $val, $start, $end, $limit, $offset);
        }else{
            $count = $em->getRepository('CmsBundle:Log')->filter(true, $this->Settings, null, null, $start, $end, $limit, $offset);
            $logs = $em->getRepository('CmsBundle:Log')->filter(false, $this->Settings, null, null, $start, $end, $limit, $offset);
        }

        $pages = ceil($count / $limit);

        return $this->attributes([
            'logs'          => $logs,
            'filter_active' => $filter_active,
            'filter'        => $filter,
            'val'           => $val,
            'start'         => $start,
            'end'           => $end,
            
            'countAll'      => $countAll,
            'count'         => $count,
            'page'          => $page,
            'pages'         => $pages,
            'limit'         => $limit,
            'offset'        => $offset,
        ]);
    }

    /**
     * @Route("/admin/system/restore", name="admin_system_restore")
     */
    public function restoreAction(Request $request){
        $dump_folder = $this->containerInterface->get('kernel')->getProjectDir() . '/var/backup/';

        if(!empty($_GET['file']) && file_exists($dump_folder . $_GET['file'])){
            $f = $dump_folder . $_GET['file'];

            // Get SQL data from config
            $database_host     = $this->containerInterface->getParameter('database_host');
            $database_port     = $this->containerInterface->getParameter('database_port');
            $database_name     = $this->containerInterface->getParameter('database_name');
            $database_user     = $this->containerInterface->getParameter('database_user');
            $database_password = $this->containerInterface->getParameter('database_password');
            $database_socket   = $this->containerInterface->getParameter('database_socket');

            $mysqli = new \mysqli($database_host, $database_user, $database_password, $database_name, $database_port, $database_socket);
            $mysqli->select_db($database_name);
            $mysqli->query("SET NAMES 'utf8'");
            $mysqli->query('SET FOREIGN_KEY_CHECKS=0');

            $queryTables    = $mysqli->query('SHOW TABLES');
            while($row = $queryTables->fetch_row()){ $mysqli->query("DELETE FROM `" . $row[0] . "`"); }

            $f = file_get_contents($f);
            $f = explode('-- -------------------------', $f);

            foreach($f as $sql){
                $mysqli->query($sql);
            }

            $mysqli->query('SET FOREIGN_KEY_CHECKS=1');
        }

        return $this->redirect($this->generateUrl('admin_system'));
    }

    private function createBackup($c){

        if($c['data'] == 'structure'){
            $this->tables = true;
        }
        if($c['data'] == 'data'){
            $this->data = true;
        }

        $format = $c['data'];
        $this->type = $c['type'];

        $f = 'dump_' . ($this->data == 'data' ? 'data_' : '') . ($format == 'structure' ? 'tables_' : '') . date('YmdHis') . '.sql';
        $dump_folder = $this->containerInterface->get('kernel')->getProjectDir() . '/var/backup/';

        if(!file_exists($dump_folder)){
            mkdir($dump_folder);
        }

        // Get SQL data from config
        $this->database_host     = $this->containerInterface->getParameter('database_host');
        $this->database_port     = $this->containerInterface->getParameter('database_port');
        $this->database_name     = $this->containerInterface->getParameter('database_name');
        $this->database_user     = $this->containerInterface->getParameter('database_user');
        $this->database_password = $this->containerInterface->getParameter('database_password');
        $this->database_socket   = $this->containerInterface->getParameter('database_socket');

        $dump = $this->generateDump($dump_folder . $f);

        // file_put_contents($dump_folder . $f, $dump);

        if($this->type == 'download'){
            header("Content-Type: application/sql");
            header('Content-Length: ' . filesize($dump_folder . $f));
            header("Content-disposition: attachment; filename=\"" . $f . "\"");
            echo $dump;
            exit;
        }

        return $this->redirect($this->generateUrl('admin_system'));
    }

    protected function generateDump($target){
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
            $column_nullable = [];
            $column_key = [];

            $res = $mysqli->query("SHOW FIELDS FROM `" . $table . "`");
            $i = 0;

            while($row = $res->fetch_row()){
                $column_heads[$i] = $row[0];
                $column_tinyint[$i] = (strtolower($coltypes[$i]) == 'tinyint');
                $column_double[$i] = (strtolower($coltypes[$i]) == 'double');
                $column_integer[$i] = (substr(strtolower($row[1]), 0, 3) == 'int');
                $column_nullable[$i] = ($row[2] == 'YES');
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
                    { //when started (and every after 100 command cycle):
                        if ($st_counter%100 == 0 || $st_counter == 0 )
                        {
                            $content .="\n\n--\n-- -------------------------\n--\n\n";
                                $content .= "INSERT INTO ".$table." (" . $heads . ") VALUES";
                        }
                        $content .= "\n(";
                        for($j=0; $j<$fields_amount; $j++)
                        {
                            $row[$j] = str_replace("\n","\\n", addcslashes(($row[$j]), '"\\/') );

                            if(!empty($row[$j])){
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
                                if($column_nullable[$j]){
                                    $val = 'NULL';
                                }
                            }
                            // $val = str_replace(["\r", "\n"], ["", ""], $val);

                            if($column_integer[$j] || $column_tinyint[$j] || $column_double[$j]){
                                if(!$column_nullable[$j]){
                                    $val = (int)$val;
                                }else{
                                    if(empty($row[$j])){
                                        $val = 'NULL';
                                    }
                                }
                            }

                            if($column_key[$j] && empty($val)){
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

        $content .= "\n\n" . 'SET FOREIGN_KEY_CHECKS=1;';
        // die();
        //$backup_name = $backup_name ? $backup_name : $name."___(".date('H-i-s')."_".date('d-m-Y').")__rand".rand(1,11111111).".sql";
        /*$backup_name = $backup_name ? $backup_name : $name.".sql";
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"".$backup_name."\"");
        echo $content; exit;*/
        file_put_contents($target, $content);

        return $content;
    }
}
