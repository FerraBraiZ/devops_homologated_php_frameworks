<?php

namespace GoldenAmi\Config;

class Router
{

    private static function getRouteType()
    {
        $url = str_replace('/v2', '', $_SERVER['REQUEST_URI']);
        $url = explode('?', $url)[0];

        $route = [
            'url' => $url,
            'controller_name' => 'index',
            'function_name' => 'index',
            'valid' => false,
            'params' => []
        ];

        $GET = 8;
        $POST = 4;
        $PUT = 2;
        $DELETE = 1;

        $routes = [
            '/'             => ["GoldenAmi\\Controllers\\IndexController", $GET, 'index'],
            '/alive'        => ["GoldenAmi\\Controllers\\IndexController", $GET, 'alive'],
            '/phpinfo'      => ["GoldenAmi\\Controllers\\IndexController", $GET, 'php_info']
        ];

        if (!isset($routes[$url])) {

            http_response_code(404);
            exit("Route not found ¯\_(ツ)_/¯");
        }

        if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
            return true;
        }

        if ($routes[$url][1] && ${$_SERVER['REQUEST_METHOD']}) {
            $route['controller_name'] = $routes[$url][0];
            $route['function_name'] = $routes[$url][2];

            switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                case 'PUT':
                case 'DELETE':
                    $route['valid'] = true;
                    break;

                case 'POST':
                    if (empty($_POST)) {
                        $rest_json = file_get_contents("php://input");
                        $_POST = json_decode($rest_json, true);
                    }
                    $route['valid'] = true;
                    break;

                default:
                    die($_SERVER['REQUEST_METHOD']);
                    break;
            }
        }

        //todo saniteze
        $_REQUEST = (isset($_POST) && !empty($_POST)) ? array_merge($_GET, $_POST) : $_GET;

        return $route;
    }


    public static function get()
    {
        $route = self::getRouteType();

        if ($route['valid'] === false) {
            http_response_code(400);
            die('route not found!');
        }

        $controller_name = $route['controller_name'];

        $function_name = $route['function_name'];

        $controller = new $controller_name;

        call_user_func_array([$controller, $function_name], []);

    }


}
