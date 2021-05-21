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
use Dotenv\Dotenv;

if ( empty( $env=(new Dotenv('../environment/', 'development.env'))->load()) ){
    throw new Error("Failed to load environment file:development.env'");
}

