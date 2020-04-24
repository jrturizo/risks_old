<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `id`, `nombre`, `Estado` FROM `estadodelsiniestro` WHERE `Estado` = 'A' ORDER BY `estadodelsiniestro`.`nombre` ASC ";
	$valor = "id";
	$nombre = "nombre";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);


