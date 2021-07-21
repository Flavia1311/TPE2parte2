<?php
require_once('models/categorias.model.php');
require_once('views/view.platos.categorias.php');
include_once('helpers/auth.helper.php');

class CategoriasController {
    private $view;
    private $modelcategorias;

    public function __construct() {
        $this->modelcategorias = new CategoriasModel();
        $this->view = new PlatosCategoriasView();
    }

    public function ShowEditar($id) {
        if (AuthHelper::getUsuarioAdmin())  {
            if (!empty($_POST['categoria'])){
                $id = $_POST['categoria'];
            }
            $categoria = $this->modelcategorias->get($id);
            $this->view->ShowEditCategoria($categoria);
        } else {
            $this->view->showError("Acceso denegado");
        }  
    }

    public function editar() {
        if (AuthHelper::getUsuarioAdmin())  {

        $id_plato = $_POST['categoria'];
        $nombre = $_POST['name'];

        if (!empty($_POST['name'])) {
            $this->modelcategorias->edit($id, $nombre);
            header("Location: " . BASE_URL . 'platos');
            } else
            $this->ShowEditar($id, "Error, nombre vacio");
        }else {
            $this->view->showError("Acceso denegado");
        }
    }

    
    public function agregar() {
        if (AuthHelper::getUsuarioAdmin()){
            $nombre = $_POST['name'];
           
            if (!empty($_POST['name'])) {
                //busco en la tabla de categorias alguno que coincida con el nombre puesto por el usuario.
                $this->modelcategorias->agregar($nombre);
                header("Location: " . BASE_URL . 'platos');
            } else
    
                $this->view->showError("No es posible agregar categorias vacios");
            }
        }


        
        //funcion para eliminar una categoria de la base que coincida con el id 
    
    public function eliminar($id) {
        if (AuthHelper::getUsuarioAdmin()){
            if (!empty($_POST['categoria'])) {
            $id = $_POST['categoria'];
        }
        $this->modelcategorias->eliminar($id);
        header("Location: " . BASE_URL . 'platos');
    } else {
        $this->view->showError("Acceso denegado");
    }
}



}