<?php
class Producto
{
    //Atributos
    public $id;
    public $Titulo;
    public $Descripcion;
    public $Precio;
    public $Descuento;
    public $FechaIniDesc;
    public $FechaFinDesc;

    //Constructor
    function __construc($adapter){
        $table="producto";
        parent::__construct($table,$adapter);
    }

    public function getId() {
        return $this->id;
    }
 
    public function setId($id) {
        $this->id = $id;
    }
     
    public function getTitulo() {
        return $this->titulo;
    }
 
    public function setNombre($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
 
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
 
    public function getPrecio() {
        return $this->precio;
    }
 
    public function setPrecio($precio) {
        $this->precio = $precio;
    }
 
    public function getDescuento() {
        return $this->descuento;
    }
 
    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }

    public function getFechaIniDesc() {
        return $this->marca;
    }
 
    public function setFechaIniDesc($FechaIniDesc) {
        $this->FechaIniDesc = $FechaIniDesc;
    }

    public function getFechaFinDesc() {
        return $this->FechaFinDesc;
    }
 
    public function setFechaFinDesc($FechaFinDesc) {
        $this->FechaFinDesc = $FechaFinDesc;
    }

    public function save(){
        $query="INSERT INTO producto (id,titulo,descripcion,precio,descuento,fechainidesc,fechafindesc)
                VALUES(NULL,
                       '".$this->titulo."',
                       '".$this->descripcion."',
                       '".$this->precio."'
                       '".$this->descuento."'
                       '".$this->fechainidesc."'
                       '".$this->fechafindesc."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }


     //Funcion para obtener todos los productos
     public static function all()
     {
        $listaProductos=[];
         $DB=Db::getConnect();
         $sql=$DB->query('SELECT * FROM producto');
 
         //carga en la lista de productos cada registro de la db
         foreach ($sql->fetchAll() as $producto) {
             $listaProductos[]= new Usuario($producto['Id_Pdto'], $producto['Titulo'],
             $producto['Descripcion'],$producto['Precio'],$producto['Descuento'],
             $producto['FecjaIniDesc'],$producto['FechaFinDesc']);
         }
         return $listaProductos;
     }
 
     //la función para obtener un usuario por el id
     public static function getById($id){
         //buscar
         $db=Db::getConnect();
         $select=$db->prepare('SELECT * FROM producto WHERE Id_Pdto=:id');
         $select->bindValue('Id_Pdto',$id);
         $select->execute();
         //asignarlo al objeto producto
         $productoDb=$select->fetch();
         $producto= new Usuario($productoDb['Id_Pdto'],$productoDb['Titulo'],
         $productoDb['Descripcion'],$productoDb['Precio'],$productoDb['Descuento'],
         $productoDb['FecjaIniDesc'],$productoDb['FechaFinDesc']);
         return $producto;
     }
}
