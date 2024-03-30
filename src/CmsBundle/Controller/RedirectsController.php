<?php
namespace App\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\CmsBundle\Entity\Log;

class RedirectsController extends StorageController{

    /**
     * @Route("/admin/redirects", name="admin_redirects")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        parent::init($request);

        $this->breadcrumbs->addRouteItem($this->trans("Redirects beheren", [], 'cms'), "admin_redirects");

        $webDir = $this->containerInterface->get('kernel')->getProjectDir() . '/public';
        $htaccessFile = $webDir . '/.htaccess';
        $data = file_get_contents($htaccessFile);

        $redirectData = [];

        if(!empty($_POST)){
            // Clean up Trinity section is exists
            if(preg_match('/\n\n\s+#### TRINITY START ####(.*?)#### TRINITY END ####/s', $data, $m)){
                $data = str_replace($m[0], '', $data);
            }

            $data_section = "";

            // Build new Trinity section
            if(!empty($_POST['data'])){
                $data_section  = "\n\n    #### TRINITY START ####";
                $data_section .= "\n    #### This section is automatically being filled by Easify CMS ####\n\n";

                foreach($_POST['data'] as $r){
                    $data_section .= "    " . implode(' ', $r) . "\n";
                }

                $data_section .= "\n    #### TRINITY END ####";
            }

            // Add Trinity section to /public/.htaccess file
            if(strpos($data, 'RewriteEngine On') !== false){
                $data = preg_replace('/RewriteEngine On/', "RewriteEngine On" . $data_section, $data);
            }

            file_put_contents($htaccessFile, $data);

            $Syslog = new Log();
            $Syslog->setAction('update');
            $Syslog->setUser($this->getUser());
            $Syslog->setUsername($this->getUser()->getUsername());
            $Syslog->setType('redirects');
            $Syslog->setStatus('info');
            $Syslog->setSettings($this->Settings);
            $Syslog->setMessage('Redirects / .htaccess is gewijzigd.');

            $em = $this->getDoctrine()->getManager();
            $em->persist($Syslog);
            $em->flush();

            return $this->redirectToRoute('admin_redirects');
        }else{
            if(preg_match('/\n\n\s+#### TRINITY START ####.*?#### .*? ####(.*?)#### TRINITY END ####/s', $data, $m)){
                $data = explode("\n", trim($m[1]));
                if(!empty($data)){
                    foreach($data as $line){
                        $line = trim($line);
                        if(preg_match('/^(redirect)\s+(\d+)\s+(.*?)\s+(.*?)$/', $line, $m)){
                            $redirectData[] = [$m[1], $m[2], $m[3], $m[4]];
                        }
                    }
                }
            }
        }

        return $this->attributes(array(
            'redirectData' => $redirectData
        ));
    }

}
