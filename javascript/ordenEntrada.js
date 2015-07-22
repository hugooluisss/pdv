$(document).ready(function(){
	$('#tblMovimientos').DataTable({
		"responsive": true,
		"language": espaniol
	});
	
	$('#txtProveedor').autoComplete({
    	source: function(term, response){
        	$.getJSON('', { q: term }, function(data){ response(data); });
    }
});
});