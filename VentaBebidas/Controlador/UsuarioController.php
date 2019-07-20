<?php
require '../Conexion.php';
require './ControladorBase.php';
class UsuarioController extends ControladorBase{
    public $conectar;
    public $adapter;
     
    public function __construct() {
        parent::__construct();
          
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
     
    public function index(){
         
        $usuario=Usuario::all();
		require_once('Views/Usuario/index.php');
    }  
}
//obtiene los datos del usuario desde la vista y redirecciona a UsuarioController.php
if (isset($_POST['action'])) {
    $usuarioController= new UsuarioController();
    //se añade el archivo usuario.php
    require_once('../Modelo/usuario.php');
    
    //se añade el archivo para la conexion
    require_once('../connection.php');

    if ($_POST['action']=='register') {
        $usuario= new Usuario(null,$_POST['nombre']);
        $usuarioController->save($usuario);
    }elseif ($_POST['action']=='update') {
        $usuario= new Usuario($_POST['id'],$_POST['nombre']);
        $usuarioController->update($usuario);
    }		
}

//se verifica que action esté definida
if (isset($_GET['action'])) {
    if ($_GET['action']!='register'&$_GET['action']!='index') {
        require_once('../connection.php');
        $usuarioController=new UsuarioController();
        //para eliminar
        if ($_GET['action']=='delete') {		
            $usuarioController->delete($_GET['id']);
        }elseif ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
            require_once('../Models/usuario.php');				
            $usuario=Usuario::getById($_GET['id']);		
            //var_dump($usuario);
            //$usuarioController->update();
            require_once('../Views/Usuario/update.php');
        }	
    }	
}
