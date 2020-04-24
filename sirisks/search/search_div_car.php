<?php

	// put your code here
    /*Incluimos el fichero de la clase Db*/
    require '../../Clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../../Clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();

     $sql = "SELECT v.`Placas`, v.`Nitsol`,v.`NitAse`, v.`NitBen`,
    CONCAT(v.`NumInterno`)AS codInterno, v.`CodFase`, v.`TipoVehicu`, CONCAT(v.`ClaseVehicu`)AS class, CONCAT(v.`MarcaVehicu`)AS brand, CONCAT(v.`Color`)AS color,
     CONCAT(v.`Modelo`)AS model, CONCAT(v.`Chasis`)AS chassis, CONCAT(v.`Motor`)AS engine, v.`cilindraje`, v.`carroceria`, v.`servicio`, v.`Pasajero`, v.`circulacion`,
     CONCAT(s.`CEDULA_CONDUCTOR`)AS idDriver,
     CONCAT(c.`Conductor`)AS nameDriver,
     CONCAT(c.`telConductor`)AS telDriver,
     CONCAT(s.`Presencia_transito`)AS transitPoliceHidden,
     CONCAT(s.`inmovilizacion_vehi`)AS immobilizationHidden,
     CONCAT(s.TALLER)AS idworkRepair,
     CONCAT(t.nombreTaller)AS workRepair,
    DATE_FORMAT(s.FECHA_INGRESO_TALLER,'%d/%m/%Y') as dateEntry,
    CONCAT(t.telefTaller)AS telWorkshop,
    CONCAT(a.`name`)AS causa, 
    CONCAT(e.`name`)AS control_causa,
    CONCAT(i.`name`)AS tipo_causa    
     FROM `vehiculos`  v
     left join cuadrosiniestros s on s.PLACA = v.`Placas`
     left join conductores c on c.IdConductor = s.CEDULA_CONDUCTOR 
     left join taller t on s.TALLER= t.idTaller 
     left join tipo_causa_siniestro_risks i on i.id = s.tipo_causa
     left join causas_siniestros_sura a on a.cod = s.causa_siniestro
     left join soluciones_causas_siniestros e on e.cod = s.control_causa
     WHERE  v.`Placas` = '".$_POST['placa']."' and s.Id='".$_POST['Id']."'";

	   /*Ejecutamos la query*/
     $stmt=$bd->ejecutar($sql);
     $row=$bd->obtener_fila($stmt,0);

	echo json_encode($row);
?>
 