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
			require '../clases/Db.class.php';
			require '../clases/Conf.class.php';
			$bd=Db::getInstance();
	//===========================================================
			//------------------Consulta Estilos----------------------------
			$sql2 = "SELECT `IdUsuario`, `NitSolicitante`, `Nombre`, `Tipo`, `Nit_Cli`, `sql_cump`,`color_up`, `color_down`, `Estado` FROM `usuariosxcliente` WHERE `IdUsuario` ='".$Id."'";
			$stmt2=$bd->ejecutar($sql2);
			$rowcc2=$bd->obtener_fila($stmt2,0);
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
        <script>
						$(document).ready(function()
						{
							/*4*/$("#nombre_usuario").load('../nombre_usuario_conectado/usuario_online_cliente.php');

								function getUrlVars()
								{
									var vars = [], hash;
									var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
									for(var i = 0; i < hashes.length; i++)
									{
										hash = hashes[i].split('=');
										vars.push(hash[0]);
										vars[hash[0]] = hash[1];
									}
									return vars;
								}

									var data = getUrlVars()["data"];
									var placa = getUrlVars()["data"];
									var type = getUrlVars()["type"];
									$("#data").val(data);
									$("#type").val(type);
									var url_search = $("#url_search").val();
								//---------------------------------------------------------------------------
									$.post
									(
										url_search,{ "data": data },
										function(j)
										{
											var data= jQuery.parseJSON(j);
											for (property in data)
											{
												var value = data[property];
												$("#"+property).val(value);
											}
											$("#html_files").html();
										}

									);
								//---------------------------------------------------------------------------
									$(".form").delegate(".eliminar_unico","click",function()
									{	
										var url = $(this).attr('alt');
										var name = $(this).attr('id');
										
										var rpta = confirm("¿Seguro que desea eliminar este Archivo? ");
											if(rpta)
											{
												$.post("./delete_file.php", { "url": url, "placa": placa, "name": name  }, 
												function(data) {
																	$('#capa2').html(data);
																});
											}
											else {
												window.location = "car_view.php?data="+placa;
											}
										
									});	
								//---------------------------------------------------------------------------
						});

		</script>
