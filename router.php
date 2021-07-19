<?php
require_once('controllers/platos.controller.php');
require_once('controllers/categorias.controller.php');
require_once('controllers/user.controller.php');

if ($_GET['action'] == '') {
    $_GET['action'] = 'home';
}

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$param = explode('/', $_GET['action']); //con el explode parseo la url


switch ($param[0]) {
    case 'home':
        $PlatosController = new PlatosController();
        $PlatosController->showHome();
        break;

    case 'historia':
        $PlatosController = new PlatosController();
        $PlatosController->showHistoria();
        break;

    case 'ubicacion':
        $PlatosController = new PlatosController();
        $PlatosController->showUbicacion();
        break;

    case 'platos':
        $PlatosController = new PlatosController();
        $PlatosController->showAllPlatos();
        break;
        
    case 'detalle':
        $PlatosController = new PlatosController();
        $PlatosController->showDetail($param[1]);
        break;

    case 'categoria':
        $PlatosController = new PlatosController();
        $PlatosController->showPlatosXCategoria($param[1]);
        break;
    case 'formEditarCategoria':
        $CategoriasController = new CategoriasController();
        $CategoriasController->ShowEditar($param[1]);
        break;

    case 'editarCategoria':
        $CategoriasController = new CategoriasController();
        $CategoriasController->editar();
        break;

    case 'eliminarCategoria':
        $CategoriasController = new CategoriasController();
        $CategoriasController->eliminar($param[1]);
        break;
    case 'agregarCategoria':
        $CategoriasController = new CategoriasController();
        $CategoriasController->agregar();
        break;

    case 'formEditarPlato':
        $PlatosController = new PlatosController();
        $PlatosController->ShowEditar($param[0]);
        break;

    case 'editarPlato':
        $PlatosController = new PlatosController();
        $PlatosController->editar();
        break;

    case 'formAgregarPlato':
        $PlatosController = new PlatosController();
        $PlatosController->showAgregar();
        break;

    case 'agregarPlato':
        $PlatosController = new PlatosController();
        $PlatosController->agregar();
        break;

    case 'eliminarPlato':
        $PlatosController = new PlatosController();
        $PlatosController->eliminar($param[1]);
        break;
        
    case 'listaUsuarios':
        $UserController = new UserController();
        $UserController->showUsuarios();
        break;

    case 'eliminarUsuario':
        $UserController = new UserController();
        $UserController->eliminar($param[1]);
        break;
        
    case 'cambiarPrivilegios':
        $UserController = new UserController();
        $UserController->cambiarPrivilegios($param[1]);
        break;
    

    case 'formRegistro':
        $UserController = new UserController();
        $UserController->showRegister();
        break;

    case 'registrar':
        $UserController = new UserController();
        $UserController->registrar();
        break;

    case 'login':
        $UserController = new UserController();
        $UserController->showLogin();
        break;

    case 'verificar':
        $UserController = new UserController();
        $UserController->verificar();
        break;

    case 'logout':
        $UserController = new UserController();
        $UserController->logout();
        break;
    
    default:
        $PlatosController = new PlatosController();
        $PlatosController->showError("Pagina no encontrada");
}
