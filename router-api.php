<?php
require_once("libs/Router.php");
require_once("api/api.comentarios.controller.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];

// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute('comentarios/:ID', 'GET', 'ComentariosApiController', 'obtenerComentarios');
$router->addRoute('comentario', 'POST', 'ComentariosApiController', 'agregarComentario');
$router->addRoute('comentario/:ID', 'DELETE', 'ComentariosApiController', 'eliminarComentario');


// rutea
$router->route($resource, $method);
