<?php
	//==================================================================
		error_reporting(0);
		session_start();
		if ($_SESSION['sivig']!= 'si' )
		{
			header("Location: ../../../../");
		}
		$Id= $_SESSION['Id'];
	//===================================================================
		require '../../Clases/Db.class.php';
		require '../../Clases/Conf.class.php';
		$bd=Db::getInstance();
	//===================================================================
		require '../js/ManejoFechas/Fechas.class.php';
		$Fechasformat = new fechas();
		date_default_timezone_set("America/Bogota");

	//===================================================================
		$sql2 = "SELECT `IdUsuario`, `NitSolicitante`, `Nombre`, `Tipo`, `Nit_Cli`, `sql_cump`,`color_up`, `color_down`, `Estado` FROM `usuariosxcliente` WHERE `IdUsuario` ='".$Id."'";
		$stmt2=$bd->ejecutar($sql2);
		$rowcc2=$bd->obtener_fila($stmt2,0);
	/*
		Se realiza el ingreso de los archivos a las respectivas carpetas, validando los Doc 1-4-23 para ser guardados en
		el archivo de Risks que se comporta con diferentes jerarquia de carpetas a las del Cliente
	*/

		//====================================================================================================================
			//====================================================================================================================
			  $nombre_carpeta = "../../Autos";
				if(!is_dir($nombre_carpeta))
				{
					@mkdir($nombre_carpeta, 0777);
				}
				//$nombre_carpeta2=  strtoupper($_POST['placa']);
				$nombre_carpeta2= strtoupper($_POST['placa']);
				$nombre_carpeta = $nombre_carpeta."/".$nombre_carpeta2;
				if(!is_dir($nombre_carpeta))
				{
					@mkdir($nombre_carpeta, 0777);
				}
				$nombre_carpeta5 = date('Y');
				$nombre_carpeta = $nombre_carpeta."/".$nombre_carpeta5;
				if(!is_dir($nombre_carpeta))
				{
					@mkdir($nombre_carpeta, 0777);
				}
				$nombre_carpeta4 = $_POST['folder'];
				$nombre_carpeta = $nombre_carpeta."/".$nombre_carpeta4;
				if(!is_dir($nombre_carpeta))
				{
					@mkdir($nombre_carpeta, 0777);
				}

				if($_POST['typefolder'] == "N"){
					move_uploaded_file($_FILES['image']['tmp_name'], $nombre_carpeta."/".$_FILES["image"]["name"]);
				}
				else
				{
					$lista = $_FILES['image']['tmp_name'];
  					$lista1 = $_FILES['image']["name"];
 					for($i=0; $i<count($lista);$i++){							  
						if(move_uploaded_file($lista[$i], $nombre_carpeta."/".$lista1[$i])){
							$mensaje.= $nombre_carpeta3.'['.$lista1[$i].']; \n';
						}
						chmod($nombre_carpeta."/".$lista1[$i],0777);
					}
				}
					
						
					//=====================================================================================================================
				
			//====================================================================================================================
		//====================================================================================================================
?>
