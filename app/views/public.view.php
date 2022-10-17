<?php

class PublicView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showHome() {
        $titulo = "Coffee Shop | Home";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->display('templates/home.tpl');
    }

    function showProducts($products, $marcas) {
        $titulo = "Coffee Shop | Productos";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('products', $products);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/productos.tpl');
    }

    function showProduct($products, $marcas) {
        $titulo = "Coffee Shop | " . $products[0]->nombre;
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('products', $products);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/producto.tpl');
    }

    function showMarcas($marcas) {
        $titulo = "Coffee Shop | Marcas";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/marcas.tpl');
    }

    function showMarca($marca, $products) {
        $titulo = "Coffee Shop | " . $marca[0]->nombre;
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('marca', $marca);
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/marca.tpl');
    }
}