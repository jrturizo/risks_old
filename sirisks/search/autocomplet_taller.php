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
			require '../../Clases/Db.class.php';
			require '../../Clases/Conf.class.php';
			$bd=Db::getInstance();
	//=============================================================================	
	$sql = "SELECT `idTaller`, `nombreTaller`, `telefTaller`, `Estado`, `Update` FROM `taller`  WHERE  nombreTaller like '%".$criterio."%' and Estado = 'A' ORDER BY `nombreTaller` ASC ";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$value = $rowcc["idTaller"];
		$descripcion = $rowcc["nombreTaller"];
		$title = $rowcc["telefTaller"];

		$response[] = array("label"=>$descripcion,"value"=>$value,"title"=>$title);
	} 
	echo json_encode($response);
?>
