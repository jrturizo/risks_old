<?php 
	
	$placa = $_POST['placa'];
	$name = $_POST['name'];
	$nombre_documento = $_POST['url'];
    $eliminados = "../../../Autos/".$placa."/VEHICULO/OLD/";
	@mkdir($eliminados.$nombre_eliminado, 0777);
 
	
	if(copy($nombre_documento, $eliminados."/".$name))
	{
		unlink($nombre_documento); 	

		echo '<script language="javascript">
		alert("Archivo Eliminado");
	   window.location = "./car_view.php?data='.$_POST['placa'].'";
		
		  </script>';		
	}
	else
	{
	echo '<script language="javascript">
			alert("Se presento un Eror al Eliminar el Archivo!");
		window.location = "./car_view.php?data='.$_POST['placa'].'";
			
			</script>';	

	}
?>