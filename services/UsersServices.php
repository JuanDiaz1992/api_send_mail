<?php
require_once "data/UserDAO.php";
require_once "models/User.php";
class UsersServices{
    private $userDao;
    public function __construct(){
        $this->userDao = new UserDAO();
    }


    public function createUser($POST){
        $name = $POST['name'];
        $password = $POST['password'];
        $rol = $POST['rol'];
        $user = new User(null,$name,$password,$rol);
        return $this->userDao->post($user);

    }

    public function getAllUsers(): array{
        /*
        $result = $this->userDao->select();
        $userArray = array_map(function($user) {
            return $user->toArray();
        }, $result);
        $userArray = $this->orderArray($userArray);
        */
        $url = "https://rickandmortyapi.com/api/location";
        $response = file_get_contents($url);
        if (isset($response)){
            $data = json_decode($response,true);
        }
        $cantidad = count($data['results'][1]['residents']);
        return array("cantidad"=>$cantidad);
    }

    public function orderArray(array $users): array{
        if (count($users)<=1){
            return $users;
        }
        $pivote = $users[0];
        $listIzquierda = $listDerecha = array();
        foreach ($users as $user){
            if ($user['rol'] < $pivote['rol']){
                $listIzquierda[] = $user;
            }else if($user['rol'] > $pivote['rol']){
                $listDerecha[] = $user;
            }
        }
        $listIzquierda = $this->orderArray($listIzquierda);
        $listDerecha = $this->orderArray($listDerecha);

        return array_merge($listIzquierda, array($pivote), $listDerecha);
    }


}