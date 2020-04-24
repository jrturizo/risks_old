<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `Id`, `Nombre`, `Estado` FROM `asumidores` WHERE `Estado` = 'A' ORDER BY `asumidores`.`Nombre` ASC ";
	$valor = "Id";
	$nombre = "Nombre";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);
