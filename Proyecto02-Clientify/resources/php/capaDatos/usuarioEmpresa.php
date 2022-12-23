<?php
$ruta = dirname(__DIR__);
require_once($ruta.'/conectarBD.php');
class relacionDatos extends baseDatos{
    public function insertRelacion($idEmpresa, $idUsuario){
        $query = $this->link->prepare("INSERT INTO relacionempresausuario (idEmpresa, idUsuario) VALUES (:empresa, :usuario)");
        $query->bindParam(":empresa", $idEmpresa);
        $query->bindParam(":usuario", $idUsuario);
        if ($query->execute()) {
          return "New record created successfully";
        } else {
          return "Unable to create record";
        }
    }

    public function eliminarRelacion($idEmpresa, $idUsuario){
        $query = $this->link->prepare("DELETE FROM relacionempresausuario WHERE idEmpresa = :empresa AND idUsuario = :usuario");
        $query->bindParam(":empresa", $idEmpresa);
        $query->bindParam(":usuario", $idUsuario);
        if ($query->execute()) {
          return "New record remove successfully";
        } else {
          return "Unable to create record";
        }
    }

    public function consultarUsuario($correo, $telefono){
      try {
        $query = $this->link->prepare('SELECT * FROM usuario 
        WHERE correo = :correo OR telefono = :telefono');
        $query->bindValue(":correo", $correo);
        $query->bindValue(":telefono", $telefono);
        $query->execute();
      
        // set the resulting array to associative
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetchAll();
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
    }
}