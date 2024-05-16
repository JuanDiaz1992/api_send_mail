<?php
require_once "routes/Routes.php";

class Index{
    private $routes;
    public function __construct(){
        $this->routes = new Routes();
    }
    public function main()    {
        ini_set('display_errors',1);
        ini_set('logs_errors',1);
        ini_set('error_log','F:/xampp/htdocs/basic_crud_php_api/utils/php_error_log');
        $this->routes->initRoutes();
    }
}

$index = new Index();
$index->main();


?>
