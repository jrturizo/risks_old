<?php
	//===========================================================	
		error_reporting(0);
		session_start();
		if ($_SESSION['sivig']!= 'si' )
		{
			header("Location: ../login.php");
		}
		$Id= $_SESSION['Id'];
		$folder = $_SESSION['Perfil'];
	//===========================================================
			require '../Clases/Db.class.php';
			require '../Clases/Conf.class.php';
			$bd=Db::getInstance();
	//===========================================================
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema de Administración de Riesgos">
  	<meta name="author" content="Risks and Protection">
	<title>Risk and Protection</title>
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
 	<link rel="shortcut icon" href="assets/images/favicon.png">

	<!-- /CSS -------------------------------------------->     
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">        
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/colors.css" rel="stylesheet" type="text/css">
        <link href="assets/css/estilos-generales.css" rel="stylesheet" type="text/css">
	<!-- js principales -------------------------------------------->     	
		<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/core/app.js"></script>
        <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>   
	   

	<!-- js de esta página -------------------------------------------->
   		
        <!-- para elejir la fecha -->    
		<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
        
        <!-- Estilos y funcionalidades de checkbox --> 
        <script type="text/javascript" src="assets/js/plugins/forms/styling/switch.min.js"></script>       
    
        <!-- funcionalidades de tabla (datatables) --> 
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>              
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
        
        <!-- Funcionalidades de selects --> 
        <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
        
        <!-- Funcionalidades de slidebar --> 
        <script type="text/javascript" src="assets/js/plugins/sliders/nouislider.min.js"></script>  
		
		 <!----------------------------------------------------------------------------------------------------------------------> 	
		<!----------------------------------------------------------------------------------------------------------------------> 	
		<!-------------------------------------------------------------------------------------------------------------------->
			<link type="text/css" href="../css/validacion_css/estilo.css" rel="stylesheet" />
			<script type="text/javascript" src="../js/validaciones/validarfile.js" language="JavaScript"></script>
			<script type="text/javascript" src="../js/validaciones/jquery.numeric.js"></script>
			<script type="text/javascript" src="../js/validaciones/autoNumeric-1.7.4.js"></script>
			<script type="text/javascript" src="../js/validaciones/ValidarNumeros.js" language="JavaScript" ></script>
			<script type="text/javascript" src="../js/librerias/jquery.ui.button.js"></script>
			<script type="text/javascript" src="../js/librerias/jquery.validate.js"></script>
			<script type="text/javascript" src="../js/librerias/additional-methods.js"></script>
			<script type="text/javascript" src="../js/librerias/jquery-ui-timepicker-addon.js"></script>
			<script type="text/javascript" src="../js/librerias/jquery.maskedinput.js" ></script>
			<script type="text/javascript" src="../js/librerias/jquery.maskedinput.min.js" ></script>
			<script type="text/javascript" src="../js/fecha/fecha.js"></script>
			<script type="text/javascript" src="../js/librerias/jquery.blockUI.js"></script>
		
        <script>
			$(document).ready(function()
			{
				//$(".clausulas").hide();
				//$("#BTN_ENVIAR").hide();
				//$(".div_extranjero").hide();
				
				/*1*/$("#idRamo").load('./selects/select_ramos.php');
				/*2*/$("#idDepartamento").load('./selects/select_departamentos.php');
				/*3*/$("#estadoSiniestro").load('./selects/select_estados_siniestros.php');
				/*4*/$("#idCia").load('./selects/select_compania.php');
				/*5*/$("#idResponsable").load('./selects/select_funcionarios.php');
				/*6*/$("#tipo_causa").load('./selects/select_tipo_causa.php');
				/*7*/$("#asumidoPor").load('./selects/select_asumidores.php');
				//------------------------------------------
				//-----------------------------------------------------------
				//========================================================================================================================
					$("#idDepartamento").change(function(event)
					{
						var idDepartamento = $("#idDepartamento").find(':selected').val();
						$.post("../selects/select_ciudad.php",{"idDepartamento": idDepartamento }, 
						function(data) 
						{
							$("#idCiudad").html(data);
						});
					});	
				//-----------------------------------------
					/*$("#tipoServicio").change(function(event)
					{
						//----------------------------------------------------------
						var folder = $("#folder").val();
						var tipoServicio = $("#tipoServicio").find(':selected').val();
						//----------------------------------------------------------
						$.post("./html_files.php",{"tipoServicio": tipoServicio }, 
						function(data) 
						{
							$("#html_files").html(data);
						});
					});*/	
				//----------------------------------
					/*$(".form").delegate("#div_clausula","click",function()
					{
						$(".clausulas").show();
					});*/
				//------------------------------------
				/*
					$(".form").delegate("#acepta","click",function()
					{
						if($(this).is(':checked'))
						{
							$(this).val("Y");
							$("#BTN_ENVIAR").show();
						}
						else  
						{
							$(this).val("N");
							$("#BTN_ENVIAR").hide();
						}
					});*/
			});
			
		</script>
		
		<link href="./assets/css/stylecustomer.css" rel="stylesheet" type="text/css"/>
		<style type="text/css">	
				
				.navbar-xlg {
					background-color:#1f286d
				}

				.navbar-xlg:before {
					background-image: url(assets/images/banner-risks.jpg);
					background-position: 0 100%;
				}

				.navbar-xlg .navbar-header {
					background: #fff url(assets/images/logo-risks-adm.png) no-repeat center center;	
					background-size: contain;
				}

				.sidebar-content{
					background:#1f286d
				}

				.sidebar-content:before{
					background-image: url(assets/images/banner-risks_1.jpg);
					background-position: 0 100%;
				}

				.w-home{
					/*background: #fff url(assets/images/banner-risks.jpg) no-repeat center center;*/
					background-size: cover;
				}





			.input-file-container {
			  position: relative;
			  width: 170px;
			} 
			.js .input-file-trigger {
			  display: block;
			  padding: 14px 45px;
			  background: #85C1E9;
			  color: #fff;
			  font-size: 1em;
			  transition: all .4s;
			  cursor: pointer;
			}
			.js .input-file {
			  position: absolute;
			  top: 0; left: 0;
			  width: 170px;
			  opacity: 0;
			  padding: 14px 0;
			  cursor: pointer;
			}
			.js .input-file:hover + .input-file-trigger,
			.js .input-file:focus + .input-file-trigger,
			.js .input-file-trigger:hover,
			.js .input-file-trigger:focus {
			  background: #F0F8FF;
			  color: #85C1E9;
			}

			.file-return {
			  margin: 0;
			}
			.file-return:not(:empty) {
			  margin: 1em 0;
			}
			.js .file-return {
			  font-style: italic;
			  font-size: .9em;
			  font-weight: bold;
			}
			.js .file-return:not(:empty):before {
			  content: "Selected file: ";
			  font-style: normal;
			  font-weight: normal;
			}


			h1, h2 {
			  margin-bottom: 5px;
			  font-weight: normal;
			  text-align: center;
			  color:#aaa;
			}
			h2 {
			  margin: 5px 0 2em;
			  color: #1ABC9C;
			}
			h2 + P {
			  text-align: center;
			}
			.txtcenter {
			  margin-top: 4em;
			  font-size: .9em;
			  text-align: center;
			  color: #aaa;
			}
			.copy {
			  margin-top: 2em;
			}
			.copy a {
			  text-decoration: none;
			  color: #1ABC9C;
			}
			hr {
				display: block;
				margin-top: 0.5em;
				margin-bottom: 0.5em;
				margin-left: auto;
				margin-right: auto;
				border-style: inset;
				border-width: 3px;
			}
			.div_contacto{
				background-color: #E5EEF4;
			}
			.div_total{
				background-color:  #d0ece7;
			}
			.div_complemento{
				background-color: #fadbd8;
			}
			.div_extranjero{
				background-color: #C39BD3;
			}
			
			
		</style>
		
