<?php
    class baseDatos {
        private $host;
        private $usuario;
        private $clave;
        private $baseDatos;
        public $link;
        //$link = mysqli_connect('localhost','root','','portalingeniasi');
        public function __construct($host, $usuario, $clave, $baseDatos){
            $this->host = $host;
            $this->usuario = $usuario;
            $this->clave = $clave;
            $this->baseDatos = $baseDatos;
            $link = mysqli_connect($host, $usuario, $clave, $baseDatos);
        }
    }
    