<?php
	//===========================================================	
		error_reporting(0);
		session_start();
		if ($_SESSION['sivig']!= 'si' )
		{
			header("Location: ../../login.php");
		}
	//===========================================================
	$criterio = '%'.strtolower($_POST['search']).'%';
	
	
	//==================================_POST===========================================
		//=====================================
			require '../../Clases/Db.class.php';
			require '../../Clases/Conf.class.php';
			$bd=Db::getInstance();
		//=====================================
	//=============================================================================	
	$html = '';

	$sql = "SELECT CONCAT(`Nombre`,' ',`Apellido`)AS nombreAsegurado, CONCAT(`NitSolicitante`)AS nitAsegurado  FROM `solicitantes` WHERE CONCAT(NitSolicitante,' ',Nombre,' ',Apellido) like '$criterio' and Estado = 'A' Order By Nombre ASC LIMIT 0 , 50";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$descripcion = $rowcc["nombreAsegurado"];
		$value = $rowcc["nitAsegurado"];

		$response[] = array("value"=>$value,"label"=>$descripcion);
		
	} 
	echo json_encode($response);





?>
