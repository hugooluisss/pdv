TEntrada = function(){
	var self = this;
	
	this.crear = function(id, clave, proveedor, fn){
		$.post('?mod=cordenentrada&action=crear', {
				"id": id,
				"clave": clave,
				"proveedor": proveedor
			}, function(data) {
				if (data.band == 'false'){
					alert((data.mensaje == '' || data.mensaje == undefined)?"Upps. Ocurrió un error al crear la orden: ":data.mensaje);
					if (fn.error != undefined)
						fn.error(data);
				}else
					if (fn.ok != undefined) fn.ok(data);
			}, "json"
		);
	}
};