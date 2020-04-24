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
	//---------Buscamos la el vehiculo si se encuentra ---------
	$sql = "SELECT `Poliza`, `Placas`, `NitAse`, `NitBen`, `CodFase`, `NumInterno`, `TipoVehicu`, `ClaseVehicu`, `MarcaVehicu`, `Color`, `Modelo`, `Chasis`, `Motor`, `cilindraje`, `Accesorios`, `VlrAccesor`, `VlrFasecolda`, `VlrAsegura`,`Estado`, `fectecmecanica`, `fecsoat`, `proyecto`, `servicio`, `Pasajero`, `circulacion`, `Notas` FROM `vehiculos` WHERE `Placas` like '%".$criterio."%' ORDER BY `Placas` ASC ";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		//-----Se asginan Variables--------------------------------------------------
			$value = $rowcc['Placas'];
			$NumInterno = $rowcc['NumInterno'];
			$TipoVehicu = $rowcc['TipoVehicu'];
			$ClaseVehicu = $rowcc['ClaseVehicu'];
			$MarcaVehicu = $rowcc['MarcaVehicu'];
			$Color = $rowcc['Color'];
			$Modelo = $rowcc['Modelo'];
			$Chasis = $rowcc['Chasis'];
			$Motor = $rowcc['Motor'];
			$cilindraje = $rowcc['cilindraje'];
		//------Se arma el Json----------------------------------------------------
		$response[] = array("value"=>$value,"NumInterno"=>$NumInterno,"TipoVehicu"=>$TipoVehicu,"ClaseVehicu"=>$ClaseVehicu,"MarcaVehicu"=>$MarcaVehicu,"Color"=>$Color,"Modelo"=>$Modelo,"Chasis"=>$Chasis,"cilindraje"=>$cilindraje,"Motor"=>$Motor);
	} 
	echo json_encode($response);
?>
