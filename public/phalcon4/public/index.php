<?php

// Delegate static file requests back to the PHP built-in webserver
if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}

if ( !file_exists( '../config/bootstrap.php') ){
    throw new Error('Failed to load application\'s bootstrap file');
}

require_once '../config/bootstrap.php';