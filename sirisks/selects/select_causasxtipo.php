<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `tipo`, `cod`, `name`, `estado`, `cambio` FROM `causas_siniestros_sura` WHERE `tipo`= '".$_POST['tipo_causa']."' and `estado` = 'A' ORDER BY `causas_siniestros_sura`.`name` ASC";
	$valor = "cod";
	$nombre = "name";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);

