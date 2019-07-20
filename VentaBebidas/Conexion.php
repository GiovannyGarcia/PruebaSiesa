<?php
	/**
	* Conexión a la base de datos
	* Autor: Giovanny Garcia
	*/
class Conexion
{
	 public function Conectar(){
		$server="localhost";
		$username="root";
		$password="";
		$db='aguacoco';
	
		try {
			$conexion= new mysqli($server,$username,$password,$db) or die ("no se ha  podido realizar la conexion");
		}
		 
		//to handle connection error
		catch(PDOException $exception){
			echo "Connection error: " . $exception->getMessage();
		}
	}
	
}	
?>