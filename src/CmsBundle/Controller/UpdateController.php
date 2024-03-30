<?php
namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\GeneratorBundle\Manipulator\ConfigurationManipulator;
use Sensio\Bundle\GeneratorBundle\Manipulator\KernelManipulator;
use Sensio\Bundle\GeneratorBundle\Manipulator\RoutingManipulator;
use Sensio\Bundle\GeneratorBundle\Model\Bundle;

use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\Output;
use Symfony\Bundle\FrameworkBundle\Console\Application;

class UpdateController extends StorageController{

    const NAMESPACE = 'trinity-bundles';

    private $request = null;

    /**
     * @Route("/admin/install/{bundle}/{version}/{update}", name="admin_install")
     * @Template()
     */
    public function installAction(Request $request, $bundle = null, $version = null, $update = 0)
    {
        parent::init($request);

        $this->request = $request;

        if($bundle && $version){
            return $this->installBundle($bundle, $version, $update);
            // return $this->redirect($this->generateUrl('admin_install'));
        }


        $data = [];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->getParameter('trinity_cc_server') . '/api/bundles');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $bundleData = json_decode(curl_exec($ch), 1);
        curl_close($ch);


        $remoteBundles = [];
        foreach($bundleData['bundles'] as $bundle){
            $d = [
                'version' => $bundle['tag'],
                'image' => (isset($bundle['image']) ? $bundle['image'] : null),
                'image_url' => (isset($bundle['image_url']) ? $bundle['image_url'] : null),
                'updated' => new \DateTime($bundle['changed']['date']),
                'bundle' => $bundle['bundle'],
            ];
            $remoteBundles[$bundle['bundle']] = $d;

            $data['available'][$bundle['bundle']] = $d;
        }


        $bundleDir = $this->containerInterface->get('kernel')->getProjectDir() . '/src/Trinity/';
        $bundleList = scandir($bundleDir);
        // $installed_list = [];
        // $installed_bundles = [];
        foreach($bundleList as $dir){
            if(substr($dir, 0, 1) != '.' && is_dir($bundleDir . $dir)){

                $version = null;
                if(file_exists($bundleDir . $dir . '/VERSION')){
                    $versionData = file($bundleDir . $dir . '/VERSION');
                    $version = trim($versionData[0]);
                }

                if(array_key_exists($dir, $remoteBundles)){
                    // Installed

                    $d = $remoteBundles[$dir];
                    $d['current'] = $version;
                    $data['installed'][$d['bundle']] = $d;

                    if($version && version_compare($d['version'], $version, '>')){
                        // Update available
                        $d = $remoteBundles[$dir];
                        $d['current'] = $version;
                        $data['update'][$d['bundle']] = $d;
                    }

                    unset($data['available'][$dir]);
                }else{
                    // Not installed
                }

                // $installed_list[$dir] = $version;
                // $installed_bundles[] = $dir;
            }
        }


        // dump($data);die();



        /*$installed_list = [];
        $installed = $this->getCurrentInstalled();
        dump($installed);die();
        if(preg_match_all('/(.*?Bundle) /', $installed, $matches)){
            foreach($matches[1] as $entry){
                $installed_list[] = trim($entry);
            }
        }*/

        // dump($installed_list);die();

        // Get list from cache
        /*$bundleData = [];
        $projectRoot = $this->containerInterface->get('kernel')->getProjectDir() . '/bundles.cache';
        if(file_exists($projectRoot)){
            $bundleData = json_decode(file_get_contents($projectRoot), true);
        }*/

        $this->breadcrumbs->addRouteItem($this->trans("Extensies", [], 'cms'), "admin_install");
        /*$list = file_get_contents('https://gitlab.com/api/v4/groups/2170826/projects?private_token=LXuhvfs7kUXZzhLt1dyH');
        $list = json_decode($list, true);

        $parsed_list = [];
        foreach($list as $index => $entry){
            $tagList = file_get_contents('https://gitlab.com/api/v4/projects/' . $entry['id'] . '/repository/tags?private_token=LXuhvfs7kUXZzhLt1dyH');
            $entry['tags'] = json_decode($tagList, true);

            if(!empty($entry['tags'])){
                $entry['current_tag'] = $entry['tags'][0];
                $parsed_list[] = $entry;
            }
        }*/

        // dump($bundleData);
        // dump($installed_list);die();

