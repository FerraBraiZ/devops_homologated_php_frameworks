<?php
declare(strict_types=1);
ini_set('ignore_repeated_errors', 'On');
ini_set('html_errors', 'On');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');

defined('BASE_PATH') || define('BASE_PATH', dirname(__DIR__));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

// Delegate static file requests back to the PHP built-in webserver
if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}

if ( !file_exists( '../config/bootstrap.php') ){
    throw new Error('Failed to load application\'s bootstrap file');
}

require_once '../config/bootstrap.php';