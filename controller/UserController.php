<?php
require_once "services/UsersServices.php";
class UserController{
    private $userService;
    public function __construct(){
        $this->userService = new UsersServices();
    }
    public function getAllUsers(){
        $userList = $this->userService->getAllUsers();
        echo json_encode($userList);
    }
    public function createUser($POST){
        $result = $this->userService->createUser($POST);
        echo json_encode($result);
    }
}