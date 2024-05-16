<?php

class User{
    private $idUser;
    private $name;
    private $password;
    private $rol;

    public function __construct($idUser = null, $name = null, $password = null, $rol = null){
        $this->idUser = $idUser;
        $this->name = $name;
        $this->password = $password;
        $this->rol = $rol;
    }
    public function toArray() {
        return [
            'idUser' => $this->idUser,
            'name' => $this->name,
            'rol' => $this->rol
        ];
    }
    /**
     * @return mixed|null
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed|null $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    /**
     * @return mixed|null
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed|null $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed|null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed|null $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}