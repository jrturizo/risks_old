<?php
	error_reporting(0);
	// put your code here
    /*Incluimos el fichero de la clase Db*/
    require '../../clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();

     echo $sql = "SELECT s.Id,
        CONCAT(s.p_ciudad_siniestro)AS idCiudad
        FROM cuadrosiniestros s
        WHERE s.Id='".$_POST['Id']."'";
	
	/*Ejecutamos la query*/
    $stmt=$bd->ejecutar($sql);
    $row=$bd->obtener_fila($stmt,0);
 
	echo json_encode($row);
?>
