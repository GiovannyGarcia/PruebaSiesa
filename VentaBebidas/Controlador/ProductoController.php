<?php
require '../Conexion.php';
require './ControladorBase.php';
class ProductoController extends ControladorBase{
    public $conectar;
    public $adapter;
     
    public function __construct() {
        parent::__construct();
          
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
     
    public function index(){     
 
        //Producto
        $producto=new Producto($this->adapter);
        $allproducts=$producto->getAll();
        
        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "allproducts" => $allproducts,
        ));
    } 
     
 
}
