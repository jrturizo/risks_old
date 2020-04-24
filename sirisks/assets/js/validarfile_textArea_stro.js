$(document).ready(function()
{  
	/*	var editor = CKEDITOR.replace('html_Seguimineto'); 
		editor.on( 'change', function( evt )
		{
			$("#ESTADO_SEGUIMIENTO_RISKS").val(editor.getData());
		});

		var editor1 = CKEDITOR.replace('html_Siniestro');
		editor1.on( 'change', function( evt ) 
		{
			$("#SINIESTRO").val(editor1.getData());
		});*/
		
		$.blockUI();
		$.blockUI({ message: '<h1><img src="busy.gif" /> Just a moment...</h1>' });
		$.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
		$.unblockUI();
	
	
        $( ".form" ).validate({
                    submitHandler:function()
					{
						var message = "";	
						var formData = new FormData($(".form")[0]); 
						//capturo la url
						var $url=$("#url_save_registro").val();
						 //armo mi funcion ajax y envio el form por ajax :)
						  $.ajax({
						  type:"POST",
						  url:$url,
						  data: formData,
						  cache: false,
							contentType: false,
							processData: false,
						  success:function(j){
							   var data= jQuery.parseJSON(j);
							   alert(data.msj);
							   if(data.id)
							   {
								  window.location = data.url;
							   }
							   
							   //show_msj(data.error,'#div_result',data,'add');
						   
						  }
						});
                    }
                
                });
     
   });
   
  
   
//como la utilizamos demasiadas veces, creamos una función para 
//evitar repetición de código
function showMessage(message){
	$(".messages").html("").show();
	$(".messages").html(message);
}

//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
function isImage(extension)
{
	switch(extension.toLowerCase()) 
	{
	    case 'pdf':
		return true;
	    break;
	    default:
	        return false;
	    break;
    }
}