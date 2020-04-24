<?php

	require '../../clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `tipo`, `cod`, `hipotesis`, `estado`, `update` FROM `causas_siniestro` WHERE `tipo` = '".$_POST['tipo_causa']."' and `estado` = 'A'  ORDER BY `causas_siniestro`.`hipotesis` ASC";
	$valor = "cod";
	$nombre = "hipotesis";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);


