<?php
require_once ('models/comentarios.model.php');
require_once ('api/api.view.php');
include_once('helpers/auth.helper.php');

class ComentariosApiController{
    private $model;
    private $view;
    private $data;

    public function __construct() {
        $this->model = new ComentariosModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
 
    }

   private function getData()
   {
       return json_decode($this->data);
   }


    public function obtenerComentarios($params=[]){
    
        $id = $params[':ID'];
        $comentarios = $this->model->obtenerComentarios($id);
        return $this->view->response($comentarios, 200);
    }

    public function agregarComentario()
    {

        $datos = $this->getData();

        $user = $datos->nombre;
        $comentario = $datos->comentario;
        $puntuacion = $datos->puntaje;
        $plato= $datos->id_plato;
       

        $res = $this->model->agregar($user, $comentario, $puntuacion, $plato);
        if ($res) {
            return $this->view->response($res, 200);
        } else {
            return $this->view->response(null, 200);
        }
    }
    function eliminarComentario($params = [])
    {
        if (AuthHelper::getUsuarioAdmin() == 2) {

            $id = $params[':ID'];

            $res = $this->model->eliminarComentario($id);
            if ($res) {
                return $this->view->response($res, 200);
            } else {
                return $this->view->response(null, 200);
            }
        } 
    }
}
