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
	//NOMBRE DE USUARIO PARA LAS OBSERVAICONES
		$sql2 = "SELECT * FROM `usuariosxcliente` WHERE `IdUsuario` ='".$usuario."'";
		$stmt2=$bd->ejecutar($sql2);
		$rowcc2=$bd->obtener_fila($stmt2,0);

	$sql = "SELECT distinct  c.Conductor, c.IdConductor 
	FROM `conductores` c
	LEFT JOIN `cuadrosiniestros` s on c.IdConductor=s.CEDULA_CONDUCTOR	 
	WHERE CONCAT(c.IdConductor,' ',c.Conductor) like '%".$criterio."%' and  s.`nitsol` = '".$rowcc2['NitSolicitante']."' and s.`Estado_AI` <> 'E' AND ( s.`ESTADO` <> '10' AND s.`ESTADO` <> '12' AND s.`ESTADO` <> '21' AND s.`ESTADO` <> '1'AND s.`ESTADO` <> '21')	Order By c.Conductor ASC LIMIT 0 , 30";
	$stmt=$bd->ejecutar($sql);
	$contador = 0;
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$valor = $rowcc['IdConductor'];
		$nom = $rowcc['Conductor'];
		$descripcion = $rowcc['IdConductor'].': '.$nom ;
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"nom\" : \"$nom\" } }";
		
	} 
?>]

