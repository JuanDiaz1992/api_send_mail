<?php
require_once "controller/UserController.php";
class Routes{
    private $userController;
    public function __construct(){
        $this->userController = new UserController();
    }
    public function initRoutes(){
        $route = explode("/",$_SERVER['REQUEST_URI']);
        $arrayFilter = array_filter($route);
        $table = explode("?",$arrayFilter[2])[0];
        if (isset($_SERVER["REQUEST_METHOD"])){
            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                if($table == "users"){
                    $this->userController->getAllUsers();
                }
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $data = json_decode(file_get_contents('php://input'), true);
                if($table == "createUser"){
                    $this->userController->createUser($data);
                }
            }
        }
        return;
    }


}