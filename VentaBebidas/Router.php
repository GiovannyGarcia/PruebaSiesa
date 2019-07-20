<?php

	//función que llama al controlador y su respectiva acción, que son pasados como parámetros
	function call($controller, $action){
		//importa el controlador desde la carpeta Controllers
		require_once('Controlador/' . $controller . 'controller.php');
		//crea el controlador
		switch($controller){
			case 'usuario':
				$controller= new UsuarioController();
				break; 
			case 'producto':
			$controller= new ProductoController();
			break;
			case 'carrito':
			$controller= new CarritoController();
			break;

		}
		//llama a la acción del controlador
		$controller->{$action }();
	}

	//array con los controladores y sus respectivas acciones
	$controllers= array(
						'usuario'=>['index','register','update', 'delete'],
						'producto'=>['index','register'],
						'carrito'=>['index']
						);
	
?>