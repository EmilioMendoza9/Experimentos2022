<?php
$ruta = dirname(__DIR__);
require_once($ruta.'/conectarBD.php');
class usuarioDatos extends baseDatos{
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

    public function consultarUsuarioID($id){
      try {
        $query = $this->link->prepare('SELECT * FROM usuario 
        WHERE id = :id');
        $query->bindValue(":id", $id);
        $query->execute();
      
        // set the resulting array to associative
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetchAll();
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
    }

    public function consultarEmpresasSuscritas($idUsuario){
      try {
        $query = $this->link->prepare('SELECT * FROM relacionempresausuario
        join empresa 
        on relacionempresausuario.idEmpresa = empresa.id
        WHERE idUsuario = :id');
        $query->bindParam(":id", $idUsuario);
        $query->execute();
      
        // set the resulting array to associative
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetchAll();
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
    }

    public function cambiarContraseña($id, $contra){
      $query = $this->link->prepare("UPDATE usuario SET clave=:contra WHERE id=:idUsuario ");
      $query->bindParam(":contra", $contra);
      $query->bindParam(":idUsuario", $id);
      if ($query->execute()) {
        return "New record created successfully";
      } else {
        return "Unable to create record";
      }
  }
}