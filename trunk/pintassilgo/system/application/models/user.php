<?php

class User extends Model implements Storable {

    private $admin;
    private $username;
    //palavra-chave
    private $displayName;
    private $email;
    private $blog;
    private $birthdate;
    private $interests;

    //TODO: completar esta classe
    public function __construct(){
        parent::__construct();
    }


    public function store($id = 0) {

    }

    public function remove() {

    }

    public function update() {

    }

    public function load($id = 0) {

    }

    public function findById($id) {

    }

    public function findAll() {

    }

}

?>
