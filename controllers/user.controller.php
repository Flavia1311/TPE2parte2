<?php

include_once('views/user.view.php');
include_once('models/user.model.php');
include_once('helpers/auth.helper.php');
include_once('views/view.platos.categorias.php');
class UserController
{

    private $model;
    private $view;
    private $viewPlatoCategoria;
    private $user;
    private $pass;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
        $this->viewPlatoCategoria = new PlatosCategoriasView();
    }

    //funcion para mostrar registro
    public function showRegister() {
        $this->view->showRegister();
    }

    //funcion para registrar usuario
    public function registrar()
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if (!empty($user) && !empty($pass)) {
            $this->model->add($user, $pass);
            header("Location: " . BASE_URL . 'home');
            $this->login();
        } else {
            $this->view->showRegister("User o Password incompleto");
        }
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function verificar() {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $userDb = $this->model->getUserByUsername($user);

            if (!empty($userDb) && password_verify($pass, $userDb->password)) {
                AuthHelper::login($userDb);
                header("Location: " . BASE_URL . 'home');
            } else
                $this->view->showLogin("Login incorrecto, password o usuario incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }
    public function showUsuarios(){
    
        
        $usuarios = $this->model->getUsuarios();
        $this->view->showUsuarios($usuarios);
    }

    public function login() {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $userDb = $this->model->getUserByUsername($user);

            if (!empty($userDb) && password_verify($pass, $userDb->password)) {
                AuthHelper::login($userDb);
                header("Location: " . BASE_URL . 'home');
            } else
                $this->view->showLogin("Login incorrecto, password o usuario incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }
    

     //funcion para eliminar usuario
     public function eliminar($id){
        if (AuthHelper::getUsuarioAdmin()){
            $this->model->eliminar($id);
            header("Location: " . BASE_URL . 'listaUsuarios');
        } 
        }

    
     //funcion para editar permisos de usuario
     public function cambiarPrivilegios($id){
        if (AuthHelper::getUsuarioAdmin()){
          $admin = $this->model->getRol($id); 
            
            if ($admin) {
                $this->model->cambiarPrivilegios($id, 1);
            } else {
                $this->model->cambiarPrivilegios($id, 2);
            }
            header("Location: " . BASE_URL . 'listaUsuarios');
        } else {
            $this->viewPlatoCategoria->showError("Acceso denegado");
        } 
    }

    //funcion para cerrar sesion.
    public function logout()
    {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'platos');
    }
}