<style type="text/css">


		.navbar-xlg {
			background-color:#<?php echo $rowcc2['color_up']; ?>;
		}

		.navbar-xlg:before {
			background-image: url(assets/images/banner-risks.jpg);
			background-position: 0 100%;
		}

		.navbar-xlg .navbar-header {
			background: #fff url(assets/images/logos/<?php echo $rowcc2['Nit_Cli']; ?>.png) no-repeat center center;
			background-size: contain;
		}

		.sidebar-content{
			background:#<?php echo $rowcc2['color_down']; ?>;
		}





		</style>
		<style>

        .card-box {
            padding: 20px;
            border-radius: 3px;
            margin-bottom: 30px;
            background-color: #fff;
        }

        .file-man-box {
            padding: 20px;
            border: 1px solid #e3eaef;
            border-radius: 5px;
            position: relative;
            margin-bottom: 20px
        }

        .file-man-box .file-close {
            color: #f1556c;
            position: absolute;
            line-height: 24px;
            font-size: 24px;
            right: 10px;
            top: 10px;
            visibility: hidden
        }

        .file-man-box .file-img-box {
            line-height: 120px;
            text-align: center
        }

        .file-man-box .file-img-box img {
            height: 64px
        }

        .file-man-box .file-download {
            font-size: 32px;
            color: #98a6ad;
            position: absolute;
            right: 10px
        }

        .file-man-box .file-download:hover {
            color: #313a46
        }

        .file-man-box .file-man-title {
            padding-right: 25px
        }

        .file-man-box:hover {
            -webkit-box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02);
            box-shadow: 0 0 24px 0 rgba(0, 0, 0, .06), 0 1px 0 0 rgba(0, 0, 0, .02)
        }

        .file-man-box:hover .file-close {
            visibility: visible
        }

        .text-overflow {
            text-overflow: ellipsis;
            white-space: nowrap;
            display: block;
            width: 100%;
            overflow: hidden;
        }

        h5 {
            font-size: 15px;
        }
        /* estilos para la tabla */

        table {
            border-collapse: collapse
        }

        caption {
            padding-top: .75rem;
            padding-bottom: .75rem;
            color: #6c757d;
            text-align: left;
            caption-side: bottom
        }
        /* inicio de las media queri para el contenedor */

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width:576px) {
            .container {
                max-width: 540px
            }
        }

        @media (min-width:768px) {
            .container {
                max-width: 720px
            }
        }

        @media (min-width:992px) {
            .container {
                max-width: 960px
            }
        }

        @media (min-width:1200px) {
            .container {
                max-width: 1140px
            }
        }

        .container-fluid {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto
        }
        /* inicio de las media queri para el contenedor */

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529
        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6
        }

        .table-sm td,
        .table-sm th {
            padding: .3rem
        }

        .table-bordered {
            border: 1px solid #dee2e6
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6
        }

        .table-bordered thead td,
        .table-bordered thead th {
            border-bottom-width: 2px
        }

        .table-borderless tbody+tbody,
        .table-borderless td,
        .table-borderless th,
        .table-borderless thead th {
            border: 0
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, .05)
        }

        .table-hover tbody tr:hover {
            color: #212529;
            background-color: rgba(0, 0, 0, .075)
        }

        .table-primary,
        .table-primary>td,
        .table-primary>th {
            background-color: #b8daff
        }

        .table-primary tbody+tbody,
        .table-primary td,
        .table-primary th,
        .table-primary thead th {
            border-color: #7abaff
        }

        .table-hover .table-primary:hover {
            background-color: #9fcdff
        }

        .table-hover .table-primary:hover>td,
        .table-hover .table-primary:hover>th {
            background-color: #9fcdff
        }

        .table-secondary,
        .table-secondary>td,
        .table-secondary>th {
            background-color: #d6d8db
        }

        .table-secondary tbody+tbody,
        .table-secondary td,
        .table-secondary th,
        .table-secondary thead th {
            border-color: #b3b7bb
        }

        .table-hover .table-secondary:hover {
            background-color: #c8cbcf
        }

        .table-hover .table-secondary:hover>td,
        .table-hover .table-secondary:hover>th {
            background-color: #c8cbcf
        }

        .table-success,
        .table-success>td,
        .table-success>th {
            background-color: #c3e6cb
        }

        .table-success tbody+tbody,
        .table-success td,
        .table-success th,
        .table-success thead th {
            border-color: #8fd19e
        }

        .table-hover .table-success:hover {
            background-color: #b1dfbb
        }

        @media (max-width:575.98px) {
            .table-responsive-sm {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
            .table-responsive-sm>.table-bordered {
                border: 0
            }
        }

        @media (max-width:767.98px) {
            .table-responsive-md {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
            .table-responsive-md>.table-bordered {
                border: 0
            }
        }

        @media (max-width:991.98px) {
            .table-responsive-lg {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
            .table-responsive-lg>.table-bordered {
                border: 0
            }
        }

        @media (max-width:1199.98px) {
            .table-responsive-xl {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch
            }
            .table-responsive-xl>.table-bordered {
                border: 0
            }
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch
        }

        .table-responsive>.table-bordered {
            border: 0
        }
        /*# sourceMappingURL=bootstrap.min.css.map */
        /* fin nuevo estilo */
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
			<center>
				<ul class="nav navbar-nav navbar-justified">
					<div class="col-xs-12 text-intro3">
					</div>
				</ul>
			</center>
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
							<li><a href="../../../cerrar_session.php"><i class="icon-switch2"></i> Salir</a></li>
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
								<li class="navigation-header"><span>MENÚ</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="./"><i class="icon-home4"></i> <span>Inicio</span></a></li>
								<li>
									<a href="#"><i class="icon-car"></i> <span>Control Parque Automotor</span></a>
									<ul>
										<li><a href="./car.php">Control Veh&iacute;culo</a></li>
										<li><a href="./driver.php">Control Conductor</a></li>
										<li><a href="./affiliated.php">Control Afiliado</a></li>
									</ul>
								</li>
								<li><a href="./cumplimiento.php"><i class="icon-stack"></i> <span>Cumplimiento</span></a></li>
								<li><a href="./siniestros.php"><i class="icon-exclamation"></i> <span>Control Siniestros</span></a></li>
								<li><a target="_blank" href="https://www.risks.com.co/resumen_seguros/web/viewer.html?file=uploads/<?php echo $rowcc2['NitSolicitante'];?>/RESUMEN-DE-SEGUROS-2018-2019.pdf#pagemode=bookmarks&zoom=page-fit"><i class="icon-list"></i> <span>Resumen de Seguros</span></a></li>
								
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
							<h5 class="panel-title"><?php echo $_GET['data'];?></h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							<form role="form" id="formul" name="formul" class="form" method="post" action="" enctype="multipart/form-data">
								<input type="hidden" name="url_search" id="url_search" value="./search/search_car.php"/>
								<input type="hidden" name="data" id="data" value=""/>
								<input type="hidden" name="type" id="type" value=""/>
							<div class="div_total">
								</br>
								<fieldset>
									<div class="row">

									</div>
								</fieldset>
								<fieldset>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label  class="text-semibold">Placa: </label>
												<input type="text" class="form-control text-bold text-size-large required" id="Placas" name="Placas" size="32" onkeypress="return handleEnter(this, event)"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-semibold">Tipo Veh&iacute;culo: </label>
												<input type="text" class="form-control text-bold text-size-large required" id="TipoVehicu" name="TipoVehicu" size="32" onkeypress="return handleEnter(this, event)"/>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset class="div_repre">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-semibold">Color: </label>
												<input type="text" class="form-control text-bold text-size-large required" id="Color" name="Color" size="32" onkeypress="return handleEnter(this, event)"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-semibold">Modelo: </label>
												<input type="text" class="form-control text-bold text-size-large required" id="Modelo" name="Modelo" size="32" onkeypress="return handleEnter(this, event)"/>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-semibold">Marca:</label>
												<input type="hidden" id="idDepartamento" name="idDepartamento"/>
												<input type="text" class="form-control text-bold text-size-large required" id="MarcaVehicu" name="MarcaVehicu" size="32" onkeypress="return handleEnter(this, event)"/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label  class="text-semibold">Motor:</label>
												<input type="hidden" id="idCiudad" name="idCiudad"/>
												<input type="text" class="form-control text-bold text-size-large required" id="Motor" name="Motor" size="32" onkeypress="return handleEnter(this, event)"/>
											</div>
										</div>
									</div>
								</fieldset>
								<fieldset>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-semibold">Chasis: </label>
												<input type="text" class="form-control text-bold text-size-large required numero" id="Chasis" name="Chasis" size="32" onkeypress="return handleEnter(this, event)"/>
											</div>
										</div>
									</div>
								</fieldset>

							</div>

							</form>
						</div>
					</div>
					<div class="panel">
						<div class="panel-heading bg-slate-300">
							<h5 class="panel-title">Files</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
						</div>
						<div class="panel-body">
							<form role="form" id="formul" name="formul" class="form" method="post" action="" enctype="multipart/form-data">
								<div class="div_tablas" id="DIV_TABLA1">
										<!------------------------------------------------------------------------------------------->
										<div class="content">
											 <div class="container">
															 <div class="col-12">
																			 <div class="row">
																					 <div class="col-lg-12 col-xl-12">
																							 <h4 class="header-title m-b-30 text-center">ARCHIVOS DEL VEH&Iacute;CULO DE PLACAS <?php echo $_GET['data'];?></h4>
																					 </div>
																			 </div>

																			 <div class="container">
																					 <div class="col-12">
																							 <div class="row">

																								 	<?php
																											
																											$gestor1 = "../../../Autos/".$_GET['data']."/".date('Y')."/POLIZA/";
																												if (count(scandir($gestor1))>2)
																												{
																													$nombre_carpeta = "../../../Autos/".$_GET['data']."/".date('Y')."/POLIZA/";
																													if ($gestor = opendir($nombre_carpeta))
																													{
																														while (false !== ($arch = readdir($gestor)))
																														{
																															if ($arch != "." && $arch != "..")
																															{
																																$link = $nombre_carpeta."/".$arch;


																									?>
																																		 <div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 col-xl-2">
																																				 <div class="file-man-box">
																																						 <div class="file-img-box">
																																								<a target="_blank" class="iframe" href="<?php echo $link;?>" class"linkli">
																																							 	<img src="../../imagenes/png/pdf-icon.png" alt="icon">
																																							</div>
																																						<a href="#" class="file-download">
																																							 <i class=""></i>
																																						 </a>
																																						 <div class="file-man-title">
																																								 <h5 class="mb-0 text-overflow"><?php echo $arch; ?></h5>
																																						 </div>
																																				 </div>
																																		 </div>

																									<?php
																															}
																														}
																														closedir($gestor);
																													}
																												}
																												else
																												{
																													$fecha_actual = date("Y");
																																$ano = date("Y",strtotime($fecha_actual."- 1 year"));
																																$gestor1 = "../../../Autos/".$_GET['data']."/".$ano."/POLIZA/";
																																	if (count(scandir($gestor1))>2)
																																	{
																																		$nombre_carpeta = "../../../Autos/".$_GET['data']."/".$ano."/POLIZA/";
																																		if ($gestor = opendir($nombre_carpeta))
																																		{
																																			while (false !== ($arch = readdir($gestor)))
																																			{
																																				if ($arch != "." && $arch != "..")
																																				{
																																					$link = $nombre_carpeta."/".$arch;
					
					
																														?>
																																							<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 col-xl-2">
																																									<div class="file-man-box">
																																											<div class="file-img-box">
																																													<a target="_blank" class="iframe" href="<?php echo $link;?>" class"linkli">
																																													<img src="../../imagenes/png/pdf-icon.png" alt="icon">
																																												</div>
																																											<a href="#" class="file-download">
																																												<i class=""></i>
																																											</a>
																																											<div class="file-man-title">
																																													<h5 class="mb-0 text-overflow"><?php echo $arch; ?></h5>
																																											</div>
																																									</div>
																																							</div>
					
																														<?php
																																				}
					
																																			}
																																			closedir($gestor);
																																		}
																																	}
																												}
																												
																												
																											
																											$sql1 = "SELECT `id`, `folder`, `name`, `tipe`, `multiple`, `vencimiento`, `nit_cliente`, `estado`  FROM `upload_files_car` WHERE `estado`= 'A' AND (`nit_cliente` = '".$rowcc2['NitSolicitante']."' or `nit_cliente` = '900.171.792-2')   ORDER BY `upload_files_car`.`vencimiento` DESC";
																											$stmt1=$bd->ejecutar($sql1);
																											while($rowcc1=$bd->obtener_fila($stmt1,0))
																											{
																												$cadena_de_texto = $rowcc1['name'];
																												$posicion_coincidencia = strpos($cadena_de_texto, 'FOTO');
																												if($posicion_coincidencia === false)
																												{
																														$url = '../../imagenes/png/pdf-icon.png';

																												}
																												else {
																														$url = '../../imagenes/png/jpg-icon.png';
																												}

																												$gestor1 = "../../../Autos/".$_GET['data']."/VEHICULO/".$rowcc1['folder']."/";
																												if (count(scandir($gestor1))>2)
																												{
																													$nombre_carpeta = "../../../Autos/".$_GET['data']."/VEHICULO/".$rowcc1['folder']."/";
																													if ($gestor = opendir($nombre_carpeta))
																													{
																														while (false !== ($arch = readdir($gestor)))
																														{
																															if ($arch != "." && $arch != "..")
																															{
																																$link = $nombre_carpeta."/".$arch;


																									?>
																																<div class="col-xs-12 col-sm-12 col-md-2 col-lg-3 col-xl-2">
																																	<div class="file-man-box"><a href="" class="file-close"><i class="eliminar_unico glyphicon glyphicon-trash" alt="<?php echo $link;?>" id="<?php echo $arch;?>"></i></a>
																																		<div class="file-img-box">
																																			<a target="_blank" class="iframe" href="<?php echo $link;?>" class"linkli">
																																			<img src="<?php echo  $url; ?>" alt="icon">
																																		</div>
																																		<a href="#" class="file-download">
																																			<i class=""></i>
																																		</a>
																																		<div class="file-man-title">
																																				<!--<h5 class="mb-0 text-overflow"><?php echo $rowcc1['name'].': '.$arch; ?></h5>-->
																																				<h5 class="mb-0 text-overflow"><?php echo $arch; ?></h5>
																																				<?php
																																					if($rowcc1['vencimiento'] == 'Y')
																																					{
																																						$type=$rowcc1['tipe'];
																																						$sql = "SELECT ".$type." FROM `expiry_car` WHERE `placaVehiculo` = '".$_GET['data']."'";
																																						$stmt=$bd->ejecutar($sql);
																																						$row=$bd->obtener_fila($stmt,0);
																																					//===============================================================================================
																																						if($row[$type] >= date("Y-m-d")){
																																							$color = "#639F0D";																																		
																																						}
																																						else{
																																							$color = "#9F0D0D";
																																						}
																																					//===============================================================================================


																																				?>
																																					<p class="mb-0"><small>Vencimiento: <span style="color: <?php echo $color;?>; font-size: 12pt;"><strong><?php echo $row[$type]; ?></strong></span></small></p>
																																				<?php
																																					}
																																				?>
																																		</div>
																																	</div>
																																</div>

																									<?php
																															}

																														}
																														closedir($gestor);
																													}
																												}
																											}
																											
																									?>
																							 </div>
																					 </div>
																			 </div>
															 </div>

													 <!-- end col -->
											 </div>
											 <!-- end row -->
									 </div>
									 <!-- container -->
									 </div>

					<!------------------------------------------------------------------------------------------->
								</div>
								</br>
							</form>
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
                            	<a  href="https://www.risks.com.co/" target="_blank"><img src="../assets/images/logo-risks.png" alt=""></a>
							&copy; | <em>Su departamento de seguros</em> </div>

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
                                            <li><a href="https://www.risks.com.co/" title="Sitio web" target="_blank"><i class="icon-sphere"></i> www.risks.com.co</a></li>
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

						request.open('post', 'upload_file.php');
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
