TMensaje = function(){
	var self = this;
	
	this.enviar = function(mensaje){
		$.post(
			'?mod=cchat&action=push', {
				"texto" : mensaje
			},
			function(result){
				if(result.band == "false")
					alert("Upps, ocurrio un error al enviar tu mensaje, verifica que tu conexión a internet se encuentre activa");
				else{
					$("#txtMensaje").val("");
					$("#txtMensaje").focus();
					self.getMensajes();
				}
			},
			"json"
		);
	};
	
	this.getMensajes = function(){
		$.ajax({
			type: "GET",
			url: '?mod=mensajes',
			success: function(data) {
				$('#conversacion').html(data);
				if ($("#chkScroll").prop("checked"))
					$("#conversacion").scrollTop($("#conversacion").prop("scrollHeight"));
					
				$("#conversacion div:last-child p").css({"color": "red"});
			}
		});
	};
};