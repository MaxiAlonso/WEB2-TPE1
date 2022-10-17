<?php

class UserModel {

    private $db;

    function __construct() {
        $this->db = $this->connect();
    }

    function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_cafeteria;charset=utf8','root','');
        return $db;
    }

    function get($email) {
        $query = $this->db->prepare("SELECT * FROM users WHERE email=?");
        $query->execute(array($email));
        $user = $query->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }
}