
// Estos son las líneas específicas para las funcionalidades de las consultas para hidrología.html


// Propiedades de la tabla --------------------------------------------
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
				exportOptions: {
					columns: [ 0, ':visible' ]
				}
			},
			{
				extend: 'excelHtml5',
				exportOptions: {
					columns: ':visible'
				}
			},
			{
				extend: 'pdfHtml5',
				exportOptions: {
					columns: [0, 1, 2, 5]
				}
			},
			{
				extend: 'colvis',
				text: '<i class="icon-three-bars"></i> <span class="caret"></span>',
				className: 'btn-icon'
			}
		]
	},
	
	language: {
		search: 'Buscar ',					
	},
});