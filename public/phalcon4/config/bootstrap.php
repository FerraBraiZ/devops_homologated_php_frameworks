<?php
declare(strict_types=1);

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
    require_once './environment.php';


    /**
     * The FactoryDefault Dependency Injector automatically registers
     * the services that provide a full stack framework.
     */
    $dic = new container();

    /**
     * Handle routes
     */
    require_once './router.php';

    /**
     * Read services
     */
    require_once './services.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $dic->getConfig();

    /**
     * Include Autoloader
     */
    require_once './loader.php';

    /**
     * Handle the request
     */
    $application = new Application($dic);

    echo $application->handle()->getContent();

} catch (\Throwable $t) {
    echo $t->getMessage() . PHP_EOL;
    echo '<pre>' . $t->getTraceAsString() . '</pre>';
}

