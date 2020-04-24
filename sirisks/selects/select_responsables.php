<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `id`, `name`, `state` FROM `responsableStro` WHERE `state` = 'A' ORDER BY `responsableStro`.`id` ASC";
	$valor = "id";
	$nombre = "name";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);
