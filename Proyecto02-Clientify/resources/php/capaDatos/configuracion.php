<?php
require_once('conectarBD.php');
class configuracionDatos extends baseDatos{
    public function insertUsuario($nombre){
        $query = $this->link->prepare("INSERT INTO Students (name, lastname, email) VALUES (:first_name, :last_name, :email)");
        $query->bindParam(":first_name", $first_Name);
        $query->bindParam(":last_name", $last_Name);
        $query->bindParam(":email", $email);
        if ($query->execute()) {
            echo "New record created successfully";
        } else {
            echo "Unable to create record";
        }
    }

    public function consultarUsuario($idUsuario){
        try {
            $query = $this->link->prepare('SELECT * FROM matrizconfiguracion  
            WHERE idUsuario = :idUsuario');
            $query->bindParam(":idUsuario", $idUsuario);
            $query->execute();
        
            // set the resulting array to associative
            $result = $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();
        } catch(PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function actualizarPrivacidad($id){
        $obj = $this->consultarUsuario($id);
        if($obj[0]["datosPrivados"] == "Y"){
            $opcion = "N";
        }
        else{
            $opcion = "Y";
        }
        $query = $this->link->prepare("UPDATE matrizconfiguracion SET datosPrivados =:priv WHERE idUsuario=:idUsuario ");
        $query->bindParam(":priv", $opcion);
        $query->bindParam(":idUsuario", $id);
        if ($query->execute()) {
            return "New record created successfully";
        } else {
            return "Unable to create record";
        }
    }
}