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
	$sql = "SELECT `IdConductor`, `Conductor`, `telConductor` FROM `conductores` WHERE `Conductor` like  '%".$criterio."%' UNION DISTINCT 	SELECT `Identificacion`, `Nombre`,`Tel_Movil` FROM `conductor_clientes` WHERE `Identificacion` like '%".$criterio."%' ORDER BY `Conductor` ASC";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$descripcion = $rowcc["Conductor"];
		$value = $rowcc["IdConductor"];
		$Telefono = $rowcc["telConductor"];

		$response[] = array("value"=>$value,"label"=>$descripcion,"Telefono"=>$Telefono);
		
	} 
	echo json_encode($response);
?>
