<?php

class ProductModel {

    private $db;

    function __construct() {
        $this->db = $this->connect();
    }

    function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_cafeteria;charset=utf8','root','');
        return $db;
    }

    function getAll() {
        $query = $this->db->prepare('SELECT * FROM tipodecafe');
        $query->execute();
        $products = $query->fetchAll(PDO::FETCH_OBJ); //devuelve un arreglo con todos los tipos de café
        return $products;
    }

    function get($product) {
        $query = $this->db->prepare("SELECT * FROM tipodecafe WHERE nombre=?");
        $query->execute(array($product));
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function getByMarca($id_marca) {
        $query = $this->db->prepare("SELECT * FROM tipodecafe WHERE id_marca_fk=?");
        $query->execute(array($id_marca));
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function edit($id, $name, $img, $desc, $cant, $price, $id_marca) {
        if (substr($img,0,-17) != 'images/products/') $pathImg = $this->uploadImage($img); // Chequeo que la imagen no esté guardada ya en la base de datos.
        else $pathImg = $img;
        $query = $this->db->prepare("UPDATE tipodecafe SET nombre=?, imagen=?, descripcion=?, cantidad=?, precioBase=?, id_marca_fk=? WHERE id=?");
        $query->execute(array($name, $pathImg, $desc, $cant, $price, $id_marca, $id));
    }

    function delete($name) {
        $query = $this->db->prepare("DELETE FROM tipodecafe WHERE nombre=?");
        $query->execute(array($name));
    }

    function add($name, $img, $desc, $cant, $price, $idMarca) {
        $pathImg = $this->uploadImage($img);
        $query = $this->db->prepare("INSERT INTO tipodecafe (id, nombre, imagen, descripcion, cantidad, precioBase, id_marca_fk) VALUES (?,?,?,?,?,?,?)");
        $query->execute(array(null, $name, $pathImg, $desc, $cant, $price, $idMarca));
    }

    private function uploadImage($img){
        $target = "images/products/" . uniqid() . ".jpg";  
        move_uploaded_file($img, $target);
        return $target;
    }
}