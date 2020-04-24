<?php

	// put your code here
    /*Incluimos el fichero de la clase Db*/
    require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();

    $sql = "SELECT `Placas`, `Nitsol`,`NitAse`, `NitBen`,CONCAT(`NumInterno`)AS codInterno, `CodFase`, `TipoVehicu`, CONCAT(`ClaseVehicu`)AS class, CONCAT(`MarcaVehicu`)AS brand, CONCAT(`Color`)AS color,
     CONCAT(`Modelo`)AS model, CONCAT(`Chasis`)AS chassis, CONCAT(`Motor`)AS engine, `cilindraje`, `carroceria`, `servicio`, `Pasajero`, `circulacion` FROM `vehiculos` WHERE  `Placas` = '".$_POST['placa']."'";

	   /*Ejecutamos la query*/
     $stmt=$bd->ejecutar($sql);
     $row=$bd->obtener_fila($stmt,0);

	echo json_encode($row);
?>
 