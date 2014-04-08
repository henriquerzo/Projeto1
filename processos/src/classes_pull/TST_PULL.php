<?php

include_once 'Fase.php';
include_once 'ABSTRACT_PULL.php';

class TST_PULL extends ABSTRACT_PULL{

	var $numero_processo;
	var $lista_fases = array();
	var $delimitador_inicio_campo_fases = '';
	var $delimitador_fim_campo_fases = '';
	var $delimitador_inicio_horarios = '';
	var $delimitador_fim_horarios = '';

	function TST_PULL($numero_processo,$digito,$ano,$orgao,$tribunal,$vara){
		$this->numero_processo = $numero_processo;
		$this->digito = $digito;
		$this->ano = $ano;
		$this->orgao = $orgao;
		$this->tribunal = $tribunal;
		$this->vara = $vara;
	}

	function getNumeroProcesso(){
		return $this->numero_processo;
	}

	function getDigitoProcesso(){
		return $this->digito;
	}

	function getAno(){
		return $this->ano;
	}

	function getOrgao(){
		return $this->orgao;
	}

	function getTribunal(){
		return $this->tribunal;
	}

	function getVara(){
		return $this->vara;
	}

	function getListaFases(){
		return $this->lista_fases;
	}

	public function pull(){
		
		$tmp_fname = tempnam("/tmp", "COOKIE");
		$url_post = 'http://aplicacao5.tst.jus.br/consultaProcessual/consultaTstNumUnica.do?conscsjt=&numeroTst='.$this->getNumeroProcesso().'&digitoTst='.$this->getDigitoProcesso().'&anoTst='.$this->getAno().'&orgaoTst='.$this->getOrgao().'&tribunalTst='.$this->getTribunal().'&varaTst='.$this->getVara().'&consulta=Consultar';
		$cURL = curl_init($url_post);
		curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$resultado = curl_exec($cURL);
		$this->parserHTMLtoFase($resultado);
		curl_close($cURL);
		
	}

	public function parserHTMLtoFase($resultadoHTML){
		$nomes = $this->match_all_between($resultadoHTML,$this->delimitador_inicio_campo_fases,$this->delimitador_fim_campo_fases);
		$datas = $this->match_all_between($resultadoHTML,$this->delimitador_inicio_horarios,$this->delimitador_fim_horarios);
		for ($i=0; $i < count($nomes) ; $i++) {
			$fase = new Fase($datas[$i],$nomes[$i]); 
			array_push($this->lista_fases,$fase);
		}
	}

	
}

?>