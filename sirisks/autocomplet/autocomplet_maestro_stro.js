	$(document).ready(function()
	{
	//----------------Autocompletado Asegurado-----------------	
		$("#nombreCliente").autocomplete(
		{
			source: "./busquedas/search_asegurado_stro_auto.php",  				
			minLength: 1,									
			select: productoSeleccionado,	
			focus: productoMarcado
		});
	//----------------Autocompletado Placa-----------------	
		$("#placa").autocomplete(
		{
			source: "./busquedas/search_vehiculo_stro.php", 				
			minLength: 1,									
			select: productoSeleccionado3,	
			focus: productoMarcado3
		});
	//----------------Autocompletado Poliza-----------------	
		$("#poliza").autocomplete(
		{
			source: "./busquedas/search_poliza_auto.php", 				
			minLength: 1,									
			select: productoSeleccionado6,	
			focus: productoMarcado6
		});	
	//----------------Autocompletado Conductor-----------------
		$("#Conductor").autocomplete(
		{
			source: "../busquedas/busqueda_conductor.php", 				
			minLength: 1,									
			select: productoSeleccionado7,	
			focus: productoMarcado7
		});
	//-----------------Autocompletado Asegurado X Proyecto-----
		$("#proyNombreCliente").autocomplete(
		{
			source: "./busquedas/search_asegurado_stro_auto.php", 				
			minLength: 1,									
			select: productoSeleccionado8,	
			focus: productoMarcado8
		});
	//-----------------Autocompletado Asegurado X Proyecto-----
		$("#nomConductor").autocomplete(
		{
			source: "./busquedas/search_conductor_stro_auto.php", 				
			minLength: 1,									
			select: productoSeleccionado9,	
			focus: productoMarcado9
		});
	//-----------------Autocompletado Asegurado X Proyecto-----
		$("#consecutivo").autocomplete(
		{
			source: "./busquedas/search_consecutivo_stro.php", 				
			minLength: 1,									
			select: productoSeleccionado10,	
			focus: productoMarcado10
		});
	});
	//=================================================================
		function productoMarcado(event, ui)
		{
			var producto = ui.item.value;
			$("#nombreCliente").val(producto.valor);
			event.preventDefault();
		}
		function productoSeleccionado(event, ui)
		{
			var producto = ui.item.value;
			$("#idCliente").val(producto.valor);
			event.preventDefault();
			$('#nombreCliente').val(producto.nom);
		}
	//=================================================================
		function productoMarcado3(event, ui) 
		{
			var producto = ui.item.value;
			$("#placa").val(producto.descripcion);
			event.preventDefault();
		}
		function productoSeleccionado3(event, ui)
		{
			var producto = ui.item.value;
			$("#placa").val(producto.descripcion);
			event.preventDefault();
		}	
	
	//=================================================================
		function productoMarcado6(event, ui)
		{
			var producto = ui.item.value;
			$("#poliza").val(producto.descripcion);
			event.preventDefault();
		}
		function productoSeleccionado6(event, ui)
		{
			var producto = ui.item.value;
			$("#poliza").val(producto.valor);
			event.preventDefault();						
		}		
	//=================================================================
		function productoMarcado7(event, ui)
		{
			var producto = ui.item.value;
			$("#Cedula").val(producto.descripcion);
			event.preventDefault();
		}
		function productoSeleccionado7(event, ui)
		{
			var producto = ui.item.value;
			$("#Cedula").val(producto.valor);
			event.preventDefault();
			$('#Conductor').val(producto.nom);
			$('#telConductor').val(producto.telConductor);
		}
	//==================================================================
		function productoMarcado8(event, ui)
		{
			var producto = ui.item.value;
			$("#proyNombreCliente").val(producto.valor);
			event.preventDefault();
		}
		function productoSeleccionado8(event, ui)
		{
			var producto = ui.item.value;
			$("#proyIdCliente").val(producto.valor);
			event.preventDefault();
			$('#proyNombreCliente').val(producto.nom);
			//-----------------------------------------------------------
			var nitAsegurado = $("#proyIdCliente").val();
			$.post("../select/select_proyecto.php",{"nitAsegurado": nitAsegurado }, 
			function(data) 
			{
				$("#idProyecto").html(data);
			});
		}
	//==================================================================
		function productoMarcado9(event, ui)
		{
			var producto = ui.item.value;
			$("#nomConductor").val(producto.valor);
			event.preventDefault();
		}
		function productoSeleccionado9(event, ui)
		{
			var producto = ui.item.value;
			$("#idConductor").val(producto.valor);
			event.preventDefault();
			$('#nomConductor').val(producto.nom);
		}
	//==================================================================
		function productoMarcado10(event, ui)
		{
			var producto = ui.item.value;
			$("#consecutivo").val(producto.valor);
			event.preventDefault();
		}
		function productoSeleccionado10(event, ui)
		{
			var producto = ui.item.value;
			$("#consecutivo").val(producto.valor);
			event.preventDefault();
		}