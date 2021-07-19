<?php

class AuthHelper {

    public function __construct() {
    
    }
    //inicia sesion.
    static private function start() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    //inicia sesion y guarda la info de quien inicio la misma.
    static public function login($user) {
        self::start();
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['ID'] = $user->id;
        $_SESSION['USERNAME'] = $user->nombre;
        if ($user->admin == 2) {
            $_SESSION['ADMIN'] = 2;
        } else $_SESSION['ADMIN'] = 1;
    }

    //destruye la sesion.
    public static function logout() {
        self::start();
        session_destroy();
    }

    //obtengo nombre usuario loggeado.
    public static function getNombreUsuario() {
        self::start();
        if (isset($_SESSION['USERNAME'])) {
            return $_SESSION['USERNAME'];
        } else {
            return false;
        }
    }

    //obtengo si usurio es admin
    public static function getUsuarioAdmin() {
        self::start();
        if (isset($_SESSION['ADMIN'])) {
            if ($_SESSION['ADMIN'] == 2) {
                return 2;
            } else {
                return 1;
            }
        } else {
            return 0;
        }
    }

}