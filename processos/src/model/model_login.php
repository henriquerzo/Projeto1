<?php 

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];



$usuarios_cadastrados = array("admin"=>"admin");
if(array_key_exists($usuario,$usuarios_cadastrados)){
	if($usuarios_cadastrados[$usuario] == $senha){
		
		echo true;
		
	}else{
		echo false;
	}
	
}
else{
	echo false;
}


 ?>

