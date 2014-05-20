function chama_detalhes_processo(numeroProcesso, tribunal){

	
	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: 'model/model_detalhes.php',
		data:{'numeroProcesso':numeroProcesso,'tribunal':tribunal},
		async: true,
		success: function(response) {
			//location.href="detalhes.php";
			show_detalhes_processo(response);
			//alert("Passou");
			
			
		}
	});
	return false;
}