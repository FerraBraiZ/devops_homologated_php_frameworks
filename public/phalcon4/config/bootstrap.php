<?php
declare(strict_types=1);
namespace Phalcon4\Config;

ini_set('ignore_repeated_errors', 'On');
ini_set('html_errors', 'On');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'ptb', 'portuguese-brazil', 'pt-br', 'bra', 'brazil');
defined('BASE_PATH') || define('BASE_PATH', dirname(__DIR__));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');


use \Phalcon\Mvc\Application;

if (!file_exists('../vendor/autoload.php')) {
    throw new Error("Failed to load composer's vendor autoload");
}
require_once '../vendor/autoload.php';

/**
 * Include Environment
 */

if ( !file_exists(BASE_PATH.'/config/environment.php') ) {
    throw new Error("Failed to include environment.php");
}
require_once BASE_PATH.'/config/environment.php';



/**
 * Handle routes
 */
if ( !file_exists(BASE_PATH.'/config/router.php') ){
    throw new Error("Failed to include router.php");
}
require_once BASE_PATH.'/config/router.php';

/**
 * Read services
 */
if ( !file_exists(BASE_PATH.'/config/services.php') ) {
    throw new Error("Failed to include services.php");
}
require_once BASE_PATH.'/config/services.php';


if(!isset($container)){
    throw new Error("Failed to contruct or include the dic conteiner from services.php");
}

/**
 * Get config service for use in inline setup below
 */
$config = $container->getConfig();

/**
 * Include Autoloader
 */
if ( !file_exists(BASE_PATH.'/config/loader.php') ) {
    throw new Error("Failed to include loader.php");
}
require_once BASE_PATH.'/config/loader.php';

try {

    /**
     * Handle the request
     */
    $application = new Application($container);

    echo $application->handle()->getContent();

} catch (\Throwable $t) {

    echo $t->getMessage().PHP_EOL;
    echo '<pre>' . $t->getTraceAsString() . '</pre>';

}

