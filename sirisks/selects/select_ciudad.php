<?php

	require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	//CONSULTA AREA PARA  ARMAR SELECT HTML
	$menu = "SELECT `Id_departamento`, `Id_Ciudad`, `Nombre`, `Estado` FROM `ciudad_colombia` WHERE `Id_departamento` = '".$_POST['idDepartamento']."' AND  Estado = 'A' ORDER BY `ciudad_colombia`.`Nombre` ASC ";
	$valor = "Id_Ciudad";
	$nombre = "Nombre";
	$stmt=$bd->menu($menu,$valor,$nombre);
	//echo json_encode($stmt);
	echo strtoupper($stmt);