</head>

<body class="navbar-top pace-done">

<!-- Main navbar -->
	<!-- Navbar sección -->
	<div class="navbar navbar-fixed-top navbar-inverse  navbar-xlg">
		<div class="navbar-header">

			<div class="cut-logo"></div>
			<!-- <a class="navbar-brand center-block" href="index.html"><img class="center-block" src="assets/images/logo.jpg" alt=""></a> -->
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"></a></li>

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<span><div id="nombre_usuario"></div></span>
						<i class="caret"></i>
					</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="./perfil.php"><i class="icon-user-plus"></i> Mi perfil</a></li>
                        <li><a href="./alerts.php"><span class="badge bg-blue pull-right"><?php echo "10";?></span> <i class="icon-comment-discussion"></i> Alertas</a></li>
                        <li class="divider"></li>
                        <li><a href="../../../../cerrar_session.php"><i class="icon-switch2"></i> Salir</a></li>
                    </ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /Navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed bg-slate-600">
				<div class="sidebar-content">
                
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
							<li class="navigation-header"><span>MENÚ</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="./"><i class="icon-home4"></i> <span>Inicio</span></a></li>
								<li>
									<a href="#"><i class="icon-rocket"></i> <span>Maestros</span></a>
									<ul>
										<li><a href="./client.php">Clientes</a></li>
										<li><a href="./company.php">Compañías</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-car"></i> <span>Autos y Beneficios</span></a>
									<ul>
										<li><a href="./car.php">Control Veh&iacute;culo</a></li>
										<li><a href="./insert_car_view.php">Registrar Automóvil</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stack"></i> <span>Cumplimiento e Infr</span></a>
									<ul>
										<li><a href="./cumplimiento.php">Control de Cumplimiento</a></li>
										<li><a href="./insert_cumplimiento_view.php">Registrar Polizas Cumpl - Rc</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-exclamation"></i> <span>Generales y Siniestros</span></a>
									<ul>
										<li><a href="./siniestros.php">Control de Siniestros</a></li>
										<li><a href="./insert_siniestro_view.php">Registrar Siniestros</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-cogs"></i> <span>Gestion de Clientes</span></a>
									<ul>
										<li><a target="_blank" href="https://www.risks.com.co/./resumen_seguros/web/?dir=">Resumen de Seguros</a></li>
										<li><a href="./task.php">Tareas</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Contenedor principal -->
			<div class="content-wrapper w-home">
				<!-- Content area -->
				<div class="content">
					<div class="panel">
						<div class="panel-heading bg-slate-300">
							<h5 class="panel-title">Registrar Siniestro</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>	                                    	                		
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
						<!--------------------------------------->
							<form role="form" id="formul" name="formul" class="form" method="post" action="" enctype="multipart/form-data">
								<div class="div_total">
									</br>

									<fieldset>							
										<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<span><strong style="color:black;">DATOS DEL TOMADOR.</strong></span>
														</div>
														<hr>
													</div>
												</center>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-4 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Póliza: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="policy" name="policy" size="32" placeholder="Póliza" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-4 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Fecha de ingreso: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="dateEntry" name="dateEntry" size="32" placeholder="Fecha de ingreso" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-4 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Nit asegurado: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="nitInsured" name="nitInsured" size="32" placeholder="Nit asegurado" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-6 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Nombre: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="nameInsured" name="nameInsured" size="32" placeholder="Nombre" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-4 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Nit beneficiario: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="nitBeneficiary" name="nitBeneficiary" size="32" placeholder="Nit Beneficiario" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-6 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Nombre: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="nameBeneficiary" name="nameBeneficiary" size="32" placeholder="Nombre" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<span><strong style="color:black;">DATOS DEL VEHÍCULO.</strong></span>
														</div>
														<hr>
													</div>
												</center>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Placas: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="placas" name="placas" size="32" placeholder="Placas" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Modelo: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="model" name="model" size="32" placeholder="Modelo" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Color: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="color" name="color" size="32" placeholder="Color" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Tipo: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="type" name="type" size="32" placeholder="Tipo" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Clase: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="class" name="class" size="32" placeholder="Clase" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Marca: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="brand" name="brand" size="32" placeholder="Marca" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Chasis: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="chassis" name="chassis" size="32" placeholder="Chasis" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Motor: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="motor" name="motor" size="32" placeholder="Motor" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Servicio: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="service" name="service" size="32" placeholder="Servicio" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Circulación del vehículo: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="cirVehicle" name="cirVehicle" size="32" placeholder="Circulación del vehículo" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="text-semibold">Clasificación: </label>
													<div class="radio">
														<label class="radio-inline"><input type="radio" name="lightweight" id="classification">Liviano</label>
														<label class="radio-inline"><input type="radio" name="weighty" id="classification">Pesado</label>
														<label class="radio-inline"><input type="radio" name="motorcycle" id="classification">Motocicleta</label>
													</div>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-12 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Detalle accesorios: </label>
    												<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Vlr. Accesorios: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="vlAccessories" name="vlAccessories" size="32" placeholder="Vlr. Accesorios" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Bonificación: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="bonus" name="bonus" size="32" placeholder="Bonificación" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Tipo de pago: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="paymentType" name="paymentType" size="32" placeholder="Tipo de pago" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Fecha de pago: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="paymentDate" name="paymentDate" size="32" placeholder="Fecha de pago" maxlength="50" minlength="2" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-2 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Tasa: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="valuation" name="valuation" size="32" placeholder="Tasa" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-5 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Funcionario RISKS: </label>
													<select class="select required" id="officialRisks" name="officialRisks">											
														<option>SELECCIONE UNA OPCIÓN</option>						
													</select>
												</div>
											</div>
											<div class="col-md-5 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Entidad pago de prima: </label>
													<select class="select required" id="premiumPayEntity" name="premiumPayEntity">											
														<option>SELECCIONE UNA OPCIÓN</option>						
													</select>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Vencimiento técnico: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="technicalExpiration" name="technicalExpiration" size="32" placeholder="Vencimiento técnico" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
											<div class="col-md-3 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Vencimiento soat: </label>
													<input type="text" class="form-control text-bold text-size-large required" id="soatExpiration" name="soatExpiration" size="32" placeholder="Vencimiento soat" maxlength="6" minlength="5" onkeypress="return handleEnter(this, event)"/>
												</div>
											</div>
										</div>								
									</fieldset>

									<fieldset>							
										<div class="row"> 
											<div class="col-md-12 div_juridico">
												<div class="form-group">
													<label class="text-semibold">Observaciones de pago: </label>
    												<textarea class="form-control" id="paymentRemarks" rows="3"></textarea>
												</div>
											</div>
										</div>								
									</fieldset>
									
								</div>
							</form>
						<!--------------------------------------->
						</div>	
					</div>
					<!-- Panel Amparos Archivos -->
					<!--<div class="panel">
						<div class="panel-heading bg-slate-300">
							<h5 class="panel-title">Campo de Archivos</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>	                                    	                		
			                	</ul>
		                	</div>
						</div>
						                      									   
						<div class="panel-body" id="html_files">
								
						</div>
					</div>-->
					<!-- /Panel contenedor de Archivos -->				
					<!-- Footer -->
					<div id="footer" class="navbar navbar-default navbar-sm navbar-fixed-bottom">
						<ul class="nav navbar-nav no-border visible-xs-block">
							<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
						</ul>

						<div class="navbar-collapse collapse" id="navbar-second">
							<div class="navbar-brand">
                            	<a  href="https://www.risks.com.co/sirisks/" target="_blank"><img src="assets/images/logo-risks.png" alt=""></a>
							&copy; | <em>Cumpliendo nuestras promesas.</em> </div>

							<div class="navbar-right">
								<ul class="nav navbar-nav">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                            <i class="icon-help"></i>
											<span class="position-right">Ayuda</span>
											<span class="caret"></span>
										</a>

										<ul class="dropdown-menu dropdown-menu-right" style="min-width: 220px;">
											<li><a href="#" title="Llámenos"><i class="icon-phone2"></i> (054) 448 11 12</a></li>
											<li><a href="mailto:administrador@risks.com.co" title="Escribanos sus dudas"><i class="icon-mail5"></i> administrador@risks.com.co</a></li>
											<li><a href="#" title="Visítenos"><i class="icon-location3"></i> Cra 43B N° 32 Sur – 17</a></li>
                                            <li><a href="https://www.risks.com.co/sirisks/" title="Sitio web" target="_blank"><i class="icon-sphere"></i> www.risks.com.co</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /contenedor principal -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
    
    
