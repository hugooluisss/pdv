TProducto = function(){
	var self = this;
	
	this.add = function(id, codigo, nombre, descripcion, departamento, marca, precioUnitario, impuestoIncluido, impuesto, metodoCosteo, costo, fn){
		$.post('?mod=cproductos&action=guardar', {
				"id": id,
				"codigo": codigo,
				"nombre": nombre,
				"descripcion": descripcion,
				"departamento": departamento,
				"marca": marca,
				"precioUnitario": precioUnitario,
				"impuestoIncluido": impuestoIncluido,
				"impuesto": impuesto,
				"metodoCosteo": metodoCosteo,
				"costo": costo
			}, function(data) {
				if (data.band == 'false'){
					alert(data.mensaje == ''?"Upps. Ocurrió un error al agregar el producto: ":data.mensaje);
					if (fn.error != undefined)
						fn.error(data);
				}else
					if (fn.ok != undefined) fn.ok(data);
			}, "json"
		);
	};
	
	this.del = function(proveedor, fn){
		$.post('?mod=cproveedor&action=del', {
			"id": proveedor,
		}, function(data){
			if (data.band == 'false'){
				alert("Ocurrió un error al eliminar el producto");
			}else{
				fn.ok(data);
			}
		}, "json");
	};
};