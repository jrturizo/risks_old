<?php
	//===========================================================	
		error_reporting(0);
		session_start();
		if ($_SESSION['sivig']!= 'si' )
		{
			header("Location: ../../login.php");
		}
	//===========================================================
	$criterio = strtolower($_POST['search']);
	
	
	//==================================_POST===========================================
		//=====================================
			require '../../Clases/Db.class.php';
			require '../../Clases/Conf.class.php';
			$bd=Db::getInstance();
		//=====================================
	//=============================================================================	
	$html = '';
	$sql = "SELECT CONCAT(`Nombre`,' ',`Apellido`)AS Nombres, CONCAT(`NitSolicitante`) AS nit FROM `solicitantes` WHERE CONCAT(NitSolicitante,' ',Nombre,' ',Apellido) like '$criterio' UNION DISTINCT 	SELECT `Nombres`,  CONCAT(`IdBeneficiario`) as nit FROM `beneficiarios_siniestro` WHERE CONCAT(IdBeneficiario,' ',Nombres) like	'%".$criterio."%' ORDER BY `Nombres` ASC LIMIT 0 , 50";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$descripcion = $rowcc["Nombres"];
		$value = $rowcc["nit"];
		$response[] = array("value"=>$value,"label"=>$descripcion);
	} 
	echo json_encode($response);





?>
