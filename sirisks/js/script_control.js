
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