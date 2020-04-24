<?php
	session_start();
	$usuario = $_SESSION['Id'];
	$criterio = strtolower($_GET["term"]);
	if (!$criterio) return;
	echo "[";
	
	//=============================================================================
		//=====================================
			require '../../Clases/Db.class.php';
			require '../../Clases/Conf.class.php';
			$bd=Db::getInstance();
		//=====================================
	//=============================================================================	
	

	$sql = "SELECT CONCAT(`Nombre`,' ',`Apellido`)AS nombreAsegurado, CONCAT(`NitSolicitante`)AS nitAsegurado  FROM `solicitantes` WHERE CONCAT(NitSolicitante,' ',Nombre,' ',Apellido) like '%".$criterio."%' and Estado = 'A' Order By Nombre ASC LIMIT 0 , 30";
	$stmt=$bd->ejecutar($sql);
	$contador = 0;
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$valor = $rowcc['nitAsegurado'];
		$nom = $rowcc['nombreAsegurado'];
		$descripcion = $rowcc['nitAsegurado'].': '.$nom ;
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"nom\" : \"$nom\" } }";
		
	} 
?>]

