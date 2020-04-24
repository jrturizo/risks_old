	$(document).ready(function()
	{
	//----------------Autocompletado Asegurado-----------------	
		$("#nitAsegurado").autocomplete(
		{
			source: "./busquedas/search_asegurado_auto.php", 				
			minLength: 1,									
			select: productoSeleccionado,	
			focus: productoMarcado
		});
	//----------------Autocompletado Placa-----------------	
		$("#Placa").autocomplete(
		{
			source: "../busquedas/search_vehiculo.php", 				
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
	//----------------Autocompletado Conductor-----------------
		$("#Cedula").autocomplete(
		{
			source: "../busquedas/busqueda_idconductor.php", 				
			minLength: 1,									
			select: productoSeleccionado8,	
			focus: productoMarcado8
		});
	//----------------Autocompletado Beneficiario-----------------
		$("#nitBeneficiario").autocomplete(
		{
			source: "./busquedas/busqueda_beneficiarior.php", 				
			minLength: 1,									
			select: productoSeleccionado9,	
			focus: productoMarcado9
		});
	//----------------Autocompletado Beneficiario-----------------
		$("#nombreBeneficiario").autocomplete(
		{
			source: "./busquedas/busqueda_beneficiarior.php", 				
			minLength: 1,									
			select: productoSeleccionado10,	
			focus: productoMarcado10
		});
	});
	//=================================================================
		function productoMarcado(event, ui)
		{
			var producto = ui.item.value;
			$("#nitAsegurado").val(producto.valor);
			event.preventDefault();
		}
		function productoSeleccionado(event, ui)
		{
			var producto = ui.item.value;
			$("#nitAsegurado").val(producto.valor);
			event.preventDefault();
			$('#nombreAsegurado').val(producto.nom);
		}
	//=================================================================
		function productoMarcado3(event, ui) 
		{
			var producto = ui.item.value;
			$("#Placa").val(producto.descripcion);
			event.preventDefault();
		}
		function productoSeleccionado3(event, ui)
		{
			var producto = ui.item.value;
			$("#Placa").val(producto.descripcion);
			event.preventDefault();
			$("#Marca").val(producto.Marca);
			$("#Tipo").val(producto.Tipo);
			$("#Clase").val(producto.Clase);
			$("#Color").val(producto.Color);
			$("#Motor").val(producto.Motor);
			$("#Chasis").val(producto.Chasis);
			$("#Modelo").val(producto.Modelo);
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
	//=================================================================
		function productoMarcado8(event, ui)
		{
			var producto = ui.item.value;
			$("#Cedula").val(producto.descripcion);
			event.preventDefault();
		}
		function productoSeleccionado8(event, ui)
		{
			var producto = ui.item.value;
			$("#Cedula").val(producto.valor);
			event.preventDefault();
			$('#Conductor').val(producto.nom);
			$('#telConductor').val(producto.telConductor);
		}
	//=================================================================
		function productoMarcado9(event, ui)
		{
			var producto = ui.item.value;
			$("#nitBeneficiario").val(producto.valor);
			event.preventDefault();
		}
		function productoSeleccionado9(event, ui)
		{
			var producto = ui.item.value;
			$("#nitBeneficiario").val(producto.valor);
			event.preventDefault();
			$('#nombreBeneficiario').val(producto.nom);
		}
	//=================================================================
		function productoMarcado10(event, ui)
		{
			var producto = ui.item.value;
			$("#nombreBeneficiario").val(producto.valor);
			event.preventDefault();
		}
		function productoSeleccionado10(event, ui)
		{
			var producto = ui.item.value;
			$("#nitBeneficiario").val(producto.valor);
			event.preventDefault();
			$('#nombreBeneficiario').val(producto.nom);
		}