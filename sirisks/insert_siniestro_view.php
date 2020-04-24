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
		<link type="text/css" href="assets/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
		
	<!-- js principales -------------------------------------------->     	
		<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/core/app.js"></script>
		<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>   
		
	<!-- js de esta página -------------------------------------------->
		<script src="assets/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
    <!-- para elejir la fecha -->    
		<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/plugins/pickers/datepicker.js"></script>
	<!---------------------------------------------------------------------------------------->
	<!---------------------------------------------------------------------------------------->
		<script type="text/javascript" src="assets/js/funcionalidades/bootstrap-datetimepicker.js"></script>
		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap-datetimepicker.css" />
	<!---------------------------------------------------------------------------------------->
	<!---------------------------------------------------------------------------------------->

		<!-- js de esta página -------------------------------------------->
		<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
        
		<!-- Estilos y funcionalidades de checkbox --> 
        <script type="text/javascript" src="assets/js/plugins/forms/styling/switch.min.js"></script>       
    
        <!-- funcionalidades de tabla (datatables) --> 
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>              
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js"></script>
      <!--  <script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js"></script>-->
        <script type="text/javascript" src="assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js"></script>
        
        <!-- Funcionalidades de selects --> 
        <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
        
        <!-- Funcionalidades de slidebar --> 
        <script type="text/javascript" src="assets/js/plugins/sliders/nouislider.min.js"></script>  

		<!-- funcionalidades de autocompletados --> 
        <script type="text/javascript" src="assets/js/bootstrap3-typeahead.min.js"></script>   

	<!------------------------------------------------------------------------------------------------------------------------> 	
	<!------------------------------------------------------------------------------------------------------------------------>
			<link type="text/css" href="assets/css/estilo.css" rel="stylesheet" />
			<script type="text/javascript" src="assets/js/validarfile_textArea_stro.js" language="JavaScript"></script>
			<script type="text/javascript" src="assets/js/jquery.numeric.js"></script>
			<script type="text/javascript" src="assets/js/autoNumeric-1.7.4.js"></script>
			<script type="text/javascript" src="assets/js/ValidarNumeros.js" language="JavaScript" ></script>
			<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
			<script type="text/javascript" src="assets/js/additional-methods.js"></script>
			<script type="text/javascript" src="assets/js/jquery.maskedinput.js" ></script>
			<script type="text/javascript" src="assets/js/jquery.maskedinput.min.js" ></script>
			<script type="text/javascript" src="assets/js/jquery.blockUI.js"></script>
	<!------------------------------------------------------------------------------------------------------------------------> 	
	<!------------------------------------------------------------------------------------------------------------------------>
		<script>
			$(document).ready(function()
			{				
				//=========================Html Ocultos - Iniciales para el formulario==========================================
					/*Ocultar Html Vehiculo*/ $(".panel_vehiculo").hide();
					/*Ocultar Html Amparos*/ $(".panel_amparos").hide();
					/*Ocultar Html Causas*/ $(".panel_terceros").hide();
					/*Ocultar Html Proyectos*/ $(".html_Proyecto").hide();
					/*Ocultar Html del Valor del Recobro*/ $(".divRecobro").hide();

				//=========================Select Iniciales para el formulario==================================================
					/*Load Usuario Conectado*/$("#nombre_usuario").load('../nombre_usuario_conectado/usuario_online_cliente.php');		
					/*Load Select Ramos Stro*/$("#idRamo").load('./selects/select_ramos.php');
					/*Load Select Asumidor Stro*/$("#idAsumido").load('./selects/select_asumidores.php');
					/*Load Select Responsable Stro*/$("#idResponsable").load('./selects/select_responsables.php');
					/*Load Select Departamentos de Colombia*/$("#idDepartamento").load('./selects/select_departamentos.php');
					/*Load Select Compañias de Seguro*/$("#idCompany").load('./selects/select_compania.php');
					/*Load Select Estados del Siniestro*/$("#idEstado").load('./selects/select_estados_siniestros.php');	

				//===================== Select Ciudad x Departamento=============================================================
					$("#idDepartamento").change(function(event)
					{
						var idDepartamento = $("#idDepartamento").find(':selected').val();
						$.post("./selects/select_ciudad.php",{"idDepartamento": idDepartamento }, 
						function(data) 
						{
							$("#idCiudad").html(data);
						});
					});	 

					
				//==================================Cambios del Html dependidento del Ramo=======================================
					$("#idRamo").change(function(event)
					{
						$(".panel_amparos").show();

						var idRamo = $("#idRamo").find(':selected').val();
						
						if( idRamo == '1' || idRamo == '2' || idRamo == '25' || idRamo == '46' || idRamo == '44' || idRamo == '43' || idRamo == '5' || idRamo == '48' || idRamo == '4' || idRamo == '47' || idRamo == '6'){
							$(".panel_vehiculo").show();				
						}
						else{
							$(".panel_vehiculo").hide();				
						}
					//----------------------------------------------------------------------------
						if( idRamo == '7' || idRamo == '36' ){
							$(".html_cumpliento").hide();
							$(".html_Proyecto").show();
							$(".divRecobro").hide();
						}
						else{
							$(".html_cumpliento").show();
						}
					//-----------------------html_view_amparos------------------------------------

							$("#html_amparos").load('./view/html_amparos.php?idRamo='+idRamo);	
					});

				//======================Valor del Recobro========================================================================
					$(".form").delegate("#divRecobroN","click",function(){
						$(".divRecobro").hide();
					});	
					$(".form").delegate("#divRecobroY","click",function(){
						$(".divRecobro").show();
					});

				//======================Cambios de los causas controles del Siniestro============================================
					$(".form").delegate("#tipo_causa","change",function(){
						var tipo_causa = $("#tipo_causa").find(':selected').val();
						//------------------------------------------------------------------------
							$.post("./selects/select_causasxtipo.php",{"tipo_causa": tipo_causa }, 
							function(data) 
							{
								$("#causa").html(data);
							});
						//------------------------------------------------------------------------
							$.post("./selects/select_controlesxtipo.php",{"tipo_causa": tipo_causa }, 
							function(data) 
							{
								$("#control").html(data);
							});
					});
				//=======================Checket para los amparos y aplicar clase de requerido===================================
					$(".form").delegate(".check_amparo","click",function()
					{
						var id = $(this).attr('id');
						var maxAmpCont = $("#maxAmpCont").val();
						if($(this).is(':checked'))
						{
							$(this).val("Y");
							maxAmpCont ++;
							$("#maxAmpCont").val(maxAmpCont);
						}
						else  
						{
							$(this).val("N");
							maxAmpCont --;
							$("#maxAmpCont").val(maxAmpCont);
						}
					});		
			});
				//======================Autocompletados con varios select Cliente Risks=========================================================
					$(function(){
					//------Single Select Cliente----------------------------------------------------------------
						$( "#idCliente" ).autocomplete({
							source: function( request, response ) {
								$.ajax({
									url: "./search/autocomplet_asegurado.php",
									type: 'post',
									dataType: "json",
									data: {
										search: request.term
									},
									success: function( data ) {
										response( data );
									}
								});
							},
							select: function (event, ui) {
								$('#nameCliente').val(ui.item.label);
								$('#idCliente').val(ui.item.value); 
								return false;
							}
						});
					//------Single Select Cliente----------------------------------------------------------------
						$( "#idAsegurado" ).autocomplete({
												source: function( request, response ) {
													$.ajax({
														url: "./search/autocomplet_asegurado_beneficiarios.php",
														type: 'post',
														dataType: "json",
														data: {
															search: request.term
														},
														success: function( data ) {
															response( data );
														}
													});
												},
												select: function (event, ui) {
													$('#nameAsegurado').val(ui.item.label);
													$('#idAsegurado').val(ui.item.value); 
													return false;
												}
											});

					//------Single Select Poliza-----------------------------------------------------------------------
						$( "#poliza" ).autocomplete({
							source: function( request, response ) {
								// Fetch data
								$.ajax({
									url: "./search/autocomplet_policy.php",
									type: 'post',
									dataType: "json",
									data: {
										search: request.term
									},
									success: function( data ) {
										response( data );
									}
								});
							},
							select: function (event, ui) {
							// Set selection------
									$('#poliza').val(ui.item.label); 
									$('#idCompany').val(ui.item.title);
									$('#idCliente').val(ui.item.value);
									$('#nameCompany').val(ui.item.nametitle);
									$('#nameCliente').val(ui.item.nameValue);

									var Placas = ui.item.Placas;

									if(Placas != ""){

										$(".panel_vehiculo").show();
										$('#placa').val(ui.item.Placas);
										$('#idAsegurado').val(ui.item.Asegurado);
										$('#nameAsegurado').val(ui.item.nameAsegurado);
										$('#type').val(ui.item.TipoVehicu);
										$('#class').val(ui.item.ClaseVehicu);
										$('#brand').val(ui.item.MarcaVehicu);
										$('#model').val(ui.item.Modelo);
										$('#chassis').val(ui.item.Chasis);
										$('#engine').val(ui.item.Motor);
										$('#idDriver').val(ui.item.Asegurado);
										$('#nameDriver').val(ui.item.nameAsegurado);
										$('#telDriver').val(ui.item.teleAsegurado);

										var NumInterno = ui.item.NumInterno;

										if(NumInterno == ""){
											$('#codInterno').val(ui.item.Placas);
										}
										else{
											$('#codInterno').val(ui.item.NumInterno);
										}
									}

									return false;
							}
						});

					//------Single Select Vehiculo-----------------------------------------------------------------------
						$( "#placa" ).autocomplete({
							source: function( request, response ) {
								// Fetch data
								$.ajax({
									url: "./search/autocomplet_car.php",
									type: 'post',
									dataType: "json",
									data: {
										search: request.term
									},
									success: function( data ) {
										response( data );
									}
								});
							},
							select: function (event, ui) {
								// Set selection
								$('#placa').val(ui.item.value);
								$('#type').val(ui.item.TipoVehicu);
								$('#class').val(ui.item.ClaseVehicu);
								$('#brand').val(ui.item.MarcaVehicu);
								$('#model').val(ui.item.Modelo);
								$('#chassis').val(ui.item.Chasis);
								$('#engine').val(ui.item.Motor);
								$('#color').val(ui.item.Color);

								var NumInterno = ui.item.NumInterno;

								if(NumInterno == ""){
									$('#codInterno').val(ui.item.value);
								}
								else{
									$('#codInterno').val(ui.item.NumInterno);
								}
								return false;
							}
						});

					//------Single Select Conductor----------------------------------------------------------------
						$( ".cldriver" ).autocomplete({
							source: function( request, response ) {
								$.ajax({
									url: "./search/autocomplet_driver.php",
									type: 'post',
									dataType: "json",
									data: {
										search: request.term
									},
									success: function( data ) {
										response( data );
									}
								});
							},
							select: function (event, ui) {
								$('#nameDriver').val(ui.item.label);
								$('#idDriver').val(ui.item.value); 
								$('#telDriver').val(ui.item.Telefono); 
								return false;
							}
						});
					//------Single Select Taller----------------------------------------------------------------
						$( "#workRepair" ).autocomplete({
							source: function( request, response ) {
								$.ajax({
									url: "./search/autocomplet_taller.php",
									type: 'post',
									dataType: "json",
									data: {
										search: request.term
									},
									success: function( data ) {
										response( data );
									}
								});
							},
							select: function (event, ui) {
								$('#idworkRepair').val(ui.item.value);
								$('#workRepair').val(ui.item.label); 
								$('#telWorkshop').val(ui.item.title); 
								return false;
							}
						});

					//------Single Select ResponsaTaller----------------------------------------------------------------
						$( "#respWorkshop" ).autocomplete({
							source: function( request, response ) {
								$.ajax({
									url: "./search/autocomplet_restaller.php",
									type: 'post',
									dataType: "json",
									data: {
										search: request.term
									},
									success: function( data ) {
										response( data );
									}
								});
							},
							select: function (event, ui) {
								$('#idrespWorkshop').val(ui.item.value);
								$('#respWorkshop').val(ui.item.label); 
								return false;
							}
						});
					//------Single Select Compañía----------------------------------------------------------------
						$( "#nameCompany" ).autocomplete({
							source: function( request, response ) {
								$.ajax({
									url: "./search/autocomplet_company.php",
									type: 'post',
									dataType: "json",
									data: {
										search: request.term
									},
									success: function( data ) {
										response( data );
									}
								});
							},
							select: function (event, ui) {
								$('#idCompany').val(ui.item.value);
								$('#nameCompany').val(ui.item.label); 
								return false;
							}
						});

					});
			
		</script>

		

