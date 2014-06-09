function run_search_mensagens(){

	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'model/model_admin_show_contatos.php',
		async: true,
		success: function(response) {
			show_contatos(response.table);
		}
	});
	return false;
}