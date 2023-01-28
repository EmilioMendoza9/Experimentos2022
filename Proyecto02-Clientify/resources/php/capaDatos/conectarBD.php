<?php
    class baseDatos {
        public $host;
        public $usuario;
        public $clave;
        public $baseDatos;
        public $link;
        //$link = mysqli_connect('localhost','root','','portalingeniasi');
        public function __construct($host, $usuario, $clave, $baseDatos){
            $this->host = $host;
            $this->usuario = $usuario;
            $this->clave = $clave;
            $this->baseDatos = $baseDatos; 
            $this->link = new PDO("mysql:host=$host;dbname=portalingeniasi", $usuario, $clave);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$this->link = mysqli_connect($host, $usuario, $clave, $baseDatos);
        }
    }
    