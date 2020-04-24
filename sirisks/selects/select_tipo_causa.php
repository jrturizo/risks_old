<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `id`, `name`, `tipo`, `estado`, `cambio` FROM `tipo_causa_siniestro_risks` WHERE `estado` = 'A' ORDER BY `tipo_causa_siniestro_risks`.`id` ASC ";
	$valor = "id";
	$nombre = "name";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);
