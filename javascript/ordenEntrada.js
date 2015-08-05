$(document).ready(function(){
	$('#tblMovimientos').DataTable({
		"responsive": true,
		"language": espaniol
	});
	
	$("#txtProveedor").autocomplete({
		source: "index.php?mod=cproveedor&action=autocomplete",
		minLength: 2,
		select: function(e, el){
			$("#txtProveedor").val(el.item.label);
			$("#txtProveedor").attr("idProveedor", el.item.identificador);
		}
	});
	
	$("#txtProducto").autocomplete({
		source: "index.php?mod=cproductos&action=autocomplete",
		minLength: 2,
		select: function(e, el){
			$("#txtProducto").val(el.item.label);
			$("#txtProducto").attr("idProducto", el.item.identificador);
			$("#txtExistencias").focus();
		}
	});
	
	/* Por código de barras */
	$("#txtProducto").keypress(function(e){
		if(e.which == 13) {
        	obj = new TProducto;
        	obj.findCodigo($("#txtProducto").val(), {
        		ok: function(data){
	        		if (data.id == ""){
	        			$("#txtProducto").val("");
	        			alert("El producto no exíste");
	        		}else{
		        		$("#txtProducto").val(data.nombre);
						$("#txtProducto").attr("idProducto", data.id);
						$("#txtExistencias").focus();
	        		}
	        	}
	        });
        }
	});
		
	$("#btnWinProveedor").click(function(){
		$("#txtNombreProveedor").val("");
		$('#dvProveedor').modal("show");
	});
	
	$("#btnAddProducto").click(function(){
		$("#frmAddProducto").submit();
	});
	
	$("#frmAddProducto").validate({
		debug: true,
		rules: {
			txtCodigo: "required",
			txtNombre: "required",
			txtPrecio: {
				required: true,
				min: 0,
				digits: true
			},
			txtMinimo: {
				required: true,
				min: 0,
				digits: true
			}
			,
			selImpuesto: {
				required: true
			},
			selImpInc: {
				required: true
			},
			selCosteo: {
				required: true
			},
			selDepartamento: {
				required: true
			}
		},
		errorLabelContainer: $("ol", $("div.errores")),
		wrapper: 'li', 
		messages: {
			txtCodigo: "El código es necesario",
			txtNombre: "El nombre es necesario",
			txtPrecio: "El precio es necesario y solo hacepta números",
			txtExistencias: "Es necesario que indiques las existencias",
			txtMinimo: "Indica una cantidad minima en el stock",
			selImpuesto: "Es necesario que indiques como manejar el impuesto",
			selImpInc: "Es necesario que indiques como manejar el impuesto",
			selCosteo: "Indica el método de costeo",
			selDepartamento: "Indica un departamento"
		},
		submitHandler: function(form){
			var obj = new TProducto;
			obj.add(
				$('#id').val(),
				$('#txtCodigo').val(),
				$('#txtNombre').val(),
				$('#txtDescripcion').val(),
				$('#selDepartamento').val(),
				$('#txtMarca').val(),
				$('#txtPU').val(),
				$('#selImpInc').val(),
				$('#selImpuesto').val() == ''?0:$('#selImpuesto').val(),
				$('#selCosteo').val(),
				$('#txtCosto').val() == ''?0:$('#txtCosto').val(),
				$('#txtMinimo').val(),
				0,
				{
					ok: function(data){
						$("#txtProducto").val($('#txtNombre').val());
						$("#txtProducto").attr("idProducto", data.id);
						
						$('#id').val("");
						$('#txtCodigo').val("");
						$('#txtNombre').val("");
						$('#txtDescripcion').val("");
						$('#selDepartamento').val("");
						$('#txtMarca').val("");
						$('#txtPU').val("");
						$('#selImpInc').val("");
						$('#selImpuesto').val("");
						$('#selCosteo').val("");
						$('#txtCosto').val("");
						$('#txtMinimo').val("");
						
						$('#dvProducto').modal("hide");
					},
					error: function(){
						$("#txtNombre").focus();
					}
				});
        }

    });
	
	$("#btnWinProducto").click(function(){
		$('#dvProducto').modal("show");
	});
	
	$("#btnAddItem").click(function(){
		if ($("#orden").val() == '')
			agregar();
		else{
			var orden = new TOrden;
		}
		
	});
		
	
	function agregar(){
		if ($("#txtNumero").val() ==  ""){
			alert("Indica el número de la nota de entrada");
			$("#txtNumero").focus();
		}else if($("#txtProveedor").attr("idProveedor") == ""){
			alert("Indica quien es el proveedor de la orden");
			$("#txtProveedor").val("");
			$("#txtProveedor").focus();
		}else{
			obj = new TEntrada;
			
			obj.crear($("#orden").val(), $("#txtNumero").val(), $("#txtProveedor").attr("idProveedor"), {
				ok: function(data){
				}
			});

		}
	}
});