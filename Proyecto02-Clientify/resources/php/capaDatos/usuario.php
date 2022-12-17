<?php
//require_once('./resources/php/conectarBD.php');
class usuarioDatos extends baseDatos{
    public function insertUsuario(){
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

    public function consultarUsuario(){
      try {
        $query = $this->link->prepare("SELECT id, firstname, lastname FROM MyGuests");
        $query->execute();

        // set the resulting array to associative
        $result = $query->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($query->fetchAll())) as $k=>$v) {
          echo $v;
        }
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
}