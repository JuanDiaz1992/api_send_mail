<?php
class MySql{
    private $username='root';
    private $password ='';
    private $dns = 'mysql:dbname=app_test;host=localhost;port=3306';

    public function conection(){
        try {
            $gbd = new PDO($this->dns, $this->username, $this->password);
            $gbd->exec("set names utf8");
            return $gbd;
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }

}