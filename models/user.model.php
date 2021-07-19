<?php

require_once('model.php');

class UserModel extends Model
{

    /**
     * @param $username
     * Trae toda la info de un usuario que coincida con el nombre pasado por parametro.
     */
    public function getUserByUsername($username)
    {

        $query = $this->getDb()->prepare('SELECT * FROM `user` WHERE nombre = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @param $user $name
     * Cargo un usuario en la base de datos
     */
    public function add($user, $pass)
    {
        //encripto la contraseña
        $passEnc = password_hash($pass, PASSWORD_DEFAULT);

        $query = $this->getDb()->prepare("INSERT INTO user (nombre, password, admin) VALUES (?, ?,?)");
        $query->execute([$user, $passEnc, 1]);
    }

    public function getUsuarios() {
 
        $query = $this->getDb()->prepare('SELECT * FROM user');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $id
     * Elimina un usuario en base al id pasado por parámetro
     */
    public function eliminar($id){
        $query = $this->getDb()->prepare('DELETE FROM user WHERE id = ?');
        return $query->execute([$id]);
    }

    
    public function cambiarPrivilegios($id, $admin){
        $query = $this->getDb()->prepare('UPDATE user SET admin = ? WHERE id = ?');
        $query->execute([$admin, $id]);
    }

    public function getRol($id) {
        $query = $this->getDb()->prepare('SELECT * FROM user WHERE id = ? AND admin = ?');
        $query->execute([$id, 2]);
        $admin = $query->fetchAll(PDO::FETCH_OBJ);

        if ($admin) {
           return true;
        } else {
            return false;
        }
    }

}

