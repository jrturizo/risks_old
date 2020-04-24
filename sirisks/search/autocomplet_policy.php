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
	$sql = "SELECT `Poliza`, `NitTom`, `CodCia`, `Tipo`, `Ramo` FROM `polizas` WHERE  Estado = 'A' and Poliza like '%".$criterio."%' UNION DISTINCT	SELECT `Poliza`, `NitTom`, `CodCia`, `Tipo`, `Ramo` FROM `polizascancer` WHERE Estado = 'A' and Poliza like '%".$criterio."%' UNION DISTINCT SELECT `Poliza`,CONCAT(`nitReferente`) as NitTom, CONCAT(`IdCia`) as CodCia, `Tipo`, `Ramo` FROM `polizascumpli` WHERE `anulada` <> 'Y' AND `Estado` = 'A' and Poliza like '%".$criterio."%' UNION DISTINCT	SELECT `Poliza`, `NitTom`, `CodCia`, `Tipo`, `Ramo` FROM `polizasexequias`  WHERE `Estado` = 'A' and Poliza like '%".$criterio."%'	UNION DISTINCT	SELECT `Poliza`, `NitTom`, `CodCia`, `Tipo`, `Ramo` FROM `polizashogar` WHERE `Estado` = 'A' and Poliza like '%".$criterio."%' UNION DISTINCT SELECT `Poliza`, `NitTom`, `CodCia`, `Tipo`, `Ramo` FROM `polizasmedicinapre`WHERE `Estado` = 'A' and Poliza like '%".$criterio."%'	UNION DISTINCT	SELECT `Poliza`, CONCAT(`nitTom`) as NitTom, CONCAT(`idCia`) as CodCia, `Tipo`, `Ramo` FROM `polizasrc` WHERE `Estado` = 'A' and Poliza like '%".$criterio."%' UNION DISTINCT SELECT `Poliza`, `NitTom`, `CodCia`, `Tipo`, `Ramo` FROM `polizassalud` WHERE `Estado` = 'A' and Poliza like '%".$criterio."%' ORDER BY `Poliza` ASC ";
	$stmt=$bd->ejecutar($sql);
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		//---------Buscamos la compañía ---------------------------
			$sql1 = "SELECT `Id`, `Nombre` FROM `companias` WHERE `Id` = '".$rowcc['CodCia']."'";
			$stmt1=$bd->ejecutar($sql1);
			$rowcc1=$bd->obtener_fila($stmt1,0);
		//---------Buscamos el Cleinte de en Risks------------------
			$sql2 = "SELECT `Nit`, CONCAT(`Nombres`, `Apellidos`) as Nombre FROM `clientes` WHERE `Nit` =  '".$rowcc['NitTom']."' UNION DISTINCT	SELECT `NitSolicitante`, CONCAT(`Nombre`, `Apellido`) as Nombre FROM `solicitantes` WHERE `NitSolicitante` =  '".$rowcc['NitTom']."'";
			$stmt2=$bd->ejecutar($sql2);
			$rowcc2=$bd->obtener_fila($stmt2,0);
			//echo  $rowcc['Tipo'];
			//echo $rowcc['Ramo'];

		//---------Buscamos la el vehiculo si se encuentra ---------
			if( $rowcc['Tipo'] == 'I' && ($rowcc['Ramo'] == 'Autos' || $rowcc['Ramo'] == 'AUTOS')){
				$sql3 = "SELECT `Placas`, `NitAse`, `NitBen`, `CodFase`, `NumInterno`, `TipoVehicu`, `ClaseVehicu`, `MarcaVehicu`, `Color`, `Modelo`, `Chasis`, `Motor`, `cilindraje`, `Accesorios`, `VlrAccesor`, `VlrFasecolda`, `VlrAsegura`,`Estado`, `fectecmecanica`, `fecsoat`, `proyecto`, `servicio`, `Pasajero`, `circulacion`, `Notas` FROM `vehiculos` WHERE `Poliza` = '".$rowcc["Poliza"]."'";
				$stmt3=$bd->ejecutar($sql3);
				$rowcc3=$bd->obtener_fila($stmt3,0);
				//--------------------------------------
					$sql4 = "SELECT `Nit`, CONCAT(`Nombres`, `Apellidos`) as Nombre, `TelMovil` FROM `clientes` WHERE `Nit` =  '".$rowcc3['NitAse']."'";
					$stmt4=$bd->ejecutar($sql4);
					$rowcc4=$bd->obtener_fila($stmt4,0);
				//--------------------------------------
					$Placas = $rowcc3['Placas'];
					$Asegurado = $rowcc3['NitAse'];
					$nameAsegurado = $rowcc4['Nombre'];
					$teleAsegurado = $rowcc4['TelMovil'];
					$NumInterno = $rowcc3['NumInterno'];
					$TipoVehicu = $rowcc3['TipoVehicu'];
					$ClaseVehicu = $rowcc3['ClaseVehicu'];
					$MarcaVehicu = $rowcc3['MarcaVehicu'];
					$Color = $rowcc3['Color'];
					$Modelo = $rowcc3['Modelo'];
					$Chasis = $rowcc3['Chasis'];
					$Motor = $rowcc3['Motor'];
					$cilindraje = $rowcc3['cilindraje'];
				//--------------------------------------
			}else{
				//--------------------------------------
					$Placas = "";
					$Asegurado = "";
					$nameAsegurado = "";
					$teleAsegurado = "";
					$NumInterno = "";
					$TipoVehicu = "";
					$ClaseVehicu = "";
					$MarcaVehicu = "";
					$Color = "";
					$Modelo = "";
					$Chasis = "";
					$Motor = "";
					$cilindraje = "";
				//--------------------------------------
			}
		
	
		$descripcion = $rowcc["Poliza"];
		$value = $rowcc["NitTom"];
		$title = $rowcc["CodCia"];
		$nametitle = $rowcc1["Nombre"];
		$nameValue = $rowcc2["Nombre"];
		$nameRamo = $rowcc["Ramo"];

		$response[] = array("value"=>$value,"label"=>$descripcion,"title"=>$title,"nametitle"=>$nametitle,"nameValue"=>$nameValue,"Placas"=>$Placas,"Asegurado"=>$Asegurado,"nameAsegurado"=>$nameAsegurado,"NumInterno"=>$NumInterno,"TipoVehicu"=>$TipoVehicu,"ClaseVehicu"=>$ClaseVehicu,"MarcaVehicu"=>$MarcaVehicu,"Color"=>$Color,"Modelo"=>$Modelo,"Chasis"=>$Chasis,"cilindraje"=>$cilindraje,"Motor"=>$Motor,"teleAsegurado"=>$teleAsegurado);
	} 
	echo json_encode($response);
?>
