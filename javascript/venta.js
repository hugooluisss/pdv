$(document).ready(function(){
	getMovimientos($("#orden").val());
	
	$("#txtCliente").autocomplete({
		source: "index.php?mod=cclientes&action=autocomplete",
		minLength: 2,
		select: function(e, el){
			$("#txtCliente").val(el.item.label);
			$("#txtCliente").attr("idCliente", el.item.identificador);
		}
	});
	
	$("#btnWinCliente").click(function(){
		$("#txtNombreCliente").val("");
		$('#dvCliente').modal("show");
		$("#txtNombreCliente").focus();
	});
	
	$("#frmAddCliente").validate({
		debug: true,
		rules: {
			txtNombreCliente: "required"
		},
		errorLabelContainer: $("ol", $("div.errores")),
		wrapper: 'span', 
		messages: {
			txtNombreCliente: "El nombre es necesario"
		},
		submitHandler: function(form){
			var obj = new TCliente;
			
			obj.add("", $("#txtNombreCliente").val(), "", "", "", "", "", {
				ok: function(data){
					$("#txtCliente").val($('#txtNombreCliente').val());
					$("#txtCliente").attr("idCliente", data.id);
					
					$('#dvCliente').modal("hide");
					$("#txtProducto").focus();
				},
				error: function(){
					$("#txtNombreCliente").focus();
				}
			});
        }
	});
	
	$("#btnAddCliente").click(function(){
		$("#frmAddCliente").submit();
	});
	
	$("#txtProducto").autocomplete({
		source: "index.php?mod=cproductos&action=autocomplete",
		minLength: 2,
		select: function(e, el){
			$("#txtProducto").val(el.item.label);
			$("#txtProducto").attr("idProducto", el.item.identificador);
		}
	});
	
	function getMovimientos(orden){
		$.get("?mod=listaMovimientosSalida&id=" + orden, function( data ) {
			$("#dvListaMovimientos").html(data);
			
			$("[action=eliminar]").click(function(){
		    	if(confirm("¿Seguro?")){
			    	var obj = new TOrden;
			    	obj.delItem($(this).attr("movimiento"), {ok: function(){
				    	getMovimientos($("#orden").val());
			    	}});
		    	}
		    });
		    
		    $('#tblMovimientos').DataTable({
				"responsive": true,
				"language": espaniol,
				paging: false
			});
		});
	}
});