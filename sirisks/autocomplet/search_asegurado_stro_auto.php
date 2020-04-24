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
	

	$sql = "SELECT distinct CONCAT(s.`Nombre`,' ',s.`Apellido`)AS Nombre, c.`nitsol` 
	FROM `solicitantes` s 
	LEFT JOIN `cuadrosiniestros` c on s.`NitSolicitante`=c.`nitsol`	 
	WHERE CONCAT(c.nitsol,' ',s.Nombre,' ',s.Apellido) like '%".$criterio."%' and c.`Estado_AI` <> 'E'AND ( c.`ESTADO` <> '10' AND c.`ESTADO` <> '12' AND c.`ESTADO` <> '21' AND c.`ESTADO` <> '1'AND c.`ESTADO` <> '21') Order By s.Nombre ASC LIMIT 0 , 30";
	$stmt=$bd->ejecutar($sql);
	$contador = 0;
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$valor = $rowcc['nitsol'];
		$nom = $rowcc['Nombre'];
		$descripcion = $rowcc['nitsol'].': '.$nom ;
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"nom\" : \"$nom\" } }";
		
	} 
?>]

