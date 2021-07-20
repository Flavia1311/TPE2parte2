<?php
require_once('models/platos.model.php');
require_once('views/view.platos.categorias.php');
require_once('models/categorias.model.php');
include_once('helpers/auth.helper.php');

class PlatosController {
    private $modelplatos;
    private $view;
    private $modelcategorias;

    public function __construct() {
        $this->modelplatos = new PlatosModel();
        $this->modelcategorias = new CategoriasModel();
        $this->view = new PlatosCategoriasView();
    }

    public function showHome() {
        $this->view->home();
    }

    public function showHistoria() {
        $this->view->historia();
    }

    public function showUbicacion() {
        $this->view->ubicacion();
    }

    public function showAllPlatos() {
        $categorias = $this->modelcategorias->getAll();
        $platos = $this->modelplatos->getAll();
        $this->view->platos($categorias, $platos);
    }

    //obtengo todo la info de un plato en particular a partir de la id.
    public function showDetail($id_plato) {
        $plato = $this->modelplatos->get($id_plato);
        $categorias = $this->modelcategorias->getAll();
        $this->view->detalle($plato, $categorias);
    }

    public function showPlatosXCategoria($id_categoria) {
        $categorias = $this->modelcategorias->getAll();
        $platos = $this->modelplatos->getbyID($id_categoria);
        $this->view->platos($categorias, $platos);
    }


    //funcion para mostrar el formulario de editar con la info de la base de datos precargada
    //con el id pasado por parametro (cuando aprieto el boton de la tarjeta)
    public function ShowEditar($id_plato, $error = null) {
        if (AuthHelper::getUsuarioAdmin())  {
            $plato = $this->modelplatos->get($id_plato);
            $this->view->ShowEditPlatos($plato, $error);
        }  
    }

    //funcion para editar un plato,si esta vacio el nombre, vuelve a mostrar el formulario con un
    //mensaje de error
    public function editar() {
        if (AuthHelper::getUsuarioAdmin() == 2) {
            $id_plato = $_POST['plato'];
            $nombre = $_POST['name'];
            $detail = $_POST['detail'];
            $nacionalidad = $_POST['nacionalidad'];

        if (!empty($nombre) && !empty($detail) && !empty($nacionalidad)) {
            if($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" 
            || $_FILES['imagen']['type'] == "image/png" ){
            $this->modelplatos->editar($id_plato, $nombre, $detail, $nacionalidad, $_FILES['imagen']['type']);
        } else {
            $this->modelplatos->editarSinImagen($id_plato, $nombre, $detail, $nacionalidad);
            }    header("Location: " . BASE_URL . 'platos');
        }
        else 
            $this->showEditar($id_plato, "Error, campos vacios");
        } else {
            $this->view->showError("Acceso denegado");  
        } 
    }

    public function agregar()
    {
        if (AuthHelper::getUsuarioAdmin()) { 
            $id = $_POST['categoria'];
            $nombre = $_POST['name'];
            $detail = $_POST['detail'];
            $nacionalidad = $_POST['nacionalidad'];
          
            if (!empty($nombre) && !empty($detail) && !empty($nacionalidad)) {

                if (($_FILES['imagen']['size']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")) {
                    $this->modelplatos->agregar($nombre, $detail, $nacionalidad, $id, $_FILES['imagen']['type']);
                } else {
                    $this->modelplatos->agregar($nombre, $detail, $nacionalidad, $id);
                }
                header("Location: " . BASE_URL . 'platos');
            } else  $this->showAgregar("Error, campos vacios");
        } else {
            $this->view->showError("Acceso denegado");
        }
    }
               
    public function showAgregar($error = null)
    {
        $categorias = $this->modelcategorias->getAll();

        $this->view->showAgregar($categorias, $error);
    }           
            
    //(cuando aprieto el boton que esta en cada tarjeta)
    public function eliminar($id)
    {
        if (AuthHelper::getUsuarioAdmin()) {
        $this->modelplatos->eliminar($id);
        header("Location: " . BASE_URL . 'platos');
        } else {
            $this->view->showError("Acceso denegado");
        }
    }

     
    public function showError($msg)
    {
        $this->view->showError($msg);
    }
}
