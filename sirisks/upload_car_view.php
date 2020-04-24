<?php
	//===========================================================
		error_reporting(0);
		session_start();
		if ($_SESSION['sivig']!= 'si' )
		{
			header("Location: ../../../../");
		}
		$Id= $_SESSION['Id'];
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
		<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

        <!-- para elejir la fecha -->
		<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
        <script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>

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
        <script>
			$(document).ready(function()
			{
				/*4*/$("#nombre_usuario").load('../nombre_usuario_conectado/usuario_online_cliente.php');
			});
		</script>
</head>

<body class="navbar-top pace-done">

<style type="text/css">

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


</style>
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
                        <li><a href="../perfil.php"><i class="icon-user-plus"></i> Mi perfil</a></li>
                        <li><a href="../alerts.php"><span class="badge bg-blue pull-right"><?php echo "10";?></span> <i class="icon-comment-discussion"></i> Alertas</a></li>
                        <li class="divider"></li>
                        <li><a href="../cerrar_session.php"><i class="icon-switch2"></i> Salir</a></li>
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
								<!-- Main -->
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

								<!--<li><a href="./4.php"><i class="icon-list-unordered"></i> <span>Convenios</span></a></li>-->
								<!-- /main -->
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
				<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title"><?php echo $_GET['Placas'];?></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
	                	</div>
	                	<div class="panel-body">
											<button class="btn btn-sm btn-primary upload-all">Upload All</button>	Nota: puede cargar cada archivo individualmente o realizar la carga total de todos los documentos desde el botón Upload All.

	                	</div>
						<div class="table-responsive">
						<div class="panel-body padre" id="html_form">
			<!-------------------------------------->


						<div class="panel-body" id="html_files">
							<?php
							//---------------------------------------------------------------------------------
								$sql2 = "SELECT * FROM `usuariosxcliente` WHERE `IdUsuario` ='".$Id."'";
								$stmt2=$bd->ejecutar($sql2);
								$rowcc2=$bd->obtener_fila($stmt2,0);
							//-----------------------------------------------------------------

								$cont = 0;
								$contotal = 0;
								$html_inic = '<div class="row">';
								$html_fin = '</div>';
								$icon1 = 'icon-file-text2 text-success-400 icon-2x no-edge-top mt-5';
								$icon2 = 'icon-file-pdf text-warning-400 icon-2x no-edge-top mt-5';
								$icon3 = 'icon-images2 text-primary icon-2x no-edge-top mt-5';
								$sql1 = "SELECT `id`, `folder`, `name`, `multiple`, `vencimiento`, `nit_cliente`, `estado` FROM `upload_files_car` WHERE `estado`= 'A' AND `nit_cliente` = '900.171.792-2'   ORDER BY `upload_files_car`.`vencimiento` DESC";
								$stmt1=$bd->ejecutar($sql1);
								while($rowcc1=$bd->obtener_fila($stmt1,0))
								{
									$cont ++;
								/*	if($cont == 1)
									{
										//echo $html_inic;
										$htmlicon = $icon3;
									}
									if($cont == 2)
									{
										$htmlicon = $icon2;
									}
									if($cont == 3)
									{
										$htmlicon = $icon3;
									}*/
									//------------------------------------------------------------------

							 	$cadena_de_texto = $rowcc1['name'];
								$posicion_coincidencia = strpos($cadena_de_texto, 'FOTO');
								if($posicion_coincidencia === false)
								{
									$htmlicon = $icon2;
								}
								else {
										$htmlicon = $icon3;
								}

								if($rowcc1['multiple'] == 'Y'){
									$multiple = 'multiple';
									$addmultiple = '[]';
									$valmultiple = 'Y';
								}
								else {
									$multiple = '';
									$addmultiple = '';
									$valmultiple = 'N';
								}


							?>
								<div class="col-md-4">
									<div class="panel panel-body">
										<div class="media">
											<div class="media-left">
												<i class="<?php echo  $htmlicon; ?>"></i>
											</div>
											<div class="media-body">
												<h6 class="media-heading text-semibold">
													<a href="#" class="text-default"><?php echo $contotal.': '.$rowcc1['name']; ?></a>
												</h6>
												<form action="#">
													<div class="form-group">
														<input type="hidden" name="folder" id="folder" value="<?php echo $rowcc1['folder'];?>"/>
														<input type="hidden" name="typefolder" id="typefolder" value="<?php echo $valmultiple;?>"/>
														<input type="hidden" name="placa" id="placa" value="<?php echo $_GET['Placas'];?>"/>
															<input type="file"  name="image<?php echo $addmultiple;?>" class="file-styled" <?php echo $multiple;?>>
														  	<?php
														  		if($rowcc1['vencimiento'] == 'Y')
														  		{
														  	?>
															  	<label>Fecha: </label>
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																		<input type="text" class="form-control fecha-simple" value="" name="fecha_<?php echo $rowcc1['id'];?>" id="fecha_<?php echo $rowcc1['id'];?>"/>
																	</div>
						                   <?php
														  		}
														  	?>
															<button class="btn btn-sm btn-info upload" type="submit">Cargar</button>
															<button type="button" class="btn btn-sm btn-danger cancel">Cancel</button>
														<div class="progress progress-striped active">
															<div class="progress-bar" style="width:0%"></div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							<?php
									if($cont == 3)
									{
										echo  $html_fin;
										$cont =  0 ;
									}
									$contotal ++;
								}
							?>
						</div>
					</div>
				</div>
						</div>
					</div>

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
// Campos de archivo (Uniform)   // ------------------------------
		$(".file-styled").uniform({
			fileButtonClass: 'action btn btn-default',
			fileButtonHtml: 'Subir',
			fileDefaultHtml: 'Ningún archivo'
			});
    // Selector de fecha --------------------------------------------
    $('.daterange-basic').daterangepicker({
        startDate: "",
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


	//--------------Fecha simple----------------------------------------
	// Selector de fecha --------------------------------------------
    $('.fecha-simple').daterangepicker({
		singleDatePicker: true,
		startDate: "",
        endDate: moment(),
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default',
        showDropdowns: true,
        "locale": {
            "format": "DD/MM/YYYY",
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

// Funciones para checkbox --------------------------------------------------
		$(".activar-campos").bootstrapSwitch();
</script>
<script>
			//----------------------------------------------------------------------------------------------------------------------
			//----------------------------------------------------------------------------------------------------------------------
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
			//----------------------------------------------------------------------------------------------------------------------
			//----------------------------------------------------------------------------------------------------------------------
				function uploadImage($form)
				{
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

					request.open('post', './inserts/upload_car.php');
					request.send(formdata);

					$form.on('click','.cancel',function(){
						request.abort();

						$form.find('.progress-bar')
							.addClass('progress-bar-danger')
							.removeClass('progress-bar-success')
							.html('upload aborted...');
					});
				}
			//----------------------------------------------------------------------------------------------------------------------
			//----------------------------------------------------------------------------------------------------------------------
		</script>


</body>
</html>
