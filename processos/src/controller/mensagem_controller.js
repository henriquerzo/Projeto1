function registra_mensagem(){

	var email = document.getElementById('email').value;
	var mensagem = document.getElementById('mensagem').value;
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: '../model/model_salva_mensagem.php',
		data:{'email':email,'mensagem':mensagem},
		async: true,
		success: function(response) {
			if(response=="Não enviada!"){
				alert('Verifique se as informações estão corretas!');
			}else{
				alert(response);
			}
			window.location.assign("../home.php")
			
		}
	});
	return false;
}