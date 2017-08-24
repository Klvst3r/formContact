$(document).ready(function(){

	$(".formulario-contacto").bind('submit', function() {
		
		//codigo ajax
		$.ajax({
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success:function(respuesta){

				if(respuesta == "ok"){

				//alert("enviado");
				//Capturamos alerta
				//Quita el hide y muestra la advertencia
				$("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-success");
				$(".respuesta").html("Enviado");
				$(".mensaje-alerta").html("El mensaje ha sido enviado correctamente.");
			}else{
				$("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
				$(".respuesta").html("Error al enviar");
				$(".mensaje-alerta").html("El mensaje no se pudo enviar, intentelo de nuevo.");
			}
			},
			error: function(){
				//alert("error");
				$("#alerta").removeClass("hide").removeClass("alert-danger").removeClass("alert-success").addClass("alert-danger");
				$(".respuesta").html("Error al enviar");
				$(".mensaje-alerta").html("El mensaje no se pudo enviar, intentelo de nuevo.");
			}

		});

		return false;
	});

});