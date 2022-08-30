<?php

class Registro_Objetos {
	private $perfil;
	private $name;
	private $last_name;
	private $edad;
	private $sex;
	private $direction;
	private $phone;
	private $mail;
	private $password;

	public function getPerfil() {
	    return $this->perfil;
    }

    public function setPerfil($perfil) {
	    $this->perfil=$perfil;
    }

    public function getName() {
	    return $this->name;
    }

    public function setName($name) {
	    $this->name=$name;
    }

    public function getLast_name() {
	    return $this->last_name;
    }

    public function setLast_name($last_name) {
	    $this->last_name=$last_name;
    }

    public function getAge() {
	    return $this->age;
    }

    public function setAge($age) {
	    $this->age=$age;
    }

    public function getSex() {
	    return $this->sex;
    }

    public function setSex($sex) {
	    $this->sex=$sex;
    }

    public function getDirection() {
	    return $this->direction;
    }

    public function setDirection($direction) {
	    $this->direction=$direction;
    }

    public function getPhone() {
	    return $this->phone;
    }

    public function setPhone($phone) {
	    $this->phone=$phone;
    }

    public function getMail() {
	    return $this->mail;
    }

    public function setMail($mail) {
	    $this->mail=$mail;
    }

    public function getPassword() {
	    return $this->password;
    }

    public function setPassword($password) {
	    $this->password=$password;
    }
}

?>