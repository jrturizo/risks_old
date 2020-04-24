<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `tipo`, `cod`, `name`, `estado`, `cambio` FROM `soluciones_causas_siniestros` WHERE `tipo` = '".$_POST['tipo_causa']."' ORDER BY `soluciones_causas_siniestros`.`name` ASC";
	$valor = "cod";
	$nombre = "name";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);
