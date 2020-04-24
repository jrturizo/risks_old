<?php
	session_start();
	$usuario = $_SESSION['Id'];
	$criterio = strtolower($_GET["term"]);
	if (!$criterio) return;
	echo "[";
	
	//=============================================================================
		//=====================================
			require '../../clases/Db.class.php';
			require '../../clases/Conf.class.php';
			$bd=Db::getInstance();
		//=====================================
	//=============================================================================	
	//=============================================================================
	//NOMBRE DE USUARIO PARA LAS OBSERVAICONES
		$sql2 = "SELECT * FROM `usuariosxcliente` WHERE `IdUsuario` ='".$usuario."'";
		$stmt2=$bd->ejecutar($sql2);
		$rowcc2=$bd->obtener_fila($stmt2,0);

	//$sql = "SELECT distinct `PLACA` FROM `cuadrosiniestros` WHERE PLACA like '%".$criterio."%' and Estado_AI <> 'E'AND ( `ESTADO` <> '10' AND `ESTADO` <> '12' AND `ESTADO` <> '21' AND `ESTADO` <> '1' AND `ESTADO` <> '21') Order By PLACA ASC LIMIT 0 , 30";
	$sql = "SELECT distinct `ACTIVOAFECTADO` FROM `cuadrosiniestros` WHERE ACTIVOAFECTADO like '%".$criterio."%' and  nitsol = '".$rowcc2['NitSolicitante']."' and Estado_AI <> 'E' Order By PLACA ASC LIMIT 0 , 30";
	$stmt=$bd->ejecutar($sql);
	$contador = 0;
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$valor = $rowcc['ACTIVOAFECTADO'];
		$nom = $rowcc['ACTIVOAFECTADO'];
		$descripcion = $rowcc['ACTIVOAFECTADO'];
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"nom\" : \"$nom\" } }";
	} 
?>]

