<?php
	session_start();
	$usuario = $_SESSION['Id'];
	$criterio = strtolower($_GET["term"]);
	if (!$criterio) return;
	echo "[";
	
	//=============================================================================
		//=====================================
			require '../../clases/Db.class.php';
			require '../../clases/Conf.class.php';
			$bd=Db::getInstance();
		//=====================================
	//=============================================================================	
	

	$sql = "SELECT `Poliza` FROM `polizas` WHERE Poliza like '%".$criterio."%'  and   Estado = 'A' UNION DISTINCT  SELECT `Poliza` FROM `polizascancer` WHERE Poliza like '%".$criterio."%'  and   Estado = 'A' UNION DISTINCT  SELECT `Poliza` FROM `polizascumpli` WHERE Poliza like '%".$criterio."%'  and   Estado = 'A' UNION DISTINCT	SELECT `Poliza` FROM `polizasexequias` WHERE Poliza like '%".$criterio."%'  and   Estado = 'A' UNION DISTINCT SELECT `Poliza` FROM `polizashogar` WHERE Poliza like '%".$criterio."%'  and   Estado = 'A' UNION DISTINCT SELECT `Poliza` FROM `polizasmedicinapre` WHERE Poliza like '%".$criterio."%'  and   Estado = 'A' UNION DISTINCT	SELECT `Poliza` FROM `polizasrc` WHERE Poliza like '%".$criterio."%'  and   Estado = 'A' UNION DISTINCT	SELECT `Poliza` FROM `polizassalud` WHERE Poliza like '%".$criterio."%'  and   Estado = 'A' ORDER BY `Poliza` ASC LIMIT 50";
	$stmt=$bd->ejecutar($sql);
	$contador = 0;
	while($rowcc=$bd->obtener_fila($stmt,0))
	{
		$valor = $rowcc['Poliza'];
		$nom = $rowcc['Poliza'];
		$descripcion = $rowcc['Poliza'] ;
		if ($contador++ > 0) print ", "; // agregamos esta linea porque cada elemento debe estar separado por una coma
		print "{ \"label\" : \"$descripcion\", \"value\" : { \"descripcion\" : \"$descripcion\", \"valor\" : \"$valor\", \"nom\" : \"$nom\" } }";
		
	} 
?>]

