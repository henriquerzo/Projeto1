<?php
//Classe representa uma fase do processo.
class Fase{
	
	var $data;
	var $nome;
	//Construtor de Fase.Recebe a data e a descricao da fase.
	function Fase($data,$nome){
		$this->data = $data;
		$this->nome = $nome;
	}
	//Retorna a data da fase.
	function getDate(){
		return $this->data;
	}
	//Retorna a descricao da fase.
	function getNome(){
		return $this->nome;
	}

	function toString(){
		echo  $this->data . ' - ' . $this->nome;
	}

	// function compareTo($objeto){
	// 	if(($objeto->getData() == getData()) and ($objeto->getNome() == getNome()){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
}
?>