<!-- /funcionalidades de esta página --------------------------------------------------->
<script>

    // Selector de fecha --------------------------------------------
    $('.daterange-basic').daterangepicker({
        startDate: "01/01/2016",
        endDate: moment(),
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default',			
        showDropdowns: true,
        "locale": {
            "format": "MM/DD/YYYY",
            "separator": " - ",
            "applyLabel": "Aplicar",
            "cancelLabel": "Cancelar",
            "fromLabel": "Desde",
            "toLabel": "Hasta",
            "customRangeLabel": "Elegir fechas",
            "weekLabel": "S",
            "startLabel": "Fecha inicial:",
            "endLabel": "Fecha Final:",				
            "daysOfWeek": [
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa",
                "Do"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        ranges: {
           'Hoy': [moment(), moment()],
           'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
           'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
           'Este més': [moment().startOf('month'), moment().endOf('month')],
           'Mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });
    
    
// Propiedades de la tabla -------------------------------------------------
        
       // Opciones por defecto para las tablas---
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fBl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Buscar:</span> _INPUT_',
                lengthMenu: '<span>Mostrar:</span> _MENU_',
				oPaginate: {
					"sFirst":    "Primero",
					"sLast":     "Ãšltimo",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior",
				},
				sInfoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
				sInfo:           "Mostrando resultados del _START_ al _END_ de un total de _TOTAL_",
				sZeroRecords:    "No se encontraron resultados",
				sEmptyTable:     "NingÃºn dato disponible en esta tabla",				
                
            }
        });	

        // Opciones para tabla consulta ---
        $('.tabla-resultados').DataTable({	
            buttons: {            
                dom: {
                    button: {
                        className: 'btn btn-default'
                    }
                },
                buttons: [
                    {
                        extend: 'copyHtml5',
						text: 'Copiar <i class="icon-copy3 position-right"></i>',                		
                        exportOptions: {
                            columns: [ ':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
						text: 'Excel <i class=" icon-file-excel position-right"></i>',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
						text: 'PDF <i class="icon-file-pdf position-right"></i>',
                        exportOptions: {
                            columns: [':visible']
                        }
                    },
                    {
                        extend: 'colvis',
						text: 'Ver <i class="icon-three-bars"></i> <span class="caret"></span>',	                        
                        className: 'btn-icon'
                    }
                ]
            },			
			 
        });
		
		
		// placeholder para el buscador de la tabla-----
		$('.dataTables_filter input[type=search]').attr('placeholder','Escribe para filtrar...');
	
	
	
// Funciones para los selects --------------------------------------------------
		
		$('.dataTables_length select').select2({
			minimumResultsForSearch: Infinity,
			width: 'auto'
		});
		
		$('.select').select2({
			minimumResultsForSearch: Infinity,							
			containerCssClass: ''
		});
		
// Funciones para sliderbar --------------------------------------------------	

		
		var keypressSlider = document.getElementById('barra-rango-dias'),
		input = document.getElementById('campo-rango-dias');		
		
		noUiSlider.create(keypressSlider, {
			start: 0,
			step: 5,
			connect: 'lower',
					
			range: {
				'min': [0],
				'25%': [50,5],	
				'50%': [100,5],	
				'75%': [150,5],				
				'max': 200
			},
			pips: {
            	mode: 'range',
            	density: 2.5,
				prefix: 'd',					
        	},
			
	
		});
		
		keypressSlider.noUiSlider.on('update', function( values, handle ) {
			input.value = values[handle];
		});
		
		input.addEventListener('change', function(){
			keypressSlider.noUiSlider.set([null, this.value]);
		});
		
		
		// Listen to keydown events on the input field.
		input.addEventListener('keydown', function( e ) {
		
			// Convert the string to a number.
			var value = Number( keypressSlider.noUiSlider.get() ),
				sliderStep = keypressSlider.noUiSlider.steps()
		
			// Select the stepping for the first handle.
			sliderStep = sliderStep[0];
		
			// 13 is enter,
			// 38 is key up,
			// 40 is key down.
			switch ( e.which ) {
				case 13:
					keypressSlider.noUiSlider.set(this.value);
					break;
				case 38:
					keypressSlider.noUiSlider.set( value + sliderStep[1] );
					break;
				case 40:
					keypressSlider.noUiSlider.set( value - sliderStep[0] );
					break;
			}
		}); 
		
// Funciones para checkbox --------------------------------------------------			
		$(".activar-campos").bootstrapSwitch();
</script>
		<script>
		$('.upload-all').click(function(){
			//submit all form
			$('form').submit();
		});

		$('.cancel-all').click(function(){
			//submit all form
			$('form .cancel').click();
		});

		$(document).on('submit','form',function(e){
			e.preventDefault();

			$form = $(this);

			uploadImage($form);

		});

		function uploadImage($form){
			$form.find('.progress-bar').removeClass('progress-bar-success')
										.removeClass('progress-bar-danger');

			var formdata = new FormData($form[0]); //formelement
			var request = new XMLHttpRequest();

			//progress event...
			request.upload.addEventListener('progress',function(e){
				var percent = Math.round(e.loaded/e.total * 100);
				$form.find('.progress-bar').width(percent+'%').html(percent+'%');
			});

			//progress completed load event
			request.addEventListener('load',function(e){
				$form.find('.progress-bar').addClass('progress-bar-success').html('upload completed....');
			});

			request.open('post', 'server.php');
			request.send(formdata);

			$form.on('click','.cancel',function(){
				request.abort();

				$form.find('.progress-bar')
					.addClass('progress-bar-danger')
					.removeClass('progress-bar-success')
					.html('upload aborted...');
			});

		}

		//thanks for watching........
		//code on git........

		//subscribe, share, like, comment.............

	</script>

</body>

</html>
