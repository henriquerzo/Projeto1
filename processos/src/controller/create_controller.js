function registra_processo(){
	
	var numero_processo = document.getElementById('campo_numero_processo').value;
	var nome_cliente = document.getElementById('cliente').value;
	var texto_observacao = document.getElementById('observacoes').value;
	document.getElementById('cliente').value = '';
	document.getElementsByName("tribunal")[0].value = "-1";
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: 'model/model_salva_processo.php',
		data:{'campo_numero_processo':numero_processo,'tribunal':tribunal,'cliente':nome_cliente,'observacoes':texto_observacao},
		async: true,
		success: function(response) {
			if(response=="Processo nao cadastrado!"){
				alert('Processo nao encontrado ou nao existe.Verifique se as informacoes estao corretas!');
			}else{
				alert(response);
			}
			location.reload();
			
		}
	});
	return false;
}