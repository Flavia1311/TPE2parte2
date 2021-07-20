<?php
require_once('model.php');

//Las clases siempre empiezan con mayusculas
class PlatosModel extends Model
{

    /**
     * @return array
     */
    public function getAll()
    {
        $query = $this->getDb()->prepare('SELECT * FROM platos ORDER BY id_plato DESC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $id
     * @return array
     */
    public function get($id_plato)
    {
        $query = $this->getDb()->prepare('SELECT * FROM platos WHERE id_plato = ?');
        $query->execute(array($id_plato));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param $id
     * @return array
     */
    public function getbyID($id_categoria)
    {
        $query = $this->getDb()->prepare('SELECT * FROM platos WHERE id_categoria = ? ORDER BY nombre ASC');
        $query->execute([$id_categoria]);
        return $query->fetchAll(PDO::FETCH_OBJ);


}
    public function agregar($nombre, $detail, $nacionalidad, $id, $imagen= null)
    {
        $pathImg = null;
        if($imagen) {
            $pathImg= $this->uploadImage($imagen);
        }  
        $query = $this->getDb()->prepare("INSERT INTO platos (nombre, detalle, nacionalidad, id_categoria, imagen) VALUES (?, ?, ?, ?, ?)");
        return$query->execute([$nombre, $detail, $nacionalidad, $id_plato, $pathImg]);
    }
    
    public function edit ($nombre, $detail, $nacionalidad, $id, $imagen = NULL)
    {
        if ($imagen) {
            $pathImg = $this->uploadImage($imagen);
        }

        $query = $this->getDb()->prepare('UPDATE platos SET nombre = ?, detalle = ?, nacionalidad = ?, id_categoria,
            imagen = ? WHERE id_plato = ?');
        return$query->execute([$nombre, $detail, $nacionalidad, $id_plato, $pathImg]);
    }

    /**
     * @param $nombre, $detail, $precio, $dias
     * Edito un plato en base al nombre, detail, precio y dias pasados por parámetro
     */
    public function editarSinImagen($nombre, $detail, $nacionalidad, $id)
    {

        $query = $this->getDb()->prepare('UPDATE platos SET nombre = ?, detalle = ?, nacionalidad = ?, id_categoria,
            detalle = ?  WHERE id = ?');
        $query->execute([$nombre, $detail, $nacionalidad, $id, $pathImg]);
    }


    function uploadImage()
    {

        // Nombre archivo original
        $nombreOriginal = $_FILES['imagen']['name'];
        // Nombre en el file system:
        $nombreFisico = $_FILES['imagen']['tmp_name'];

        $nombreFinal = "uploads/" . uniqid("", true) . "."
            . strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));


        move_uploaded_file($nombreFisico, $nombreFinal);

        return $nombreFinal;
    }




    
    public function eliminar($id_plato)
    {
        $query = $this->getDb()->prepare('DELETE FROM platos WHERE id_plato = ?');
        $query->execute([$id_plato]);
    }
}
