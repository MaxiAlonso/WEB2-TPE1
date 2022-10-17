<?php

class MarcaModel {

    private $db;

    function __construct() {
        $this->db = $this->connect();
    }

    function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_cafeteria;charset=utf8','root','');
        return $db;
    }

    function getAll() {
        $query = $this->db->prepare('SELECT * FROM marca');
        $query->execute();
        $marcas = $query->fetchAll(PDO::FETCH_OBJ);
        return $marcas;
    }

    function get($marca) {
        $query = $this->db->prepare("SELECT * FROM marca WHERE nombre=?");
        $query->execute(array($marca));
        $marca = $query->fetchAll(PDO::FETCH_OBJ);
        return $marca;
    }

    function edit($id, $name, $country, $price) {
        $query = $this->db->prepare("UPDATE marca SET nombre=?, pais=?, precioAdicional=? WHERE id=?");
        $query->execute(array($name,$country,$price,$id));
    }

    function delete($name) {
        $query = $this->db->prepare("DELETE FROM marca WHERE nombre=?");
        $query->execute(array($name));
    }

    function add($name, $country, $price) {
        $query = $this->db->prepare("INSERT INTO marca (id, nombre, pais, precioAdicional) VALUES (?,?,?,?)");
        $query->execute(array(null, $name, $country, $price));
    }
}