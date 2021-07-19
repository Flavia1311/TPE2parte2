<?php
require_once('libs/Smarty.class.php');

class View {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->assign('url', BASE_URL);
        $authHelper = new AuthHelper();
        $username = $authHelper->getNombreUsuario();
        $admin = $authHelper->getUsuarioAdmin();
        $this->getSmarty()->assign('username', $username);
        $this->getSmarty()->assign('admin', $admin);
    }    

    public function getSmarty() {
        return $this->smarty;
    }
}


