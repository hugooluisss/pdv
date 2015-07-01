$(document).ready(function(){
	$('#tblUsuarios').DataTable({
		"responsive": true,
		"language": espaniol
	});
	
	$("#btnAdd").click(function(){
		location.href = "?mod=usuarioAdd";
	});
});