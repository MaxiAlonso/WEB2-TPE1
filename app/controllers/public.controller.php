<?php
require_once 'app/views/public.view.php';
require_once 'app/models/product.model.php';
require_once 'app/models/marca.model.php';

class PublicController {

    private $view;
    private $productModel;
    private $marcaModel;

    function __construct() {
        session_start();
        $this->view = new PublicView();
        $this->productModel = new ProductModel();
        $this->marcaModel = new MarcaModel();
    }

    function showHome() {
        $this->view->showHome();
    }

    function showProducts() {
        $products = $this->productModel->getAll();
        $marcas = $this->marcaModel->getAll();
        $this->view->showProducts($products, $marcas);
    }

    function showProduct($name) {
        $products = $this->productModel->get($name);
        $marcas = $this->marcaModel->getAll();
        $this->view->showProduct($products, $marcas, $name);
    }

    function showMarcas() {
        $marcas = $this->marcaModel->getAll();
        $this->view->showMarcas($marcas);
    }

    function showMarca($name) {
        $marca = $this->marcaModel->get($name);
        $products = $this->productModel->getByMarca($marca[0]->id);
        $this->view->showMarca($marca, $products);
    }

}