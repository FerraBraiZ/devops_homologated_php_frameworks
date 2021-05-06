<?php
namespace GoldenAmi\Controllers;

class IndexController
{
    public function index()
    {
        require_once('./view/index.php');
    }

    public function alive()
    {
        header('Content-Type:application/json');
        http_response_code(200);
        exit(json_encode("(╯°□°）╯︵ ┻━┻ "));
    }

    public function php_info()
    {
        die(\phpinfo());
    }

}
