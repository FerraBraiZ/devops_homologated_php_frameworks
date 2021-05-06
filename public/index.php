<?php

    ini_set('ignore_repeated_errors', 'On');
    ini_set('html_errors', 'On');
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    date_default_timezone_set('America/Sao_Paulo');

    require_once 'vendor/autoload.php';

    $availableRoutes=[
    '/laravel6/public/',
    '/laravel7/public/',
    '/laravel8/public/',
    '/codeigniter3/public/',
    '/codeigniter4/public/',
    '/phalcon4/public/'
    ];

    $route = $_SERVER['REQUEST_URI'];
    $host=$_SERVER['HTTP_HOST'];
    $https=$_SERVER['HTTPS'];
    $location = (isset($https) && $https === 'on' ? "https" : "http") . "://$host$route";

    if ( in_array( $route, $availableRoutes ) )
    {
        header("Location: $location");
        die;
    }

    #handle internal routes and 404
    \GoldenAmi\Config\Router::get();