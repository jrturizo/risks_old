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
	$sql = "SELECT `Id`, `Nombre`,`Estado` FROM `companias`  WHERE  Nombre like '%".$criterio."%' ORDER BY `Nombre` ASC ";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$value = $rowcc["Id"];
		$descripcion = $rowcc["Nombre"];

		$response[] = array("value"=>$value,"label"=>$descripcion);
	} 
	echo json_encode($response);
?>
