<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	
	//CONSULTA COMPAÑIAS PARA ARMAR PARA SELECT HTML
	$menu = "SELECT `Id`, `Nombre` FROM `companias` WHERE `Estado` = 'A' ORDER BY `companias`.`Nombre` ASC";
	$valor = "Id";
	$nombre = "Nombre";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);


