<?php
require_once 'app/views/admin.view.php';
require_once 'app/models/product.model.php';
require_once 'app/models/marca.model.php';
require_once 'app/controllers/secure.controller.php';

class AdminController extends SecureController {

    private $view;
    private $productModel;
    private $marcaModel;

    function __construct() {
        parent::__construct();
        $this->view = new AdminView();
        $this->productModel = new ProductModel();
        $this->marcaModel = new MarcaModel();
    }

    function showProducts() {
        $products = $this->productModel->getAll();
        $marcas = $this->marcaModel->getAll();
        $this->view->showProducts($products, $marcas);
    }

    function showEditProduct($name) {
        $products = $this->productModel->get($name);
        $marcas = $this->marcaModel->getAll();
        $this->view->showFormEditProduct($products, $marcas);
    }

    function verificarEditProduct($name) {
        $products = $this->productModel->get($name);
        $marcas = $this->marcaModel->getAll();
        if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['cant']) && !empty($_POST['price']) && !empty($_POST['marca'])) {
            if (isset($_POST['modificarProducto'])) {
                if ($name == $_POST['name']) { //SI EL NOMBRE ES EL MISMO, EDITO DE UNA
                    if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png")
                        $this->productModel->edit($products[0]->id, $_POST['name'], $_FILES['input_name']['tmp_name'], $_POST['description'], $_POST['cant'], $_POST['price'], $_POST['marca']);
                    else
                        $this->productModel->edit($products[0]->id, $_POST['name'], $products[0]->imagen, $_POST['description'], $_POST['cant'], $_POST['price'], $_POST['marca']);
                    header('Location: ' . BASE_URL . 'administrar-productos');
                }
                else { //SI NO, CHEQUEO QUE EL NOMBRE ESTÉ DISPONIBLE
                    if (!$this->existProduct($_POST['name'])) {
                        if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png")
                            $this->productModel->edit($products[0]->id, $_POST['name'], $_FILES['input_name']['tmp_name'], $_POST['description'], $_POST['cant'], $_POST['price'], $_POST['marca']);
                        else $this->productModel->edit($products[0]->id, $_POST['name'], $products[0]->imagen, $_POST['description'], $_POST['cant'], $_POST['price'], $_POST['marca']);
                        header('Location: ' . BASE_URL . 'administrar-productos');
                    } else $this->view->showFormEditProduct($products, $marcas, "Ya hay un producto ingresado con ese nombre.");
                }
            }
            else {
                $this->productModel->delete($products[0]->nombre);
                header('Location: ' . BASE_URL . 'administrar-productos');
            }
        } $this->view->showFormEditProduct($products, $marcas, "Por favor no deje campos sin completar.");
    }

    function showAddProduct() {
        $marcas = $this->marcaModel->getAll();
        $this->view->showFormAddProduct($marcas);
    }

    function verificarAddProduct() {
        $marcas = $this->marcaModel->getAll();
        if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['cant']) && !empty($_POST['price']) && !empty($_POST['marca'])) {
            if (!$this->existProduct($_POST['name'])) {
                if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png") {
                    $this->productModel->add($_POST['name'], $_FILES['input_name']['tmp_name'], $_POST['description'], $_POST['cant'], $_POST['price'], $_POST['marca']);
                    header('Location: ' . BASE_URL . 'administrar-productos');
                }
                else 
                    $this->view->showFormAddProduct($marcas, "Ingrese una imagen por favor (.jpg).");
            } else $this->view->showFormAddProduct($marcas, "Ya hay un café ingresado con ese nombre.");
        } else $this->view->showFormAddProduct($marcas);
    }

    function existProduct($name) {
        $products = $this->productModel->getAll();
        foreach($products as $product) {
            if ($product->nombre == $name) return true;
        }
        return false;
    }

    function showMarcas() {
        $marcas = $this->marcaModel->getAll();
        $this->view->showMarcas($marcas);
    }

    function isDeleteable($id) {
        $products = $this->productModel->getAll();
        foreach($products as $product) {
            if ($product->id_marca_fk == $id) return false;
        }
        return true;
    }

    function showEditMarca($name) {
        $marca = $this->marcaModel->get($name);
        $this->view->showFormEditMarca($marca);
    }

    function verificarEditMarca($name) {
        $marca = $this->marcaModel->get($name);
        if (!empty($_POST['name']) && !empty($_POST['country']) && !empty($_POST['price'])) {
            if (isset($_POST['modificarMarca'])) {
                if ($name == $_POST['name']) { //SI EL NOMBRE NO CAMBIÓ, EDITO DE UNA
                    $this->marcaModel->edit($marca[0]->id, $_POST['name'], $_POST['country'], $_POST['price']);
                    header('Location: ' . BASE_URL . 'administrar-marcas');
                }
                else { //SI NO, CHEQUEO QUE EL NOMBRE ESTÉ DISPONIBLE
                    if (!$this->existMarca($_POST['name'])) {
                        $this->marcaModel->edit($marca[0]->id, $_POST['name'], $_POST['country'], $_POST['price']);
                        header('Location: ' . BASE_URL . 'administrar-marcas');
                    } else $this->view->showFormEditMarca($marca, "Ya hay una marca ingresada con ese nombre.");
                }
            }
            else {
                if ($this->isDeleteable($marca[0]->id)) {
                    $this->marcaModel->delete($marca[0]->nombre);
                    header('Location: ' . BASE_URL . 'administrar-marcas');
                }
                else $this->view->showFormEditMarca($marca, "No se puede borrar esta marca porque hay productos que la utilizan.");
            }
        } else $this->view->showFormEditMarca($marca, "Por favor no deje campos sin completar.");
    }

    function showAddMarca() {
        $this->view->showFormAddMarca();
    }

    function verificarAddMarca() {
        if (!empty($_POST['name']) && !empty($_POST['country']) && !empty($_POST['price'])) {
            if (!$this->existMarca($_POST['name'])) {
                $this->marcaModel->add($_POST['name'],$_POST['country'],$_POST['price']);
                header('Location: ' . BASE_URL . 'administrar-marcas');
            } else $this->view->showFormAddMarca("Ya hay una marca ingresada con ese nombre.");
        } else $this->view->showFormAddMarca();
    }

    function existMarca($name) {
        $marcas = $this->marcaModel->getAll();
        foreach($marcas as $marca) {
            if ($marca->nombre == $name) return true;
        }
        return false;
    }

}