$(document).ready(function(){
	$('#tblProductos').DataTable({
		"responsive": true,
		"language": espaniol
	});
	
	$("#btnAdd").click(function(){
		location.href = "?mod=productoAdd";
	});
	
	$("#btnReset").click(function(){
		location.href = "?mod=productos";
	});
	
	$("#frmAdd").validate({
		debug: true,
		rules: {
			txtCodigo: "required",
			txtNombre: "required",
			txtPrecio: {
				required: true,
				min: 0,
				digits: true
			}
		},
		errorLabelContainer: $("ol", $("div.errores")),
		wrapper: 'li', 
		messages: {
			txtCodigo: "El código es necesario",
			txtNombre: "El nombre es necesario",
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
				$('#selImpuesto').val(),
				$('#selCosteo').val(),
				$('#txtCosto').val(),
				{
					ok: function(data){
						location.href = "?mod=productos";
					},
					error: function(){
						$("#txtNombre").focus();
					}
				});
        }

    });
    
    $("[action=modificar]").click(function(){
    	location.href = "?mod=productoAdd&id=" + $(this).attr("producto");
    });
    
    $("[action=eliminar]").click(function(){
    	if(confirm("¿Seguro?")){
	    	var obj = new TProducto;
	    	obj.del($(this).attr("producto"), {ok: function(){
		    	location.reload();
	    	}});
    	}
    });
    
    
    $("#txtCodigo").change(function(){
    	var obj = new TItem;
    	obj.existeCodigo($("#txtCodigo").val(), 1, {ok: function(datos){
    		if (datos.band){
	    		alert("falta desarrollar este módulo")
    		}
    	}});
    });
    
    $("#txtNombre").change(function(){
    	if ($("#txtDescripcion").val() == '')
    		$("#txtDescripcion").val($("#txtNombre").val());
    });
});