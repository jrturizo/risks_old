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
	

	//$sql = "SELECT distinct `PLACA` FROM `cuadrosiniestros` WHERE PLACA like '%".$criterio."%' and Estado_AI <> 'E'AND ( `ESTADO` <> '10' AND `ESTADO` <> '12' AND `ESTADO` <> '21' AND `ESTADO` <> '1' AND `ESTADO` <> '21') Order By PLACA ASC LIMIT 0 , 30";
	$sql = "SELECT distinct `PLACA` FROM `cuadrosiniestros` WHERE PLACA like '%".$criterio."%' and Estado_AI <> 'E' Order By PLACA ASC LIMIT 0 , 30";
	$stmt=$bd->ejecutar($sql);
	$contador = 0;
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$valor = $rowcc['PLACA'];
		$nom = $rowcc['PLACA'];
		$descripcion = $rowcc['PLACA'];
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"nom\" : \"$nom\" } }";
	} 
?>]

