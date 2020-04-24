
<?php
	//==================================================================
		error_reporting(0);
		session_start();
		if ($_SESSION['sivig']!= 'si' )
		{
			header("Location: ../../login.php");
		}
		$Id= $_SESSION['Id'];
	//===================================================================
		require '../Clases/Db.class.php';
		require '../Clases/Conf.class.php';
		$bd=Db::getInstance();
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
				//------------------------------------------
				//------------------------------------------

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
				<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title">Total - Veh&iacute;culos</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
	                	</div>
	                	<div class="panel-body">
	                		En esta tabla podrá encontrar todo el parque automotor registrados en el Sistema.
	                	</div>
						<div class="table-responsive">
							<table class="table tabla-resultados table-bordered table-hover table-striped">

							<thead bgcolor="#aaaaaa">
								<tr>
									<th>VIEW</th>
									<th>UPLOAD</th>
									<th>PLACA</th>
									<th>NUM_INTERNO</th>
									<th>MARCA</th>
									<th>MODELO</th>
									<th>CLASE_VEHICULO</th>
									<th>CANT_PASAJERO</th>
									<th>SERVICIO</th>
									<th>CIRCULACION</th>
									<th>CHASIS</th>
									<th>MOTOR</th>
									<th>CILINDRAJE</th>
									<th>CARROCERIA</th>
									<th>COLOR</th>
									<th>COD_FASECOLDA</th>
								</tr>
							</thead>
							<tbody  bgcolor="#bbcbd6">
								<?php
									$sql1 = "SELECT `Placas`, `Nitsol`,`NitAse`, `NitBen`, `CodFase`, `TipoVehicu`, `ClaseVehicu`, `MarcaVehicu`,`NumInterno`, `Color`,`Modelo`, `Chasis`, `Motor`, `cilindraje`, `carroceria`, `servicio`, `Pasajero`, `circulacion` FROM `vehiculos` WHERE `Estado`  = 'A' and `Nitsol`  <> ''  ORDER BY `vehiculos`.`fechademodifi` DESC";
										$stmt1=$bd->ejecutar($sql1);
										while($rowcc1=$bd->obtener_fila($stmt1,0))
										{
									//---------------------------------------------------------------------------------
											$sql = "SELECT `Id_departamento`, `Id_Ciudad`, `Nombre`, `Estado` FROM `ciudad_colombia` WHERE `Id_Ciudad` = '".$rowcc1['circulacion']."'";
											$stmt=$bd->ejecutar($sql);
											$row=$bd->obtener_fila($stmt,0);
										//=================================================	
											if($row['Nombre'] == ''){
												$circulacion = $rowcc1['circulacion'];
											}
											else{
												$circulacion = $row['Nombre'];
											}
										//=================================================
											if($rowcc1['NumInterno'] == ''){
												$NumInterno = 'N/A';
											}
											else{
												$NumInterno = $rowcc1['NumInterno'];
											}
											
							   
								?>
									<tr class="gradeA">
										<td>
											<a target="_blank" style="color: #000;" href="./car_view.php?data=<?php echo $rowcc1['Placas']; ?>&type=1">
												<i class="glyphicon glyphicon-eye-open" style="font-size:30px;color:#1f286d"></i>
											</a>
										</td>
										<td>
											<a target="_blank" style="color: #000;" href="./upload_car_view.php?Placas=<?php echo $rowcc1['Placas']; ?>&Id=<?php echo $rowcc1['Placas']; ?>">
												<i class="glyphicon glyphicon-upload" style="font-size:30px;color:#1f286d">
												</i>
											</a>
										</td>
										<td><?php echo strtoupper($rowcc1['Placas']); ?></td>
										<td><?php echo strtoupper($NumInterno); ?></td>
										<td><?php echo strtoupper($rowcc1['MarcaVehicu']); ?></td>
										<td><?php echo strtoupper($rowcc1['Modelo']); ?></td>
										<td><?php echo strtoupper($rowcc1['ClaseVehicu']); ?></td>
										<td><?php echo strtoupper($rowcc1['Pasajero']); ?></td>
										<td><?php echo strtoupper($rowcc1['servicio']); ?></td>
										<td><?php echo strtoupper($circulacion); ?></td>
										<td><?php echo strtoupper($rowcc1['Chasis']); ?></td>
										<td><?php echo strtoupper($rowcc1['Motor']); ?></td>
										<td><?php echo strtoupper($rowcc1['cilindraje']); ?></td>
										<td><?php echo strtoupper($rowcc1['carroceria']); ?></td>
										<td><?php echo strtoupper($rowcc1['Color']); ?></td>
										<td><?php echo strtoupper($rowcc1['CodFase']); ?></td>
									</tr>
									<?php
										}
									?>
							</tbody>
							<tfoot>
								<tr>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
									<th>Buscar</th>
								</tr>
							</tfoot>

							</table>
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






    // Selector de fecha --------------------------------------------
    $('.fecha-simple').daterangepicker({
		singleDatePicker: true,
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
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior",
				},
				sInfoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
				sInfo:           "Mostrando resultados del _START_ al _END_ de un total de _TOTAL_",
				sZeroRecords:    "No se encontraron resultados",
				sEmptyTable:     "Ningun dato disponible en esta tabla",

            }
        });

        // Opciones para tabla consulta ---
         var table =  $('.tabla-resultados').DataTable({
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


	// BUSCADOR DE TABALA POR CAMPOS DE TEXTO-----------------------------------------------------------------

		// buscador por columna labels------
		$('.tabla-resultados tfoot th').each( function () {
			var title = $(this).text();
			$(this).html( '<input class="form-control" type="text" placeholder="'+title+'" />' );
		} );

	   // Código para busqueda por columna
		table.columns().every( function () {
			var that = this;

			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
						.search( this.value )
						.draw();
				}
			} );
		} );

	// BUSCADOR DE TABLA POR SELECTS-----------------------------------------------------------------

	$(document).ready(function() {
		$('.tabla-selects').DataTable( {
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );
	} );


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


</body>
</html>
