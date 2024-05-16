<?php
require_once "data/MySql.php";
require_once "models/User.php";
class UserDAO{

    private $SQL_SELECT = "SELECT id_user, name, password, rol FROM user";
    private $SQL_INSERT = "INSERT INTO user (name, password, rol) VALUES (?, ?, ?)";
    private $db;
    public function __construct(){
        $this->db = new MySql();
    }
    public function select(): array{
        $conection = $this->db->conection();
        $stmt = $conection->prepare($this->SQL_SELECT);
        $stmt->execute();
        $responses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $userList = array();
        foreach ($responses as $response){
            $user = new User($response['id_user'],$response['name'],$response['password'],$response['rol']);
            $userList[] = $user;
        }
        return $userList;
    }

    public function post(User $user): int {
        $name = $user->getName();
        $password = $user->getPassword();
        $rol = $user->getRol();

        $conection = $this->db->conection();
        $stmt = $conection->prepare($this->SQL_INSERT);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3,$rol);
        $stmt->execute();
        $lastId = $conection->lastInsertId();
        $stmt->closeCursor();
        return $lastId;
    }


}