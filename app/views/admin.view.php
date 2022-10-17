<?php

class AdminView {

    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
    }

    function showProducts($products, $marcas) {
        $titulo = "Coffee Shop | Administrar Productos";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('products', $products);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/abm.products.tpl');
    }

    function showFormEditProduct($products, $marcas, $msg = '') {
        $titulo = "Coffee Shop | Administrar " . $products[0]->nombre;
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('products', $products);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/form.edit.product.tpl');
    }

    function showFormAddProduct($marcas, $msg = '') {
        $titulo = "Coffee Shop | Agregar Producto";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/form.add.product.tpl');
    }

    function showMarcas($marcas) {
        $titulo = "Coffee Shop | Administrar Marcas";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('marcas', $marcas);
        $this->smarty->display('templates/abm.marcas.tpl');
    }

    function showFormEditMarca($marca, $msg = '') {
        $titulo = "Coffee Shop | Administrar " . $marca[0]->nombre;
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('marca', $marca);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/form.edit.marca.tpl');
    }

    function showFormAddMarca($msg = '') {
        $titulo = "Coffee Shop | Agregar Marca";
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/form.add.marca.tpl');
    }

}