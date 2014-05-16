<?php

include_once 'Fase.php';
include_once 'ABSTRACT_PULL.php';

class TSM_PULL extends ABSTRACT_PULL{

	var $numero_processo;
	var $lista_fases = array();
	var $delimitador_inicio_campo_fases = '';
	var $delimitador_fim_campo_fases = '';
	var $delimitador_inicio_horarios = '';
	var $delimitador_fim_horarios = '';

	public function TSM_PULL($numero_processo){
		$this->numero_processo = $numero_processo;
	}

	public function pull(){
		
		$tmp_fname = tempnam("/tmp", "COOKIE");
		$url_post = 'http://www.stm.gov.br/cgi-bin/nph-brs?s1='.$this->getNumeroProcesso().'&l=30&d=SAMU&p=1&u=l&r=1&f=G';
		$cURL = curl_init($url_post);
		curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$resultado = curl_exec($cURL);
		//$this->parserHTMLtoFase($resultado);
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