
<?php
	//==================================================================
		error_reporting(0);
		session_start();
		if ($_SESSION['sivig']!= 'si' )
		{
			header("Location: ../../../../");
		}
		$Id= $_SESSION['Id'];
	//===================================================================
		require '../clases/Db.class.php';
		require '../clases/Conf.class.php';
		$bd=Db::getInstance();
	//===================================================================
		$sql2 = "SELECT `IdUsuario`, `NitSolicitante`, `Nombre`, `Tipo`, `Nit_Cli`, `sql_cump`,`color_up`, `color_down`, `Estado` FROM `usuariosxcliente` WHERE `IdUsuario` ='".$Id."'";
		$stmt2=$bd->ejecutar($sql2);
		$rowcc2=$bd->obtener_fila($stmt2,0);
	//===================================================================
		$today = date("Y-m-d");
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
				<div class="panel panel-default">
						<div class="panel-heading">
							<h5 class="panel-title">Alertas</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
	                	</div>
	                	<div class="panel-body">
							Alertas de todos los documentos vencidos y próximos a vencer
	                	</div>
						<div class="table-responsive">
							<table class="table tabla-resultados table-bordered table-hover table-striped">

							<thead bgcolor="#aaaaaa">
								<tr>
									<th>VIEW</th>
									<th>TYPE</th>
									<th>NAME-ITEM</th>
									<th>DATE</th>
								</tr>
							</thead>
							<tbody bgcolor="#bbcbd6">
							<?php
							 	$sql1 = "SELECT `placaVehiculo`, `estado`, `fecUpdate`,`tecnoVehiculo`, `toVehiculo`, `soatVehiculo` FROM `expiry_car` WHERE  `tecnoVehiculo` <= '".$today."' AND `NitSolicitante` = '".$rowcc2['NitSolicitante']."'";
								$stmt1=$bd->ejecutar($sql1);
								while($rowcc1=$bd->obtener_fila($stmt1,0))
								{
									$html .= '<tr class="gradeA">
												<td>
													<a target="_blank" style="color: #000;" href="./car_view.php?data='.$rowcc1['placaVehiculo'].'&type=1">
														<i class="glyphicon glyphicon-eye-open" style="font-size:30px;color:#1f286d"></i>
													</a>
												</td>
												<td>'.strtoupper($rowcc1['placaVehiculo']).'</td>
												<td>TECNOMECANICA</td>
												<td  bgcolor="#e58d8d"><strong>'.strtoupper($rowcc1['tecnoVehiculo']).'</strong></td>
											</tr>';
								}
								$sql2 = "SELECT `placaVehiculo`, `estado`, `fecUpdate`,`tecnoVehiculo`, `toVehiculo`, `soatVehiculo` FROM `expiry_car` WHERE  `toVehiculo` <= '".$today."' AND `NitSolicitante` = '".$rowcc2['NitSolicitante']."'";
								$stmt2=$bd->ejecutar($sql2);
								while($rowcc2=$bd->obtener_fila($stmt2,0))
								{
									$html .= '<tr class="gradeA">
												<td>
													<a target="_blank" style="color: #000;" href="./car_view.php?data='.$rowcc2['placaVehiculo'].'&type=1">
														<i class="glyphicon glyphicon-eye-open" style="font-size:30px;color:#1f286d"></i>
													</a>
												</td>
												<td>'.strtoupper($rowcc2['placaVehiculo']).'</td>
												<td>TARJETA DE OPERACIÓN</td>
												<td bgcolor="#e58d8d"><strong>'.strtoupper($rowcc2['toVehiculo']).'</strong></td>
											</tr>';
								}
								$sql3 = "SELECT `placaVehiculo`, `estado`, `fecUpdate`,`tecnoVehiculo`, `toVehiculo`, `soatVehiculo` FROM `expiry_car` WHERE  `soatVehiculo`<= '".$today."' AND `NitSolicitante` = '".$rowcc2['NitSolicitante']."'";
								$stmt3=$bd->ejecutar($sql3);
								while($rowcc3=$bd->obtener_fila($stmt3,0))
								{
									$html .= '<tr class="gradeA">
												<td>
													<a target="_blank" style="color: #000;" href="./car_view.php?data='.$rowcc3['placaVehiculo'].'&type=1">
														<i class="glyphicon glyphicon-eye-open" style="font-size:30px;color:#1f286d"></i>
													</a>
												</td>
												<td>'.strtoupper($rowcc3['placaVehiculo']).'</td>
												<td>SOAT</td>
												<td bgcolor="#e58d8d"><strong>'.strtoupper($rowcc3['soatVehiculo']).'</strong></td>
											</tr>';
								}
								
								echo $html;

							?>
							</tbody>
							<tfoot>
								<tr>
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
                            	<a  href="https://www.risks.com.co/" target="_blank"><img src="assets/images/logo-risks.png" alt=""></a>
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
											<li><a href="mailto:contacto@risks.com.co" title="Escribanos sus dudas"><i class="icon-mail5"></i> contacto@risks.com.co</a></li>
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
