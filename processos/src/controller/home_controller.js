function run_search_processos_usuario(){

	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'model/model_processos_do_usuario.php',
		async: true,
		success: function(response) {
			get_data_ultima_atualizacao();
			show_processos_usuario(response.table);
		}
	});
	return false;
}


function atualiza_processo(numeroProcesso, tribunal, situacao){

	$.ajax({
		type: 'POST',
		dataType: 'text',
		data:{'numeroProcesso':numeroProcesso,'tribunal':tribunal},
		url: 'model/model_atualiza_processo.php',
		async: true,
		success: function(response) {
			if(situacao==response){
				alert("Não houve andamento no processo!");
			}else{
				alert("Houve andamento no processo!");
				location.reload();
			}
		}
	});
	return false;
}

function get_data_ultima_atualizacao(){

	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'model/model_ultima_atualizacao.php',
		async: true,
		success: function(response) {
			show_data_ultima_atualizacao(response);
		}
	});
	return false;
}
//deprecated
function executa_atualizacao_automatica(){

	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'model/model_atualiza_todos_processos.php',
		async: true,
		success: function(response) {
			
		}
	});
	return false
}
