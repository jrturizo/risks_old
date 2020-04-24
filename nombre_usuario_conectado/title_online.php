<?php
	// put your code here
    /*Incluimos el fichero de la clase Db*/
    require '../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
	
	
	session_start();
	$usuario = $_SESSION['Id'];
	
	
	$sql = "SELECT * FROM `usuarios` WHERE Id = '".$usuario."'";
	$stmt=$bd->ejecutar($sql);
	$rowcc=$bd->obtener_fila($stmt,0);
	echo  $nombre = $rowcc['NombreEmpres'];
	
