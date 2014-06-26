function registra_usuario(){

	var usuario = document.getElementById('usuario').value;
	var senha = document.getElementById('senha').value;
	var nome = document.getElementById('nome').value;
	var email = document.getElementById('email').value;
	var nivel = document.getElementById('nivel').value;
	var ativo = document.getElementById('ativo').value;
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: '../model/model_admin_salva_usuario.php',
		data:{'usuario':usuario,'senha':senha,'nome':nome,'email':email, 'nivel':nivel, 'ativo':ativo},
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