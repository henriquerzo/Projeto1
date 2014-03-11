function run_search_processos_usuario(){

	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'model/model_processos_do_usuario.php',
		async: true,
		success: function(response) {
			show_processos_usuario(response.table);
		}
	});
	return false;
}
