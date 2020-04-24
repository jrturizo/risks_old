 <?php
	session_start();
	$usuario = $_SESSION['Id'];
    require '../../Clases/Db.class.php';
    require '../../Clases/Conf.class.php';
    $bd=Db::getInstance();
	require '../js/ManejoFechas/Fechas.class.php';
	$Fechasformat = new fechas();
	date_default_timezone_set("America/Bogota");
	$a= date("Y"); 	
	//=============================================================
	$sqlus = "SELECT * FROM `usuarios` WHERE Id = '".$usuario."'";
	$stmtus=$bd->ejecutar($sqlus);
	$rowccus=$bd->obtener_fila($stmtus,0);
	$nombreus = $rowccus['Nombres'].' '.$rowccus['Apellidos'];
	 	
	//================Textos========================================================
		//Siniestro
			$Siniestro = '<hr /></br>'.$nombreus.' '.date('d/m/Y H:i:s').'</br><p>'.$_POST['htmlDescripcion'].'</p>';
 		//Seguimineto
			$Seguimineto = '<hr /></br>'.$nombreus.' '.date('d/m/Y H:i:s').'</br><p>'.$_POST['htmlSeguimiento'].'</p>';
	//================Sacar el valor Maximo de los Siniestros=======================
		$sql = "SELECT MAX(`Id`) AS max FROM  `cuadrosiniestros` WHERE  1";
		$stmt=$bd->ejecutar($sql);
		$rowcc=$bd->obtener_fila($stmt,0);
		$max = $rowcc['max']+1;
	//================Consulta Nombre Consecutivo Ramo =============================
		$sql1 = "SELECT `id`, `nombre`, `consecutivo` FROM `ramossiniestros` WHERE `id` = '".$_POST['idRamo']."'";
		$stmt1=$bd->ejecutar($sql1);
		$rowcc1=$bd->obtener_fila($stmt1,0);
	//================Determinar consecutivo para el Siniestro======================
		$sql2 = "SELECT count(*) AS consecutivo FROM `cuadrosiniestros` WHERE RAMO = '".$_POST['idRamo']."'";
		$stmt2=$bd->ejecutar($sql2);
		$rowcc2=$bd->obtener_fila($stmt2,0);
		$concatenar = $rowcc2['consecutivo']+1;
		$consecutivo = $rowcc1['consecutivo'].$concatenar;
	
		//============================Parsear las fecha para ser ingresadas al sistema=======================================
			//-----------------------------------------------------------------------------------
				if($_POST['dateClient'] == ''){	$fechaCliente = '0000-00-00';	}
				else{ $fechaCliente = $Fechasformat->cambiarfechas($_POST['dateClient']); }
			//-----------------------------------------------------------------------------------
				if($_POST['dateCompany'] == ''){$fechaAseguradora = '0000-00-00';	}
				else{ $fechaAseguradora = $Fechasformat->cambiarfechas($_POST['dateCompany']); }
			//-----------------------------------------------------------------------------------
				if($_POST['datePay'] == ''){ $fechaPago = '0000-00-00'; }
				else{ $fechaPago = $Fechasformat->cambiarfechas($_POST['datePay']);	}
			//-----------------------------------------------------------------------------------
				if($_POST['dateEntry'] == ''){	$fechaIngresoTaller = '0000-00-00'; }
				else{ $fechaIngresoTaller = $Fechasformat->cambiarfechas($_POST['dateEntry']); }
			//-----------------------------------------------------------------------------------
				if($_POST['dateDocumentation'] == ''){
						$fechDocum = '0000-00-00';
						$fechLimtPag = '0000-00-00';
				 }else{ 
						$fechDocum = $Fechasformat->cambiarfechas($_POST['dateDocumentation']); 
						$fechLimtPag = strtotime ( '+1 month' , strtotime ( $fechDocum ) ) ;
						$fechLimtPag = date ( 'Y-m-j' , $fechLimtPag );
					}
			//-----------------------------------------------------------------------------------
				$fechaSiniestro = $Fechasformat->cambiarfechas($_POST['dateStro']);
				$fechaPrescripcion = strtotime ('+2 year' , strtotime($fechaSiniestro));
				$fechaPrescripcion = date ('Y-m-d',$fechaPrescripcion);

			//-----------------------------------------------------------------------------------
				if($_POST['idResponsable'] == 'SI'){	$vlrecobros = '0'; }
				if($_POST['idResponsable'] == 'NO'){	$vlrecobros = $_POST['vlrecobros'];	}
				if($_POST['idResponsable'] == 'PENDIENTE'){	$vlrecobros = ''; }
			//-----------------------------------------------------------------------------------

		
		
			$idRamo =$_POST['idRamo'];
			if($idRamo == '1' || $idRamo == '2' || $idRamo == '25' || $idRamo == '46' || $idRamo == '44' || $idRamo == '43' || $idRamo == '5' || $idRamo == '48' || $idRamo == '4' || $idRamo == '47' || $idRamo == '6'){
				
				//============================Buscar Taller; si no está, se ingresa a la Base de Datos===============================
					$sql9 = "SELECT count(*) AS idTaller FROM `taller` WHERE idTaller = '".$_POST['idworkRepair']."'";
					$stmt9=$bd->ejecutar($sql9);
					$rowcc9=$bd->obtener_fila($stmt9,0);
					//-----------------------------------------------------------------------------------------

						if($rowcc9['idTaller'] == 0 )
						{
							$sql10 = "SELECT MAX(`idTaller`) as max_conter FROM `taller` WHERE 1 ";
							$stmt10=$bd->ejecutar($sql10);
							$rowcc10=$bd->obtener_fila($stmt10,0);
							$idMaxworkRepair = $rowcc10['max_conter'] + 1;
							//====================== Ingresar Taller=====================================
								$tabla3 = "`taller`";
								$campos3 = "`idTaller`,`nombreTaller`, `telefTaller`, `Estado`";
								$variable3 = "'".$idMaxworkRepair."','".strtoupper($_POST['workRepair'])."','".$_POST['telWorkshop']."','A'";
								//echo $sqlinsertar = "INSERT INTO ".$tabla3." (".$campos3.") VALUES (".$variable3.")";
								$bd->insertar($tabla3,$campos3,$variable3);
						}
						else
						{

							$idMaxworkRepair = $_POST['idworkRepair'];
						}
				//============================Buscar Conductor; si no está, se ingresa a la Base de Datos============================
					$sql3 = "SELECT count(*) AS conductor FROM `conductores` WHERE IdConductor = '".$_POST['idDriver']."'";
					$stmt3=$bd->ejecutar($sql3);
					$rowcc3=$bd->obtener_fila($stmt3,0);
					//-----------------------------------------------------------------------------------------
						if($rowcc3['conductor'] > 0 )
						{
							//===================Actualizar el Conductor====================================
								$tabla2 = "`conductores`";
								$campavariable2 = "`Conductor`='".strtoupper($_POST['nameDriver'])."',`telConductor`='".$_POST['telDriver']."', `Estado`='A'";
								$condicion2 = "`IdConductor`='".$_POST['idDriver']."'";
								$bd->actualizar($tabla2,$campavariable2,$condicion2);
						}
						else
						{
							//====================== Ingresar Conductores=====================================
								$tabla3 = "`conductores`";
								$campos3 = "`IdConductor`, `Conductor`,`telConductor`, `Estado`";
								$variable3 = "'".$_POST['idDriver']."','".strtoupper($_POST['nameDriver'])."','".$_POST['telDriver']."','A'";
								//echo $sqlinsertar = "INSERT INTO ".$tabla3." (".$campos3.") VALUES (".$variable3.")";
								$bd->insertar($tabla3,$campos3,$variable3);
						}

				//============================Insertar Causas o actualizarlas ==============================
					$tabla4 = "`info_causas_siniestros`";
					$campos4 = "`Id_Siniestro`, `id_tipo`, `id_causa`, `id_control`";
					$variable4 = "'".$max."','".$_POST['tipo_causa']."','".$_POST['causa']."','".$_POST['control']."'";
					//echo $sqlinsertar = "INSERT INTO ".$tabla3." (".$campos3.") VALUES (".$variable3.")";
					$bd->insertar($tabla4,$campos4,$variable4);
			}
		//============================Consultar Beneficiario si no está, se ingresa a la Base de Datos=======================
			$sql6 = "SELECT count(*) AS nitBeneficiario FROM `beneficiarios_siniestro` WHERE IdBeneficiario = '".$_POST['idAsegurado']."'";
			$stmt6=$bd->ejecutar($sql6);
			$rowcc6=$bd->obtener_fila($stmt6,0);
			//-----------------------------------------------------------------------------------------
			if($rowcc6['nitBeneficiario'] <= 0 )
			{
				//===================INGRESA  el BENEFICIARIO====================================
					$tabla8 = "`beneficiarios_siniestro`";
					$campos8 = "`IdBeneficiario`, `Nombres`, `Estado`";
					$variable8 = "'".$_POST['idAsegurado']."','".strtoupper($_POST['nameAsegurado'])."','A'";
					//echo $sqlinsertar = "INSERT INTO ".$tabla8." (".$campos8.") VALUES (".$variable8.")";
					$bd->insertar($tabla8,$campos8,$variable8);
			}
		
		//============================Ingresar los Amparos del Siniestro=====================================================			
			$listaamp = $_POST['amp'];
			$listavalAmp = $_POST['valAmp'];
			$listaVALOR_SINIESTRO_RESERVA = $_POST['VALOR_SINIESTRO_RESERVA'];
			$listaVALOR_INDEMNIZADO = $_POST['VALOR_INDEMNIZADO'];
			$listaDEDUCIBLE = $_POST['DEDUCIBLE'];
			for($i=0; $i<$_POST['maxAmp'];$i++)
			{
				$amp = $listaamp[$i];
				$valAmp = $listavalAmp[$i];
				$VALOR_SINIESTRO_RESERVA = ereg_replace("[,]", "",$listaVALOR_SINIESTRO_RESERVA[$i]);
				$VALOR_INDEMNIZADO = ereg_replace("[,]", "",$listaVALOR_INDEMNIZADO[$i]);
				$DEDUCIBLE = ereg_replace("[,]", "",$listaDEDUCIBLE[$i]);
				
				//---------------------------------------Ingresar El Amparo---------------------------------------------
				if($amp == 'Y')
				{
					//-----------Ingresar el Amparo------------------------------
						$tabla6 = "`amparosxramo`";
						$campos6 = "`idSiniestro`, `idAmparoxRamo`, `Estado`";
						$variable6 = "'".$max."','".$valAmp."','A'";
						//echo $sqlinsertar = "INSERT INTO ".$tabla6." (".$campos6.") VALUES (".$variable6.")";
						$bd->insertar($tabla6,$campos6,$variable6);
					//-----------Ingresar los deducibles del Amparo--------------
						$tabla7 = "`deduciblesxamparo`";
						$campos7 = "`idSiniestro`, `VALOR_SINIESTRO_RESERVA`, `valorindemnizado`, `deducible`, `idaxr`";
						$variable7 = "'".$max."','".$VALOR_SINIESTRO_RESERVA."','".$VALOR_INDEMNIZADO."','".$DEDUCIBLE."','".$valAmp."'";
						//echo $sqlinsertar = "INSERT INTO ".$tabla7." (".$campos7.") VALUES (".$variable7.")";
						$bd->insertar($tabla7,$campos7,$variable7);
				}
			}

	//-----------------INSERTAR INSERTAR CUADRO SINIESTRO ------------------------------------------

			//Reembolso se cambia por idRecobro al ingreso

		$tabla = "`cuadrosiniestros`";
		$campos = "`Id`, `consecutivo`, `nitsol`, `ASEGURADORA`,`asumidoPor`, `p_beneficiario`, `p_asegurado`,`fecha_prescripcion`,`ZONA`,`p_ciudad_siniestro`, `DEPARTAMENTO`, `ACTIVOAFECTADO`,`causa_siniestro`, `tipo_causa`, `control_causa`,`RAMO`, `POLIZA`, `PLACA`,`PROYECTO`, `SINIESTRO`, `HORA_SINIESTRO`,`FECHA_SINIESTRO`, `Presencia_transito`, `inmovilizacion_vehi`,`CEDULA_CONDUCTOR`,`FECHA_AVISO_PRESENTADO_CLIENTE`,`FECHA_AVISO_SEGURADORA`, `ESTADO_SEGUIMIENTO_RISKS`,`FECHA_PAGO`, `TALLER`, `FECHA_INGRESO_TALLER`,`ESTADO`, `RESPONSABLE`,`reembolso`,`vlrecobros`, `FECHA_DOCUMENTACION`, `FECHA_LIMITE_PAGO`, `NUM_SINIESTRO`, `id_usuario`,`id_responsable`";
		$variable = "'".$max."','".$consecutivo."','".$_POST['idCliente']."','".$_POST['idCompany']."','".$_POST['idAsumido']."','".$_POST['idAsegurado']."','".$_POST['idAsegurado']."','".$fechaPrescripcion."','".strtoupper($_POST['sitioStro'])."','".$_POST['idCiudad']."','".$_POST['idDepartamento']."','".strtoupper($_POST['codInterno'])."','".$_POST['causa']."','".$_POST['tipo_causa']."','".$_POST['control']."','".$_POST['idRamo']."','".strtoupper($_POST['poliza'])."','".strtoupper($_POST['placa'])."','".$_POST['idProyecto']."',	'".$Siniestro."','".$_POST['timeStro']."','".$fechaSiniestro."','".$_POST['transitPolice']."','".$_POST['immobilization']."','".$_POST['idDriver']."','".$fechaCliente."','".$fechaAseguradora."','".$Seguimineto."','".$fechaPago."','".$idMaxworkRepair."','".$fechaIngresoTaller."','".$_POST['idEstado']."','".$_POST['idResponsable']."','".$_POST['idRecobro']."','".$vlrecobros."','".$fechDocum."','".$fechLimtPag."','".$_POST['numStroCompany']."','".$usuario."','".$usuario."'";
		//echo $sqlinsertar = "INSERT INTO ".$tabla." (".$campos.") VALUES (".$variable.")";
		if($bd->insertar($tabla,$campos,$variable))
		{
			//========================================Log de Ingreso===================================================================================
				$log = "<hr /><br/>".$nombreus.' '.date('d/m/Y H:i:s').'Siniestro #'.$max.' creado con consecutivo - '.$consecutivo.'<br/>';
				$tablal = "`log_siniestro`";
				$camposl = "`Id_Usuario`, `Id_Siniestro`, `Log`,`Tipo`";
				$variablel = "'".$usuario."','".$max."','".$log."','1'";
				$bd->insertar($tablal,$camposl,$variablel);
			//========================================Ultimo Seguimiento===============================================================================
				$tablas = "`seguimiento_stro`";
				$camposs = "`Id_Siniestro`, `lastSgm`";
				$variables = "'".$max."','".$Seguimineto."'";
				$bd->insertar($tablas,$camposs,$variables);
			//==========================================================================================================================================
			$data=array('id'=>true,'url'=>'./upload_stro_view.php?Id='.$max,'msj'=>"Ingreso de Stro Exitoso! (".$consecutivo.")");
			echo json_encode($data);
		}
		else
		{
			$data=array('id'=>true,'url'=>'./insert_siniestro_view.php','msj'=>"Se presento un error al Ingresar  el Stro!");
			echo json_encode($data);
		}
?>		
		
		
		