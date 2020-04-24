<?php
	/*
		Se realiza el ingreso de los archivos a las respectivas carpetas, validando los Doc 1-4-23 para ser guardados en 
		el archivo de Risks que se comporta con diferentes jerarquia de carpetas a las de IEB
	*/



	
		//====================================================================================================================
			//====================================================================================================================
			  	$nombre_carpeta = "../../../documentos_propietario"; 
				if(!is_dir($nombre_carpeta))
				{ 
					@mkdir($nombre_carpeta, 0777); 
				}
				//$nombre_carpeta2=  strtoupper($_POST['placa']);
				$nombre_carpeta2= strtoupper($_POST['id']);
				$nombre_carpeta = $nombre_carpeta."/".$nombre_carpeta2; 
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
				move_uploaded_file($_FILES['image']['tmp_name'], $nombre_carpeta."/".$_FILES["image"]["name"]);
			//====================================================================================================================
		//====================================================================================================================
	
?>