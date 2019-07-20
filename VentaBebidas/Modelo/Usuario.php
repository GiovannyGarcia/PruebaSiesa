<?php
require './EntidadBase.php';
class Usuario extends EntidadBase
{
    //Atributos
    public $Cod_Usuario;
    public $Nombre;

    //Constructor de la clase
    function __construc($adapter)
    {
        $table = "usuario";
        parent::__construct($table, $adapter);
    }

    public function getCod_Usuario()
    {
        return $this->Cod_Usuario;
    }

    public function setCod_Usuario($Cod_Usuario)
    {
        $this->Cod_Usuario = $Cod_Usuario;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    //Funcion para obtener todos los usuarios
    public static function all()
    {
        $listaUsuarios = [];
        $DB = Db::getConnect();
        $sql = $DB->query('SELECT * FROM usuario');

        //carga en la lista de usuarios cada registro de la db
        foreach ($sql->fetchAll() as $usuario) {
            $listaUsuarios[] = new Usuario($usuario['Cod_Usuario'], $usuario['Nombre']);
        }
        return $listaUsuarios;
    }

    //la función para obtener un usuario por el id
    public static function getById($Cod_Usuario)
    {
        //buscar
        $db = Db::getConnect();
        $select = $db->prepare('SELECT * FROM usuario WHERE Cod_Usuario=:Cod_Usuario');
        $select->bindValue('Cod_Usuario', $Cod_Usuario);
        $select->execute();
        //asignarlo al objeto usuario
        $usuarioDb = $select->fetch();
        $usuario = new Usuario($usuarioDb['Cod_Usuario'], $usuarioDb['Nombre']);
        return $usuario;
    }

    public function save()
    {
        $query = "INSERT INTO usuario (cod_usuario,nombre)
                VALUES(NULL,
                       '" . $this->nombre . "',);";
        $save = $this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

    
}
