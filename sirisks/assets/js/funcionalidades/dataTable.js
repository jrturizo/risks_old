

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
      sEmptyTable:     "Ningún dato disponible en esta tabla",

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

// Funciones para los selects --------------------------------------------------

  $('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity,
    width: 'auto'
  });

  $('.select').select2({
    minimumResultsForSearch: Infinity,
    containerCssClass: ''
  });
  
