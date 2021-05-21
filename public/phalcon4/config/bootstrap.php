<?php
#declare(strict_types=1);
ini_set('ignore_repeated_errors', 'On');
ini_set('html_errors', 'On');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'ptb', 'portuguese-brazil', 'pt-br', 'bra', 'brazil');


defined('BASE_PATH') || define('BASE_PATH', dirname(__DIR__));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

use Phalcon\Di\FactoryDefault as container;
use \Phalcon\Mvc\Application;

try {

    if (!file_exists('../vendor/autoload.php')) {
        throw new Error("Failed to load composer's vendor autoload");
    }

    require_once '../vendor/autoload.php';


    /**
     * Include Environment
     */

    if (!file_exists('environment.php')) {
        throw new Error("Failed to include environment.php");
    }

    require_once 'environment.php';


    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $dic = new container();

    /**
     * Handle routes
     */
    if (!file_exists('router.php')) {
        throw new Error("Failed to include router.php");
    }
    require_once 'router.php';

    /**
     * Read services
     */
    if (!file_exists('services.php')) {
        throw new Error("Failed to include services.php");
    }
    require_once 'services.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $dic->getConfig();

    /**
     * Include Autoloader
     */
    if (!file_exists('loader.php')) {
        throw new Error("Failed to include loader.php");
    }
    require_once 'loader.php';

    /**
     * Handle the request
     */
    $application = new Application($dic);

    echo $application->handle()->getContent();

} catch (\Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo '<pre>' . $t->getTraceAsString() . '</pre>';
}

