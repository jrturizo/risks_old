<?php

$criterio = strtolower($_GET["term"]);
if (!$criterio) return;
echo "[";
include("../../../SQL/conexion.php.inc");
$sqlplaca = "SELECT distinct Id,consecutivo,PLACA,ACTIVOAFECTADO, RAMO FROM `cuadrosiniestros` WHERE CONCAT(PLACA,' ',consecutivo,' ',ACTIVOAFECTADO,' ',Id) like '%".$criterio."%' ORDER BY `cuadrosiniestros`.`Id` DESC"; 
$resultplaca = mysql_query($sqlplaca, $id);
    
$contador = 0;
while($row = mysql_fetch_array($resultplaca)) 
{
    
	$valor = 0;
	$descripcion =  $row['Id'].': '.$row['consecutivo'].' '.$row['PLACA'];
	$consecutivo = $row['consecutivo'];
	$ACTIVOAFECTADO = $row['ACTIVOAFECTADO'];
	$PLACA = $row['PLACA'];
	$RAMO = $row['RAMO'];
	$Id = $row['Id'];
	
	
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"consecutivo\" : \"$consecutivo\", \"ACTIVOAFECTADO\" : \"$ACTIVOAFECTADO\", \"PLACA\" : \"$PLACA\", \"Id\" : \"$Id\", \"RAMO\" : \"$RAMO\" } }";
	
} 
?>]