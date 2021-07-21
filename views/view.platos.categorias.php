<?php

require_once('view.php');
include_once('helpers/auth.helper.php');

class PlatosCategoriasView extends View
{
    public function __construct() {
        parent::__construct();
    }

    public function home() {

        $this->getSmarty()->assign('title', 'Home');
        $this->getSmarty()->display('templates/home.tpl');
    }

    public function historia() {

        $this->getSmarty()->assign('title', 'Historia');
        $this->getSmarty()->display('templates/historia.tpl');
    }

    public function ubicacion() {

        $this->getSmarty()->assign('title', 'Ubicacion');
        $this->getSmarty()->display('templates/ubicacion.tpl');
    }

    //funcion para mostrar la pagina de platos
    public function platos($categorias, $platos) {

        $this->getSmarty()->assign('title', 'Platos');
        $this->getSmarty()->assign('categorias', $categorias);
        $this->getSmarty()->assign('platos', $platos);
        $this->getSmarty()->display('templates/platos.tpl');
    }

    public function detalle($plato, $categorias) {
        $this->getSmarty()->assign('title', 'Detalle');
        $this->getSmarty()->assign('categorias', $categorias);
        $this->getSmarty()->assign('plato', $plato);
        $this->getSmarty()->display('templates/detalle.tpl');
    }

    public function showAgregar($categorias, $plato) {
        $this->getSmarty()->assign('title', 'Admin');
        $this->getSmarty()->assign('categorias', $categorias);
        $this->getSmarty()->display('templates/agregar.plato.tpl');
    }

    public function showAgregarCategoria($error=null){
        $this->getSmarty()->assign('title','Admin');
        $this->getSmarty()->assign('error', $error);        
        $this->getSmarty()->display('templates/agregar.categoria.tpl');
    }

    public function ShowEditCategoria($categoria) {
        $this->getSmarty()->assign('title', 'Edit');
        $this->getSmarty()->assign('categoria', $categoria);
        $this->getSmarty()->display('templates/form.editar.categoria.tpl');
    }

    public function ShowEditarPlatos($plato, $error) {
        $this->getSmarty()->assign('title', 'Edit');
        $this->getSmarty()->assign('plato', $plato);
        $this->getSmarty()->display('templates/form.editar.plato.tpl');
    }

    //creo una funcion general para mostrar errores, y recibo un mensaje por parametro
    //para poder utilizarla muchas veces en diferentes casos.
    public function showError($error)
    {
        $this->getSmarty()->assign('error', "Error");
        $this->getSmarty()->assign('subtitle', $error);
        $this->getSmarty()->display('templates/showError.tpl');
    }
}
