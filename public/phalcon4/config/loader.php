<?php
declare(strict_types=1);
namespace Phalcon4\Config;

ini_set('ignore_repeated_errors', 'On');
ini_set('html_errors', 'On');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'ptb', 'portuguese-brazil', 'pt-br', 'bra', 'brazil');

use \Phalcon\Loader;

try {

    $loader = new Loader();
    /**
     * Get config service for use in inline setup below
     */
    $config = $container->getConfig();

    /**
     * We're a registering a set of directories taken from the configuration file
     */
    $loader->registerDirs(
        [
            $config->application->controllersDir,
            $config->application->modelsDir
        ]
    );
    /**
     * Register custom namespaces for the Phalcon autoloader
     */
    $loader->registerNamespaces(
        [
            'Phalcon4\Models'         => $config->application->modelsDir,
            'Phalcon4\Controllers'    => $config->application->controllersDir,

        ]
    );

    /**
     * Register Files, Composer autoloader
     */
//    $loader->registerFiles(
//        [
//            BASE_PATH . '/vendor/autoload.php'
////              'vendorDir'         => BASE_PATH . '/vendor/',
//        ]
//    );

    $loader->register();


} catch (\Throwable $e) {
    echo $e->getMessage();
}


