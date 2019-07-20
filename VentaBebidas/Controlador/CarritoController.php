<?php
require '../Conexion.php';
require './ControladorBase.php';
class CarritoController extends ControladorBase{
    public $conectar;
    public $adapter;
     
    public function __construct() {
        parent::__construct();
          
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
     
   
     
 
}
