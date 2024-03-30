<?php
use App\Kernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Dotenv\Dotenv;

if(preg_match('/public\/bundles/', __DIR__)){
	require __DIR__.'/../../../vendor/autoload.php';
} else {
  require __DIR__.'/../../../../vendor/autoload.php';
}

/**
 * @var Composer\Autoload\ClassLoader
 */

$path = '../../../../';
if(preg_match('/public\/bundles/', __DIR__)){
	$path = '../../../';
}


if (!class_exists(Dotenv::class)) {
    throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
}
(new Dotenv(true))->load(__DIR__.'/'.$path.'.env');

$doTranslations = false;
if(!empty($_GET['extended']) && $_GET['extended'] !== 'false'){
	$Kernel = new Kernel('dev', true);
        $doTranslations = true;
}else{
	$Kernel = new Kernel('prod', false);
}

$Kernel->boot();


$cachedir = __DIR__.'/' . $path . 'var/cache/prod/';
$files = glob($cachedir.'{,.}*', GLOB_BRACE);
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

$cachedir = __DIR__.'/' . $path . 'var/cache/dev/';
$files = glob($cachedir.'{,.}*', GLOB_BRACE);
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

$cachedir = __DIR__.'/' . $path . 'var/cache/webshop/';
$files = glob($cachedir.'{,.}*', GLOB_BRACE);
foreach($files as $file){ // iterate files
  rmdir($file); // delete folder
}



// $output->writeln('- Updating database ...');
$application = new \Symfony\Bundle\FrameworkBundle\Console\Application($Kernel);
$application->setAutoExit(false);

//Create de Schema
/*$options = array('command' => 'doctrine:schema:update',"--force" => true);
$status = $application->run(new \Symfony\Component\Console\Input\ArrayInput($options));*/

//Clear translation cache
if ($doTranslations) {
  $options = array('command' => 'trinity:language:cache');
  $status = $application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
}

if(!empty($_GET['url'])){
	header('Location: ' . $_GET['url']);
	exit;
}
?>

<div style="margin-top: 30px;text-align:center;">
	<i class="material-icons" style="font-size: 100px;     margin-bottom: 20px;     color: #1d88e5;">check_circle_outline</i>
	<h4>De cache is gewist.</h4>
</div>
