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
	

	$sql = "SELECT CONCAT(`Nombres`)AS nombreBeneficiario, CONCAT(`IdBeneficiario`)AS nitBeneficiario  FROM `beneficiarios_siniestro` WHERE CONCAT(IdBeneficiario,' ',Nombres) like '%".$criterio."%' and Estado = 'A' Order By Nombres ASC LIMIT 0 , 30";
	$stmt=$bd->ejecutar($sql);
	$contador = 0;
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$valor = $rowcc['nitBeneficiario'];
		$nom = $rowcc['nombreBeneficiario'];
		$descripcion = $rowcc['nitBeneficiario'].': '.$nom ;
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"nom\" : \"$nom\" } }";
		
	} 
?>]