<style type="text/css" media="screen">
		.navbar-xlg {
					background-color:#1f286d
				}

				.navbar-xlg:before {
					background-image: url(./assets/images/banner-risks.jpg);
					background-position: 0 100%;
				}

				.navbar-xlg .navbar-header {
					background: #fff url(./assets/images/logo-risks-adm.png) no-repeat center center;	
					background-size: contain;
				}

				.sidebar-content{
					background:#1f286d
				}

				.sidebar-content:before{
					background-image: url(./assets/images/banner-risks_1.jpg);
					background-position: 0 100%;
				}

				.w-home{
					background: #fff url(assets/images/banner-risks.jpg) no-repeat center center;
					background-size: cover;
				}

			.ui-autocomplete {
				position: absolute;
				top: 0;
				left: 0;
					cursor: default;
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
		/*	
			.div_contacto{
				background-color: #E5EEF4;
			}
			.div_total{
				background-color:  #a1c9f1;
			}
			.div_stro{
				background-color:  #d2e9da;
			}
			.div_complemento{
				background-color: #d2b4de ;
			}
			.div_vehiculo{
				background-color: #d5dbdb  ;
			}

			.div_causas{
				background-color: #F5A9BC  ;
			}
		*/
		
		/* ---------------------- Css para botones Radio buton-------------------------------*/
			.btn-default.btn-on.active{background-color: #DA4F49; color: white;}
			.btn-default.btn-off.active{background-color: #5BB75B; color: white;}
			.btn-default.btn-up.active{background-color: #85c1e9; color: white;}
			.btn-default.btn-down.active{background-color: #f3bf6c; color: white;}
</style>	
</head>

	<body class="navbar-top pace-done">

	<!-- Main navbar -->
		<!-------------------------------------------------------------- Navbar sección------------------------------------------------------ -->
		<div class="navbar navbar-fixed-top navbar-inverse  navbar-xlg">
			<div class="navbar-header">

				<div class="cut-logo"></div>
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
							<li><a href="../perfil.php"><i class="icon-user-plus"></i> Mi perfil</a></li>
							<li><a href="../alerts.php"><span class="badge bg-blue pull-right"><?php echo "10";?></span> <i class="icon-comment-discussion"></i> Alertas</a></li>
							<li class="divider"></li>
							<li><a href="../../../../../cerrar_session.php"><i class="icon-switch2"></i> Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<!-- Page container -->
		<div class="page-container">
			<!-- Page content -->
			<div class="page-content">
				<div class="sidebar sidebar-main sidebar-fixed bg-slate-600">
					<div class="sidebar-content">
						<!-- Main navigation -->
						<div class="sidebar-category sidebar-category-visible">
							<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
									<!-- Main -->
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
									<!--<li><a href="./resumen.php"><i class="icon-home"></i> <span>Resumen de Seguros</span></a></li>

									<li><a href="./4.php"><i class="icon-list-unordered"></i> <span>Convenios</span></a></li>-->
									<!-- /main -->
								</ul>
							</div>
						</div>
						<!-- /main navigation -->
					</div>
				</div>
				<!-- Contenedor principal -->
				<div class="content-wrapper w-home">
					<!-- Content area -->
					<div class="content">
						<form role="form" id="formul" name="formul" class="form" method="post" action="" enctype="multipart/form-data">
							<div class="panel panel_Stro">
								<div class="panel-heading bg-slate-300">
									<h5 class="panel-title">Registrar Siniestro</h5>
									<div class="heading-elements">
										<ul class="icons-list">
											<li><a data-action="collapse"></a></li>	                                    	                		
										</ul>
									</div>
								</div>
								<div class="panel-body">
									<!---------------------------------------------------------->
									<!----------------------------------------------------------->
									<div class="div_total">
										<fieldset>							
											<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<span><strong style="color:black;"><h3>Formulario Ingreso de Siniestros.</h3></strong></span>
														</div>
														<hr>
													</div>
												</center>
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group ">
														<input type="hidden" name="folder" id="folder" value=""/>
														<label class="text-semibold">Ramo Afectado: </label>
														<select class="required form-control" id="idRamo" name="idRamo">											
															<option value="">SELECCIONE EL RAMO AFECTADO</option>						
														</select>
													</div> 	
												</div> 
												<div class="col-md-3">
													<div class="form-group">
														<label  class="text-semibold">Póliza afectada: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="poliza" name="poliza" size="32" placeholder="Ingrese la póliza afectada" maxlength="50" minlength="4" />
													</div>                                    									
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label  class="text-semibold">Identificación del Cliente Risks: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="idCliente" autocomplete="off" name="idCliente" size="32" placeholder="Ingrese la identificación del cliente" maxlength="15" minlength="7" />
													</div>                                    									
												</div> 
												<div class="col-md-3">
													<div class="form-group">
														<label  class="text-semibold">Nombre del Cliente Risks: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="nameCliente" name="nameCliente" size="32" placeholder="Nombre del cliente" maxlength="200" minlength="1"	/>
													</div>                                    									
												</div> 
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row">
												
												<div class="col-md-3">
													<div class="form-group">
														<label  class="text-semibold">Identificación del Asegurado: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="idAsegurado" name="idAsegurado" size="32" placeholder="Identificación del asegurado" maxlength="13" minlength="7" />
													</div>                                    									
												</div> 
												<div class="col-md-3">
													<div class="form-group">
														<label  class="text-semibold">Nombre del Asegurado: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="nameAsegurado" name="nameAsegurado" size="32" placeholder="Nombre del cliente" maxlength="200" minlength="1" />
													</div>                                    									
												</div> 
												<div class="col-md-6 html_Proyecto">
													<div class="form-group ">
														<label class="text-semibold">Proyecto Afectado: </label>
														<select class="form-control required" id="idProyecto" name="idProyecto">											
															<option value="">SELECCIONE EL PROYECTO</option>						
														</select>
													</div> 
												</div>
											</div>								
										</fieldset>	
									</div>
									<!------------------------------------------------------------->			
									<!------------------------------------------------------------->	
									<div class="div_stro">
										<fieldset>							
											<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<span><strong style="color:black;"><h3>Datos del Siniestros.</h3></strong></span>
														</div>
														<hr>
													</div>
												</center>
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group ">
														<label class="text-semibold">Departamento Siniestro: </label>
														<select class="form-control required" id="idDepartamento" name="idDepartamento">											
															<option value="">SELECCIONE EL DEPARTAMENTO</option>						
														</select>
													</div> 
												</div> 
												<div class="col-md-3">
													<div class="form-group ">
														<label class="text-semibold">Ciudad Siniestro: </label>
														<select class="form-control required" id="idCiudad" name="idCiudad">											
															<option value="">SELECCIONE LA CIUDAD</option>						
														</select>
													</div> 
												</div> 
												<div class="col-md-3 html_cumpliento">
													<div class="form-group">
														<label  class="text-semibold">Sitio del Siniestro: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="sitioStro" name="sitioStro" size="32" placeholder="Sitio del Siniestro del cliente" maxlength="200" minlength="1" />
													</div>                                    									
												</div> 
												<div class="col-md-3">
													<div class="form-group ">
														<label class="text-semibold">Estado del Siniestro: </label>
														<select class="form-control required" id="idEstado" name="idEstado">											
															<option value="">SELECCIONE ESTADO DEL SINIESTRO</option>						
														</select>
													</div> 
												</div> 
											</div> 	
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Fecha del Siniestro: </label>
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																<input type="text" class="form-control fecha-simple" name="dateStro" id="dateStro"   data-date-end-date="0d" placeholder="DD/MM/AAAA"> 
															</div>
													</div>                                   									
												</div> 
												<div class="col-xs-3 html_cumpliento">
													<label class="text-semibold">Hora del Siniestro: </label>
													<div class="form-group">
														<div class='input-group date time-simple' id='time-simple'>
															<input type='text' class="form-control" name="timeStro" id="timeStro" data-format="hh:mm:ss" />
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-time"></span>
															</span>
														</div>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Fecha de aviso presentado por el Cliente: </label>
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																<input type="text" class="form-control fecha-simple" name="dateClient" id="dateClient" data-date-end-date="0d" placeholder="DD/MM/AAAA"> 
															</div>
													</div>                                   									
												</div> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold" >Fecha de aviso a la Compañía: </label>
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																<input type="text" class="form-control fecha-simple" name="dateCompany" id="dateCompany" data-date-end-date="0d" placeholder="DD/MM/AAAA"> 
															</div>
													</div>                                   									
												</div> 
											</div> 	
										</fieldset>
										<fieldset>							
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Fecha de Documentación: </label>
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																<input type="text" class="form-control fecha-simple" name="dateDocumentation" id="dateDocumentation" data-date-end-date="0d" placeholder="DD/MM/AAAA"> 
															</div>
													</div>                                   									
												</div> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Fecha de Pago: </label>
															<div class="input-group">
																<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																<input type="text"  name="datePay" id="datePay" class="form-control fecha-simple" placeholder="DD/MM/AAAA"> 
															</div>
													</div>                                   									
												</div> 
												<div class="col-md-3 html_cumpliento">
													<div class="form-group ">
														<label class="text-semibold">Responsabilidad: </label>
														<!--<select class="select required" id="idResponsable" name="idResponsable">											
															<option value="">SELECCIONE UNA OPCION</option>						
														</select>-->
														</br>
														<div class="btn-group" id="status" data-toggle="buttons">
															<label class="btn btn-default btn-on btn-lg classSubContra" title="N" >
																<input type="radio" value="NO" name="idResponsable">NO
															</label>
															<label class="btn btn-default btn-off btn-lg classSubContra" title="Y">
																<input type="radio" value="SI" name="idResponsable">SI&nbsp;&nbsp;&nbsp;
															</label>
															</br>
															<label class="btn btn-default btn-up btn-lg active classSubContra" title="P">
																<input type="radio" value="PENDIENTE" name="idResponsable">PENDIENTE
															</label>
														</div>
													</div> 
												</div> 
												<div class="col-md-3 html_cumpliento">
													<div class="form-group ">
														<label class="text-semibold">Asumindo por: </label>
													<!--	<select class="select required" id="idAsumido" name="idAsumido">											
															<option value="">SELECCIONE UNA OPCION </option>						
														</select>-->
														</br>
														<div class="btn-group" id="status" data-toggle="buttons">
															<label class="btn btn-default btn-on btn-lg classSubContra" title="2" >
																<input type="radio" value="2" name="idAsumido">ASEGURADO
															</label>
															<label class="btn btn-default btn-off btn-lg classSubContra" title="1">
																<input type="radio" value="1" name="idAsumido">COMPAÑÍA
															</label>
															</br>
															<label class="btn btn-default btn-down btn-lg classSubContra" title="3">
																<input type="radio" value="3" name="idAsumido">TERCERO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															</label>
															<label class="btn btn-default btn-up btn-lg active classSubContra" title="4">
																<input type="radio" value="4" name="idAsumido">PENDIENTE
															</label>
															
														</div>
													</div> 
												</div>  		
											</div> 	
										</fieldset> 
										<fieldset>	
											<div class="row">      
												<div class="col-md-3">
													<div class="form-group ">
														<label class="text-semibold">Aseguradora: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="nameCompany" name="nameCompany" size="32" placeholder="Compañía de Seguros" maxlength="50" minlength="3" />
														<input type="hidden" name="idCompany" id="idCompany" value=""/>
													</div> 
												</div>    
												<div class="col-md-3">
													<div class="form-group">
														<label  class="text-semibold">Número de Stro en la Aseguradora: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="numStroCompany" name="numStroCompany" size="32" placeholder="N° En la Compañía" maxlength="200" minlength="1" />
													</div>                                    									
												</div>                      	
												<div class="col-md-3 html_cumpliento">
													<div class="form-group">
														<label class="text-semibold">Recobro: </label>
														</br>
														<div class="btn-group" id="status" data-toggle="buttons">
															<label class="btn btn-default btn-on btn-lg active" id="divRecobroN">
																<input type="radio" value="N" name="idRecobro">NO
															</label>
															<label class="btn btn-default btn-off btn-lg" id="divRecobroY">
																<input type="radio" value="Y" name="idRecobro">SI&nbsp;&nbsp;&nbsp;
															</label>
														</div>
													</div>                                        									
												</div>                                       	
												<div class="col-md-3 divRecobro">
													<div class="form-group">
														<label  class="text-semibold">Valor del Recobro: </label>
														<input type="text" class="form-control text-bold text-size-large" id="vlrecobros" name="vlrecobros" size="32" placeholder="Valor recobro" maxlength="200" minlength="1" />
													</div>                                    									
												</div>                            	                               
											</div>						
										</fieldset>
									</div>
									<!------------------------------------------------------------->			
									<!------------------------------------------------------------->	
									<div class="div_complemento">
										<fieldset>							
											<div class="row"> 
													<center>
														<div class="form-group">
															<div class="col-xs-20 text-intro3">
																<span><strong style="color:black;"><h3>Descripción y Seguimiento del Siniestro.</h3></strong></span>
															</div>
															<hr>
														</div>
													</center>
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
														<label class="text-semibold">Descripción del Siniestro: </label>
														<textarea id="some-textarea1" name="htmlDescripcion" class="form-control required textareaClass" placeholder="Enter text ..." style="width: 950px; height: 151px;"></textarea>           
														</div>                                    									
													</div>  
												</center>
											</div>
											<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<label class="text-semibold">Seguimineto del Siniestro: </label>
															<textarea id="some-textarea2" name="htmlSeguimiento" class="form-control required textareaClass" placeholder="Enter text ..." style="width: 950px; height: 151px;"></textarea>           
														</div>                                    									
													</div>  
												</center>
											</div>								
										</fieldset>
									</div>
									<!------------------------------------------------------------->			
									<!------------------------------------------------------------->			
								</div>
							</div>
							<!------------------------------------------------------------->	
							<div class="panel panel_vehiculo">
								<div class="panel-heading bg-slate-300">
									<h5 class="panel-title">Información del Vehículo y/o Equipo.</h5>
									<div class="heading-elements">
										<ul class="icons-list">
											<li><a data-action="collapse"></a></li>	                                    	                		
										</ul>
									</div>
								</div>
								<div class="panel-body">
									<div class="table-responsive div_causas">
										<fieldset>							
											<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<span><strong style="color:black;"><h3>Causas por Siniestros.</h3></strong></span>
														</div>
														<hr>
													</div>
												</center>
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Tipo: </label>
														<select id="tipo_causa" name="tipo_causa" class="seform-controllect required">
															<option value="">SELECCIONE UNA OPCIÓN</option>
															<option value="1">FACTOR HUMANO</option>
															<option value="2">VIA Y ENTORNO</option>
															<option value="3">VEHICULO</option>
														</select>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Causas: </label>
														<select id="causa" name="causa" class="form-control required">
															<option value="">SELECCIONE UNA OPCION</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="text-semibold">Control: </label>
														<select id="control" name="control" class="form-control required">
															<option value="">SELECCIONE UNA OPCION</option>
														</select>
													</div>
												</div>
											</div>								
										</fieldset>		
									</div> 
									<div class="div_vehiculo">
										<fieldset>							
											<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<span><strong style="color:black;"><h3>Información del Vehículo y/o Equipo.</h3></strong></span>
														</div>
														<hr>
													</div>
												</center>
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Placa: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="placa" name="placa" size="32" placeholder="Placa" maxlength="6" minlength="5" />
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Marca: </label>
														<input type="text" class="form-control text-bold text-size-large" id="brand" name="brand" size="32" placeholder="Marca" maxlength="50" minlength="2" />
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Color: </label>
														<input type="text" class="form-control text-bold text-size-large" id="color" name="color" size="32" placeholder="Color" maxlength="50" minlength="2" />
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Clase: </label>
														<input type="text" class="form-control text-bold text-size-large" id="class" name="class" size="32" placeholder="Clase" maxlength="50" minlength="2" />
													</div>
												</div>
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Modelo: </label>
														<input type="text" class="form-control text-bold text-size-large" id="model" name="model" size="32" placeholder="Modelo" maxlength="4" minlength="4" />
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Chasis: </label>
														<input type="text" class="form-control text-bold text-size-large" id="chassis" name="chassis" size="32" placeholder="Chasis" maxlength="50" minlength="2" />
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Motor: </label>
														<input type="text" class="form-control text-bold text-size-large" id="engine" name="engine" size="32" placeholder="Motor" maxlength="50" minlength="2" />
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Codigo interno: </label>
														<input type="text" class="form-control text-bold text-size-large" id="codInterno" name="codInterno" size="32" placeholder="Codigo interno" maxlength="50" minlength="2" />
													</div>
												</div>
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Cédula Operario/Conductor: </label>
														<input type="text" class="form-control text-bold text-size-large cldriver required" id="idDriver" name="idDriver" size="32" placeholder="Cédula" maxlength="15" minlength="5" />
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Operario/Conductor: </label>
														<input type="text" class="form-control text-bold text-size-large cldriver required" id="nameDriver" name="nameDriver" size="32" placeholder="Operario/Conductor" maxlength="50" minlength="2" />
													</div>
												</div>
												<div class="col-md-2">
													<div class="form-group">
														<label class="text-semibold">Teléfono/Conductor: </label>
														<input type="text" class="form-control text-bold text-size-large cldriver required" id="telDriver" name="telDriver" size="32" placeholder="Teléfono/Conductor" maxlength="50" minlength="2" />
													</div>
												</div>	                           	
												<div class="col-md-2">
													<div class="form-group">
														<label class="text-semibold">Presencia Tránsito: </label></br>
														<div class="btn-group" id="status" data-toggle="buttons">
															<label class="btn btn-default btn-on btn-lg active classSubContra" title="N" >
																<input type="radio" value="N" name="transitPolice" id="transitPoliceY">NO
															</label>
															<label class="btn btn-default btn-off btn-lg classSubContra" title="Y">
																<input type="radio" value="Y" name="transitPolice" id="transitPoliceN" checked="checked">SI
															</label>
														</div>
													</div>                                        									
												</div>                                       	
												<div class="col-md-2">
													<div class="form-group">
														<label class="text-semibold">Inmovilización: </label></br>
														<div class="btn-group" id="status" data-toggle="buttons">
															<label class="btn btn-default btn-on btn-lg active classSubContra" title="N" >
																<input type="radio" value="N" name="immobilization" id="immobilizationY">NO
															</label>
															<label class="btn btn-default btn-off btn-lg classSubContra" title="Y">
																<input type="radio" value="Y" name="immobilization" id="immobilizationN" checked="checked">SI
															</label>
														</div>
													</div>                                        									
												</div>                            	                               
											</div>						
										</fieldset>
										<fieldset>
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Taller de reparación: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="workRepair" name="workRepair" size="32" placeholder="Nombre Taller" maxlength="70" minlength="3" />
														<input type="hidden" name="idworkRepair" id="idworkRepair" value=""/>
													</div>
												</div>
												<!--<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Resp-taller: </label>
														<input type="text" class="form-control text-bold text-size-large" id="respWorkshop" name="respWorkshop" size="32" placeholder="Responsable Taller" maxlength="50" minlength="2" />
														<input type="hidden" name="idrespWorkshop" id="idrespWorkshop" value=""/>
													</div>
												</div>-->
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Tel-taller: </label>
														<input type="text" class="form-control text-bold text-size-large required" id="telWorkshop" name="telWorkshop" size="32" placeholder="Teléfono Taller" maxlength="10" minlength="7" />
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Fecha ingreso al taller: </label>
														<input type="text" class="form-control fecha-simple" placeholder="DD/MM/AAAA"  id="dateEntry" name="dateEntry" size="32"  maxlength="50" minlength="2" />
													</div>
												</div>		
											</div>					
										</fieldset>
									</div> 
								</div>           
							</div>					
							<div class="panel panel_amparos">
								<div class="panel-heading bg-slate-300">
									<h5 class="panel-title">Amparos afectados</h5>
									<div class="heading-elements">
										<ul class="icons-list">
											<li><a data-action="collapse"></a></li>	                                    	                		
										</ul>
									</div>
								</div>
								<div id="html_amparos">   
																				
								</div>
							</div>			
							<!------------------------------------------------------------
							<div class="panel panel_terceros">
								<div class="panel-heading bg-slate-300">
									<h5 class="panel-title">Terceros Afectados</h5>
									<div class="heading-elements">
										<ul class="icons-list">
											<li><a data-action="collapse"></a></li>	                                    	                		
										</ul>
									</div>
								</div>
								<div class="table-responsive div_causas">
										<tr>
											<th colspan="3">TIPO</th>
											<th colspan="3">NOMBRE PP</th>
											<th colspan="3">CEDULA PP</th>
										</tr>
										<tr>
											<td colspan="3">
												<select id="terceros_afectados'+cont_ter+'" name="terceros_afectados['+cont_ter+']" class="required clas_terc_a" alt="'+cont_ter+'">
													<option value="">SELECCIONE UNA OPCI&Oacute;N</option>
													<option value="2">BIENES – INMUEBLES</option>
													<option value="5">OTRO</option>
													<option value="1">PEATON</option>
													<option value="3">REDES DE SERVICIO PUBLICO</option>
													<option value="4">VEHICULO</option>
												</select>
											</td>
											<td colspan="3">
												<input type="text" size="30" id="Nombre_pp'+cont_ter+'" name="Nombre_pp['+cont_ter+']" class="required" minlength="1" maxlength="100"  />
											</td>
											<td colspan="3">
												<input type="text" size="30" id="Cedula_pp'+cont_ter+'" name="Cedula_pp['+cont_ter+']" class="required numero" minlength="7" maxlength="10"  />
											</td>
										</tr>
										<tr>
											<th colspan="3">PLACA</th>
											<th colspan="3">NOMBRE CC</th>
											<th colspan="3">CEDULA CC</th>
										</tr>
										<tr>
											<td colspan="3">
												<input type="text" size="20" id="Placas_ter'+cont_ter+'" name="Placas_ter['+cont_ter+']" class="required terc_'+cont_ter+'" minlength="3" maxlength="6"  />
											</td>
											<td colspan="3">
												<input type="text" size="30" id="Nombre_cc'+cont_ter+'" name="Nombre_cc['+cont_ter+']" class="required terc_'+cont_ter+'" minlength="1" maxlength="100"  />
											</td>
											<td colspan="3">
												<input type="text" size="30" id="Cedula_cc'+cont_ter+'" name="Cedula_cc['+cont_ter+']" class="required terc_'+cont_ter+'" minlength="3" maxlength="10"  />
											</td>
										</tr>
										<tr>
											<td colspan="9">
												<hr color="#003B77" size="4"></hr>
											</td>
										</tr>


										<fieldset>							
											<div class="row"> 
												<center>
													<div class="form-group">
														<div class="col-xs-20 text-intro3">
															<span><strong style="color:black;"><h3>Terceros Afectados.</h3></strong></span>
														</div>
														<hr>
													</div>
												</center>
											</div>								
										</fieldset>
										<fieldset>							
											<div class="row"> 
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Tipo: </label>
														<select id="tipo_causa" name="tipo_causa" class="select required">
															<option value="">SELECCIONE UNA OPCIÓN</option>
															<option value="1">FACTOR HUMANO</option>
															<option value="2">VIA Y ENTORNO</option>
															<option value="3">VEHICULO</option>
														</select>
													</div>
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label class="text-semibold">Causas: </label>
														<select id="causa" name="causa" class="select required">
															<option value="">SELECCIONE UNA OPCION</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="text-semibold">Control: </label>
														<select id="control" name="control" class="select required">
															<option value="">SELECCIONE UNA OPCION</option>
														</select>
													</div>
												</div>
											</div>								
										</fieldset>		
									</div>
							</div>-->
							<!------------------------------------------------------------->
							<div class="div_save panel-heading bg-slate-300">
								<fieldset>							
									<div class="row"> 
										<center>
											<div class="form-group">
												<div class="col-xs-20 text-intro3">
													<span><strong style="color:fff;"><h4>Debe registrar toda la información para poder cargar los documentos que validarán su preinscripción a la plataforma.</h4></strong></span>
												</div>                                    									
											</div>  
										</center>
									</div>								
								</fieldset>		
								<fieldset>							
									<div class="row"> 
										<center>
											<div class="form-group">
												<div class="col-xs-20 text-intro3">
													<input name="url_save_registro" id="url_save_registro" type="hidden" value="./inserts/insert_stro.php"/>
													<button type="submit" class="btn btn-success">Guardar<i class="glyphicon glyphicon-floppy-disk position-right"></i></button>              
												</div>                                    									
											</div>  
										</center>
									</div>								
								</fieldset>
							</div>
						</form>
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
	<script>

		$(".textareaClass").uniform({
				});
		// Selector de fecha --------------------------------------------
		$('.fecha-simple').datepicker({
			format: 'dd/mm/yyyy',
			clearBtn: true,
		});
		
		$(function () {
			$('#time-simple').datetimepicker({
				format: 'HH:mm'
			});
		});

		// Funciones para checkbox --------------------------------------------------			
		$(".activar-campos").bootstrapSwitch();

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
			
			
			
		// Funciones para los selects ----------------------------------------------
				
				$('.dataTables_length select').select2({
					minimumResultsForSearch: Infinity,
					width: 'auto'
				});
				
				$('.select').select2({
					minimumResultsForSearch: Infinity,							
					containerCssClass: ''
				});
				
		// Funciones para sliderbar ------------------------------------------------	

				
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
				
		// Funciones para checkbox -------------------------------------------------			
				$(".activar-campos").bootstrapSwitch();

			
			
		
	</script>
	</body>
</html>
