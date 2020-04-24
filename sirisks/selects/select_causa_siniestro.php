<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	$sql = "SELECT CONCAT(`tipo`)AS tipo_causa, CONCAT(s.`causa_siniestro`)AS `codigo_causa` 
	FROM `cuadrosiniestros` s LEFT JOIN `causas_siniestro` c on s.`causa_siniestro`=c.`cod` WHERE  s.Id = '".$_POST['causa_siniestro']."'";
	/*Ejecutamos la query*/
    $stmt=$bd->ejecutar($sql);
    $row=$bd->obtener_fila($stmt,0);
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `tipo`, `cod`, `hipotesis`, `estado`, `update` 
	FROM `causas_siniestro` WHERE `tipo` = '".$row['tipo_causa']."' and `estado` = 'A'  ORDER BY `causas_siniestro`.`hipotesis` ASC";
	$valor = "cod";
	$nombre = "hipotesis";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);


