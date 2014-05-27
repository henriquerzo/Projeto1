<?php
// Inclui o arquivo com o sistema de segurança
include("seguranca.php");

// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Salva duas variáveis com o que foi digitado no formulário
// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
	$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';

// Utiliza uma função criada no seguranca.php pra validar os dados digitados
	if (validaUsuario($usuario, $senha) == 1) {
// O usuário e a senha digitados foram validados, manda pra página interna
		header("Location: home.php");
	} 
	else if (validaUsuario($usuario, $senha) == 2) {
// O usuário e a senha digitados foram validados, manda pra página interna
		header("Location: admin-home.php");
	} 
	else {
// O usuário e/ou a senha são inválidos, manda de volta pro form de login
// Para alterar o endereço da página de login, verifique o arquivo seguranca.php
		expulsaVisitante();
	}
}
?>