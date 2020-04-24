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
	$sql = "SELECT `idTaller`, `idResponsable`, `id`, `nombreResponsable`, `estado`, `update` FROM `responsableTaller` WHERE  nombreResponsable like '%".$criterio."%' ORDER BY `nombreResponsable` ASC ";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$value = $rowcc["id"];
		$descripcion = $rowcc["nombreResponsable"];

		$response[] = array("value"=>$value,"label"=>$descripcion);
	} 
	echo json_encode($response);
?>
