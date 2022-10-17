<?php
    require_once 'app/controllers/public.controller.php';
    require_once 'app/controllers/admin.controller.php';
    require_once 'app/controllers/login.controller.php';
    require_once 'libs/Smarty.class.php';
    
    define('BASE_URL','http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']).'/');

    $action = 'home';                                                       // acción por defecto
    if (!empty($_GET['action'])) $action = $_GET['action'];                 // cambio si la acción está setteada

    $params = explode('/',$action);                                         //parseo la acción, ejemplo marcas/Mocca => ['marcas', 'Mocca]

    $publicController = new PublicController();
    $loginController = new LoginController();

    switch ($params[0]){
        case 'home':
            $publicController->showHome();
            break;
        case 'productos':
            if (empty($params[1]))
                $publicController->showProducts();                          // si no hay parámetro muestra todos los productos
            else
                $publicController->showProduct($params[1]);                 // si lo hay, muestra el producto deseado
            break;
        case 'marcas':
            if (empty($params[1])) 
                $publicController->showMarcas();
            else 
                $publicController->showMarca($params[1]);
            break;

//      ABM Producto
        case 'administrar-productos':
            if (empty($params[1])) {
                $controller = new AdminController();
                $controller->showProducts();
                break;
            }
            else {
                switch ($params[1]) {
                    case 'editar-producto':
                        if (empty($params[3])) {
                            $controller = new AdminController();
                            $controller->showEditProduct($params[2]);
                            break;
                        } else {
                            $controller = new AdminController();
                            $controller->verificarEditProduct($params[2]);
                            break;
                        }
                    case 'agregar-producto':
                        if (empty($params[2])) {
                            $controller = new AdminController();
                            $controller->showAddProduct();
                            break;
                        } else {
                            $controller = new AdminController();
                            $controller->verificarAddProduct();
                            break;
                        }
                    default:
                        echo ('404 page not found');
                        break;
                }
                break;
            }

//      ABM Marca
        case 'administrar-marcas':
            if (empty($params[1])) {
                $controller = new AdminController();
                $controller->showMarcas();
                break;
            }
            else {
                switch ($params[1]) {
                    case 'editar-marca':
                        if (empty($params[3])) {
                            $controller = new AdminController();
                            $controller->showEditMarca($params[2]);
                            break;
                        } else {
                            $controller = new AdminController();
                            $controller->verificarEditMarca($params[2]);
                            break;
                        }
                    case 'agregar-marca':
                        if (empty($params[2])) {
                            $controller = new AdminController();
                            $controller->showAddMarca();
                            break;
                        } else {
                            $controller = new AdminController();
                            $controller->verificarAddMarca();
                            break;
                        }
                    default:
                        echo ('404 page not found');
                        break;
                }
                break;
            }
        case 'login':
            if (empty($params[1])) 
                $loginController->login();
            else 
                $loginController->verificarLogin();
            break;
        case 'logout':
            $loginController->logout();
            break;
        default:
            echo ('404 page not found');
            break;
    }