        return $this->attributes(array(
            'data' => $data,
            // 'installed_bundles' => $installed_bundles,
            // 'list' => (!empty($bundleData['bundles']) ? $bundleData['bundles'] : []),
        ));
    }

    /**
     * @Route("/admin/update", name="admin_update")
     * @Template()
     */
    public function updateAction(Request $request)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Extensies", [], 'cms'), "admin_update");

        return $this->attributes(array(
            //
        ));
    }

    /**
     * @Route("/admin/issues", name="admin_issues")
     * @Template()
     */
    public function issuesAction(Request $request)
    {
        parent::init($request);

        $url = 'https://gitlab.com/api/v4/projects/4636464/issues';

        //open connection
        ob_start();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'PRIVATE-TOKEN: LXuhvfs7kUXZzhLt1dyH',
            'Content-Type: application/json',
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        ob_end_clean();

        $issues = ['closed' => [], 'opened' => []];
        foreach(json_decode($result) as $issue){
            $issues[$issue->state][] = $issue;
        }

        return $this->attributes(array(
            'issues' => $issues,
        ));
    }

    /**
     * @Route("/admin/install/activate/{package}", name="admin_install_activate")
     * @Template()
     */
    public function activateAction(Request $request, $package = '', $update = 0)
    {
        $targetDir = __DIR__ . '/../../Trinity/' . $package . '/';
        $this->activateBundle($package, $targetDir, $update == 1);

        return new JsonResponse([
            'success' => true,
            'message' => 'ACTIVATED',
        ]);
    }

    private function installBundle($package, $tag, $update = 0){


        $log = [];
        $isOk = false;


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->getParameter('trinity_cc_server') . '/api/bundles');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $bundleData = json_decode(curl_exec($ch), 1);
        curl_close($ch);





        $bundleDump = $bundleData['bundles'][$package];





        $cacheDir = $this->containerInterface->get('kernel')->getProjectDir() . '/var/cache/';

        $targetDir = __DIR__ . '/../../Trinity/' . $package . '/';
        $targetDirBase = __DIR__ . '/../../Trinity/';

        $zipFilename = $package . '_' . $tag . '.zip';
        $zipFile = $cacheDir . $zipFilename;

        $log[] = 'Installing <info>' . ucfirst($package) . '</info>, version <info>' . $tag . '</info>';
        $log[] = '';

        if(!file_exists($zipFile)){
            $log[] = 'Downloading ZIP file to <info>var/cache/' . $zipFilename . '</info> ...';
            file_put_contents($zipFile, fopen('https://gitlab.com/' . self::NAMESPACE . '/' . $package . '/repository/' . $tag . '/archive.zip?private_token=LXuhvfs7kUXZzhLt1dyH', 'r'));
        }else{
            $log[] = 'Using existing ZIP file from <info>var/cache/' . $zipFilename . '</info> ...';
        }

        $log[] = 'Extracting ...';
        $zip = new \ZipArchive;
        $res = $zip->open($zipFile);
        if ($res === TRUE) {
            if(!file_exists($targetDir)){
                $log[] = 'Target directory doesn\'t exist yet.';

                $zip->extractTo($targetDirBase);
                $log[] = 'Done extracting, searching source directory ...';
                $zip->close();

                $srcDir = null;
                foreach(scandir($targetDirBase) as $d){
                    if(preg_match('/^' . $package . '-' . $tag . '/', $d)){
                        $srcDir = $targetDirBase . $d . '/';
                        break;
                    }
                }

                if($srcDir){
                    $log[] = 'Found, folder located, now renaming folder ...' . "\t" . $srcDir;

                    // Moving files from extracted files
                    if (rename($srcDir, $targetDir)) {
                        $log[] = '<info>Successfully renamed folder!</info>';

                        $isOk = true;

                        $this->activateBundle($package, $targetDir, $update == 1);

                        return new JsonResponse([
                            'success' => true,
                            'message' => 'INSTALLED',
                        ]);
                    } else {
                        $log[] = '<error>FAILED: Could not rename folder...</error>';
                        unlink($srcDir);
                    }
                }
            }else{
                $zip->extractTo($cacheDir);
                $log[] = 'Done extracting, searching source directory ...';
                $zip->close();

                $srcDir = null;
                foreach(scandir($cacheDir) as $d){
                    if(preg_match('/^' . $package . '-' . $tag . '/', $d)){
                        $srcDir = $cacheDir . $d . '/';
                        break;
                    }
                }

                if($srcDir){
                    $log[] = 'Found, folder located, now moving files ...';

                    // Moving files from extracted files
                    if (is_writable($targetDir)) {
                        $this->syncFolder($srcDir, $targetDir);

                        $isOk = true;

                        $this->activateBundle($package, $targetDir, $update == 1);

                        return new JsonResponse([
                            'success' => true,
                            'message' => 'INSTALLED',
                        ]);
                    } else {
                        return new JsonResponse([
                            'success' => false,
                            'message' => 'CANNOT_WRITE_TARGET',
                        ]);
                        $log[] = '<error>FAILED: Could not write to destination folder...</error>';
                    }
                }else{
                    return new JsonResponse([
                        'success' => false,
                        'message' => 'CANNOT_FIND_EXTRACTED',
                    ]);
                    $log[] = '<error>FAILED: Could not find the folder where the bundle was extracted...</error>';
                }
            }
        }else{
            return new JsonResponse([
                'success' => false,
                'message' => 'CANNOT_EXTRACT',
            ]);
            $log[] = '<error>FAILED: Unable to unzip...</error>';
        }

        dump($isOk);
        dump($log);
        die();

        if($isOk){
            return new JsonResponse([
                'success' => true,
                'message' => 'INSTALLED',
            ]);
        }

        return new JsonResponse([
            'success' => false,
            'message' => 'UNKNOWN_ERROR',
        ]);
    }

    private function activateBundle($bundleName, $path, $update = false){

        $Kernel = $this->containerInterface->get('kernel');

        // $this->clearCache($Kernel);

        if($update){
            return true;
        }

        $bundle = new Bundle(
            'Trinity\\'.$bundleName,
            'Trinity'.$bundleName,
            $path,
            'annotation',
            'no'
        );

        $kernelManipulator = new KernelManipulator($Kernel);

        $ret = $kernelManipulator->addBundle($bundle->getBundleClassName());

        if (!$ret) {
            $reflected = new \ReflectionObject($Kernel);
            // $output->writeln('<error>Failed.</error>');
        }else{
            // $output->writeln('- Add configuration ...');
            // XXX FIXME!!! config file
            $targetConfigurationPath = $this->containerInterface->get('kernel')->getProjectDir().'/config/config.yml';
            $manipulator = new ConfigurationManipulator($targetConfigurationPath);
            try {
                $manipulator->addResource($bundle);
                // $output->writeln('- Add routes ...');
                // XXXX FIXME !!! (config file)
                $targetRoutingPath = $this->containerInterface->get('kernel')->getProjectDir().'/config/routing.yml';
                $routing = new RoutingManipulator($targetRoutingPath);
                try {
                    $ret = $routing->addResource($bundle->getName(), $bundle->getConfigurationFormat());
                    if (!$ret) {
                        // $output->writeln('<error>Failed.</error>');
                    }else{







                        // $this->clearCache($Kernel);







                    }
                } catch (\RuntimeException $e) {
                    dump($e->getMessage());die();
                }
            } catch (\RuntimeException $e) {
                dump($e->getMessage());die();
            }
        }
    }

    private function clearCache($Kernel){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->request->getScheme() . '://' . $this->request->getHttpHost() . '/bundles/cms/cache.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $output = curl_exec($ch);
        curl_close($ch);

        /*

        // $output->writeln('- Clearing cache ...');


        $realCacheDir = $this->containerInterface->getParameter('kernel.cache_dir');
        dump($realCacheDir);
        // the old cache dir name must not be longer than the real one to avoid exceeding
        // the maximum length of a directory or file path within it (esp. Windows MAX_PATH)
        $oldCacheDir = substr($realCacheDir, 0, -1).('~' === substr($realCacheDir, -1) ? '+' : '~');
        dump($oldCacheDir);
        $filesystem = $this->containerInterface->get('filesystem');
        // die();

        if (!is_writable($realCacheDir)) {
            throw new \RuntimeException(sprintf('Unable to write in the "%s" directory', $realCacheDir));
        }

        if ($filesystem->exists($oldCacheDir)) {
            $filesystem->remove($oldCacheDir);
        }

        $kernel = $this->containerInterface->get('kernel');
        $this->containerInterface->get('cache_clearer')->clear($realCacheDir);

        $filesystem->remove($realCacheDir);


        // $output->writeln('- Updating database ...');
        $application = new \Symfony\Bundle\FrameworkBundle\Console\Application($Kernel);
        $application->setAutoExit(false);
        //Create de Schema
        $options = array('command' => 'doctrine:schema:update',"--force" => true);
        $application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
        */
    }

    private function syncFolder($source, $target, $level = 0){
        $ignore = array('.', '..');
        $dh = @opendir( $source );
        while( false !== ( $file = readdir( $dh ) ) ){
            if( !in_array( $file, $ignore ) ){
                if( is_dir( "$source$file" ) ){
                    if( !file_exists( "$target$file" ) ){
                        mkdir("$target$file");
                    }

                    $this->syncFolder($source.$file . '/', $target.$file . '/', ($level+1) );
                }else {
                    rename($source.$file, $target.$file);
                }
            }
        }
        closedir( $dh );
    }

    public static function delTree($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? self::delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }

}
