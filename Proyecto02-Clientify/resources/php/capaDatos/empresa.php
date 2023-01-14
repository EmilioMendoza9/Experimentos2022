<?php
$ruta = dirname(__DIR__);
require_once($ruta.'/conectarBD.php');
class empresaDatos extends baseDatos{
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
  
    public function consultarEmpresas(){
      try {
        $query = $this->link->prepare('SELECT * FROM empresa');
        $query->execute();
      
        // set the resulting array to associative
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetchAll();
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
    }

    public function consultarClientes($correo){
      try {
        $query = $this->link->prepare('SELECT * FROM empresa 
        JOIN relacionempresausuario 
        ON empresa.id = relacionempresausuario.idEmpresa 
        WHERE correoDueño = :correo');
        $query->bindParam(":correo", $correo);
        $query->execute();
      
        // set the resulting array to associative
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetchAll();
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
    }

    public function consultarEmpresaPorDueño($correo)
    {
      try {
        $query = $this->link->prepare('SELECT * FROM empresa WHERE correoDueño = :correo');
        $query->bindParam(":correo", $correo);
        $query->execute();
      
        // set the resulting array to associative
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetchAll();
      } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
      }
    }
}