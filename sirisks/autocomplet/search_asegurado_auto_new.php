<?php
	
	error_reporting(E_ALL);
	//session_start();
	//$usuario = $_SESSION['Id'];
	$criterio = '%'.strtolower($_POST['search']).'%';
	
	
	//==================================_POST===========================================
		//=====================================
			require '../../Clases/Db.class.php';
			require '../../Clases/Conf.class.php';
			$bd=Db::getInstance();
		//=====================================
	//=============================================================================	
	$html = '';

	echo $sql = "SELECT CONCAT(`Nombre`,' ',`Apellido`)AS nombreAsegurado, CONCAT(`NitSolicitante`)AS nitAsegurado  FROM `solicitantes` WHERE CONCAT(NitSolicitante,' ',Nombre,' ',Apellido) like '$criterio' and Estado = 'A' Order By Nombre ASC LIMIT 0 , 50";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$descripcion = $rowcc["nombreAsegurado"];
		$value = $rowcc["nitAsegurado"];

		$response[] = array("value"=>$value,"label"=>$descripcion);
		
	} 
	echo json_encode($response);
?>
