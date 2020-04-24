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
	//===================================================================
		$sqlus = "SELECT * FROM `usuarios` WHERE Id = '".$usuario."'";
		$stmtus=$bd->ejecutar($sqlus);
		$rowccus=$bd->obtener_fila($stmtus,0);
		$nombreus = $rowccus['Nombres'].' '.$rowccus['Apellidos'];
	//=============================================================
		$sqlStro = "SELECT * FROM `cuadrosiniestros` WHERE Id = '".$_POST['Id_Stro']."'";
		$stmtStro=$bd->ejecutar($sqlStro);
		$rowccStro=$bd->obtener_fila($stmtStro,0);
		$oldSeg = $rowccStro['ESTADO_SEGUIMIENTO_RISKS'];
	 	
	//================Textos========================================================
		//----Seguimineto-----
		 	$lastSeg = '<hr /></br>'.$nombreus.' '.date('d/m/Y H:i:s').'</br><p style="text-align: justify;">'.$_POST['htmlSeguimientoNew'].'</p>';
			$Seguimineto = $oldSeg.' '.$lastSeg;

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
				if($_POST['idResponsable'] == 'PENDIENTE'){	$vlrecobros = '0'; }
			//-----------------------------------------------------------------------------------

		
		//====================================Consulta Ramo para determina el resto de la informacion del vehiculo==============================================
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
						}else{
							$idMaxworkRepair = $_POST['idworkRepair'];
						}
						
				//============================Buscar Conductor; si no está, se ingresa a la Base de Datos============================
					$sql3 = "SELECT count(*) AS conductor FROM `conductores` WHERE IdConductor = '".$_POST['idDriver']."'";
					$stmt3=$bd->ejecutar($sql3);
					$rowcc3=$bd->obtener_fila($stmt3,0);
					//-----------------------------------------------------------------------------------------
						if($rowcc3['conductor'] == 0 )
						{
							//====================== Ingresar Conductores=====================================
								$tabla3 = "`conductores`";
								$campos3 = "`IdConductor`, `Conductor`,`telConductor`, `Estado`";
								$variable3 = "'".$_POST['idDriver']."','".strtoupper($_POST['nameDriver'])."','".$_POST['telDriver']."','A'";
								//echo $sqlinsertar = "INSERT INTO ".$tabla3." (".$campos3.") VALUES (".$variable3.")";
								$bd->insertar($tabla3,$campos3,$variable3);
						}
				//============================Insertar Causas o actualizarlas ==============================
					$sql4 = "SELECT count(*) AS cont_causa FROM `info_causas_siniestros` WHERE Id_Siniestro = '".$_POST['Id_Stro']."'";
					$stmt4=$bd->ejecutar($sql4);
					$rowcc4=$bd->obtener_fila($stmt4,0);
					//-----------------------------------------------------------------------------------------
						if($rowcc4['cont_causa'] == 0 )
						{
							//====================== Ingresar Cuasas X Siniestros=====================================
								$tabla4 = "`info_causas_siniestros`";
								$campos4 = "`Id_Siniestro`, `id_tipo`, `id_causa`, `id_control`";
								$variable4 = "'".$_POST['Id_Stro']."','".$_POST['tipo_causa']."','".$_POST['causa']."','".$_POST['control']."'";
								//echo $sqlinsertar = "INSERT INTO ".$tabla4." (".$campos4.") VALUES (".$variable4.")";
								$bd->insertar($tabla4,$campos4,$variable4);
						}
			}
		//============================Consultar Beneficiario si no está, se ingresa a la Base de Datos=======================
			$sql6 = "SELECT count(*) AS nitBeneficiario FROM `beneficiarios_siniestro` WHERE IdBeneficiario = '".$_POST['idAsegurado']."'";
			$stmt6=$bd->ejecutar($sql6);
			$rowcc6=$bd->obtener_fila($stmt6,0);
			//-----------------------------------------------------------------------------------------
			if($rowcc6['nitBeneficiario'] == 0 )
			{
				//===================INGRESA  el BENEFICIARIO====================================
					$tabla8 = "`beneficiarios_siniestro`";
					$campos8 = "`IdBeneficiario`, `Nombres`, `Estado`";
					$variable8 = "'".$_POST['idAsegurado']."','".strtoupper($_POST['nameAsegurado'])."','A'";
					//echo $sqlinsertar = "INSERT INTO ".$tabla8." (".$campos8.") VALUES (".$variable8.")";
					$bd->insertar($tabla8,$campos8,$variable8);
			}
		//============================Ingresar los Amparos del Siniestro=====================================================			
			/*$listaamp = $_POST['amp'];
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
			}*/
		//============================Update Amparo Afectado=====================================================				
			/*for ($i=1; $i<=$_POST['amps']; $i++)
			{
				$valorin = $_POST['VALOR_INDEMNIZADO'.$i];
				$deducibl = $_POST['DEDUCIBLE'.$i];
				$VALOR_SINIESTRO_RESERVA = $_POST['VALOR_SINIESTRO_RESERVA'.$i];
				$idaxr = $_POST['amps'.$i];
				$sqldeducibles = "UPDATE `deduciblesxamparo` SET `VALOR_SINIESTRO_RESERVA`='".$VALOR_SINIESTRO_RESERVA."',`valorindemnizado`='".$valorin."',`deducible`='".$deducibl."' WHERE `idSiniestro`='".$_POST['idSiniestro']."' and `idaxr`='".$idaxr."'";
				@mysql_query($sqldeducibles, $id); 
			}*/

	//-----------------UPDATE CUADRO SINIESTRO ------------------------------------------

			//Reembolso se cambia por idRecobro al ingreso

		$tabla2 = "`cuadrosiniestros`";
		$campavariable2 = "`nitsol` = '".$_POST['idCliente']."',`asumidoPor` = '".$_POST['idAsumidoHidden']."',`p_beneficiario` = '".$_POST['idAsegurado']."',`p_asegurado` = '".$_POST['idAsegurado']."',`Presencia_transito` = '".$_POST['transitPolice']."',`inmovilizacion_vehi` = '".$_POST['immobilization']."',`CEDULA_CONDUCTOR` = '".$_POST['idDriver']."', `FECHA_AVISO_SEGURADORA` = '".$fechaAseguradora."',`ESTADO_SEGUIMIENTO_RISKS`='".$Seguimineto."', `FECHA_PAGO` = '".$fechaPago."',`TALLER` = '".$idMaxworkRepair."', `FECHA_INGRESO_TALLER` = '".$fechaIngresoTaller."',`ESTADO` = '".$_POST['idEstado']."', `RESPONSABLE` = '".$_POST['idResponsablehidden']."',`reembolso` = '".$_POST['idRecobroHidden']."',`vlrecobros` = '".$vlrecobros."',`FECHA_DOCUMENTACION` = '".$fechDocum."', `FECHA_LIMITE_PAGO` = '".$fechLimtPag."',  `NUM_SINIESTRO` = '".$_POST['numStroCompany']."', `id_usuario` =  '".$usuario."',`id_responsable` = '".$usuario."'";
		$condicion2 = "`Id`='".$_POST['Id_Stro']."'";
		//$sqlactualizar = 'UPDATE '.$tabla2.' '.' Set '.$campavariable2.'  Where '.$condicion2;
		if($bd->actualizar($tabla2,$campavariable2,$condicion2))
		{
			//========================================Log de Update============================================================================
				$log = "<hr /><br/>".$nombreus.' '.date('d/m/Y H:i:s').'Siniestro #'.$_POST['Id_Stro'].' modificado con consecutivo - '.$rowccStro['consecutivo'].'<br/>';
				$tablal = "`log_siniestro`";
				$camposl = "`Id_Usuario`, `Id_Siniestro`, `Log`,`Tipo`";
				$variablel = "'".$usuario."','".$_POST['Id_Stro']."','".$log."','2'";
				$bd->insertar($tablal,$camposl,$variablel);

			//========================================Ultimo Seguimiento========================================================================
				$sql3 = "SELECT count(*) AS contLastSeg FROM `seguimiento_stro` WHERE Id_Siniestro = '".$_POST['Id_Stro']."'";
				$stmt3=$bd->ejecutar($sql3);
				$rowcc3=$bd->obtener_fila($stmt3,0);
				//-----------------------------------------------------------------------------------------
					if($rowcc3['contLastSeg'] > 0 )
					{
						//===================Actualizar el ultimo Seguimiento==================================
							$tabla2 = "`seguimiento_stro`";
							$campavariable2 = "`lastSgm`='".$lastSeg."'";
							$condicion2 = "`Id_Siniestro`='".$_POST['Id_Stro']."'";
							$bd->actualizar($tabla2,$campavariable2,$condicion2);
					}
					else
					{
						//===================Ingresar el ultimo Seguimiento====================================
							$tablas = "`seguimiento_stro`";
							$camposs = "`Id_Siniestro`, `lastSgm`";
							$variables = "'".$_POST['Id_Stro']."','".$lastSeg."'";
							$bd->insertar($tablas,$camposs,$variables);
					}
			//----------------------------------------------------------------------------------------------------------------------------------
				$data=array('id'=>true,'url'=>'./upload_stro_view.php?Id='.$_POST['Id_Stro'],'msj'=>"Siniestro #".$rowccStro['consecutivo']." modificado!");
				echo json_encode($data);
		}
		else
		{
			$data=array('id'=>true,'url'=>'./siniestros_view.php','msj'=>"Se presento un error al modificar el Stro!");
			echo json_encode($data);
		}
?>		
		
		
		