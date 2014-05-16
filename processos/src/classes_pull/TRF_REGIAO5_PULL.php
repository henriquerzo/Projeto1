<?php

include_once 'Fase.php';
include_once 'ABSTRACT_PULL.php';

class TRF_REGIAO5_PULL extends ABSTRACT_PULL{

	var $numero_processo;
	var $lista_fases = array();
	var $delimitador_inicio_campo_fases = '<strong> MOVIMENTOS </strong>';
	var	$delimitador_fim_campo_fases = '</body>';
	var	$delimitador_inicio_fase = '<p style="margin-left:20px;margin-right:20px;">';
	var	$delimitador_fim_fase = '</p>';

	public function TRF_REGIAO5_PULL($numero_processo){
		$this->numero_processo = $numero_processo;
	}

	public function pull(){
		
		$tmp_fname = tempnam("/tmp", "COOKIE");
		$url_post = 'http://jef.trf5.jus.br/CpUnificada/pesquisar.do';
		$cURL = curl_init($url_post);
		curl_setopt($cURL, CURLOPT_POSTFIELDS, "tipo=xmlproc&filtro=".$this->getNumeroProcesso()."&numPag=0&ordenacao=D");
		curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$resultado = curl_exec($cURL);
		$this->parserHTMLtoFase($resultado);
		curl_close($cURL);
		
	}

	public function parserHTMLtoFase($resultadoHTML){
		
		$campo_fases = $this->match_all_between($resultadoHTML,$this->delimitador_inicio_campo_fases,$this->delimitador_fim_campo_fases);
		if(count($campo_fases) != 0){
			$array_fases =$this-> match_all_between($campo_fases[0],$this->delimitador_inicio_fase,$this->delimitador_fim_fase);
			for ($i=0; $i < count($array_fases) ; $i++) {
				$data = substr($array_fases[$i],0,10);
				$nome_fase = substr($array_fases[$i],19,strlen($array_fases[$i]));
				if(strlen($nome_fase) != 0){
					$fase = new Fase($data,$nome_fase); 
					array_push($this->lista_fases,$fase);
				}
			}
		}
	}
}

?>