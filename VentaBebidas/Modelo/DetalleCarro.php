<?php
class detalleCarro
{
    public $Id_Carrito;
    public $Id_Pdto;
    public $Cantidad;

    function __construc($Id_Carrito,$Id_Pdto,$Cantidad){
         $this->$Id_Carrito=$Id_Carrito;
         $this->$Id_Pdto=$Id_Pdto;
         $this->$Cantidad=$Cantidad;
    }
}
?>