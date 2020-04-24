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

	$sql = "SELECT distinct `consecutivo` FROM `cuadrosiniestros` WHERE consecutivo like '%".$criterio."%'and  nitsol = '".$rowcc2['NitSolicitante']."' and Estado_AI <> 'E' Order By consecutivo ASC LIMIT 0 , 30";
	$stmt=$bd->ejecutar($sql);
	$contador = 0;
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$valor = $rowcc['consecutivo'];
		$nom = $rowcc['consecutivo'];
		$descripcion = $rowcc['consecutivo'];
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"nom\" : \"$nom\" } }";
	} 
?>]

