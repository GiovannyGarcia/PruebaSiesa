<?php
class carrito 
{
    public $Id_Carrito;
    public $Cod_User;
    public $Total;  

    function __construc($Id_Carrito,$Cod_User,$Total){
        $this->$Id_Carrito=$Id_Carrito;
        $this->$Cod_User=$Cod_User;
        $this->$Total=$Total;
    }
   
}
?>