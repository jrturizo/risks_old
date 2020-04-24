<?php

	// put your code here
    /*Incluimos el fichero de la clase Db*/
    require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();

    $sql = "SELECT `IdConductor`, `Conductor`, `telConductor` FROM `conductores` WHERE `Conductor` = '".$_POST['driver']."'";


     /*Ejecutamos la query*/
     $stmt=$bd->ejecutar($sql);
     $row=$bd->obtener_fila($stmt,0);

	echo json_encode($row);