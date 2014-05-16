<?php

include_once 'Fase.php';
include_once 'ABSTRACT_PULL.php';

class TRF_PULL extends ABSTRACT_PULL{

	var $numero_processo;
	var $lista_fases = array();
	var$delimitador_inicio_campo_fases = '<p class="sem_indent"><BR>';
	var	$delimitador_fim_campo_fases = 'hr><BR>';
	var	$delimitador_inicio_datas = '<LI><p><strong>';
	var	$delimitador_fim_datas = '</strong></p></LI>';
	var	$delimitador_inicio_fases = '</LI><p>';
	var	$delimitador_fim_fases = '<BR><';
	

	public function TRF_PULL($numero_processo){
		$this->numero_processo = $numero_processo;
	}

	public function pull(){
		
		$tmp_fname = tempnam("/tmp", "COOKIE");
		$url_post = 'http://www.trf2.gov.br/cgi-bin/pingres-allen?proc='. $this->getNumeroProcesso().'&mov=1';
		$cURL = curl_init($url_post);
		curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$resultado = curl_exec($cURL);
		$this->parserHTMLtoFase($resultado);
		curl_close($cURL);
		
	}

	public function parserHTMLtoFase($resultadoHTML){
		
		$campo_fases = $this->match_all_between($resultadoHTML,$this->delimitador_inicio_campo_fases,$this->delimitador_fim_campo_fases);
		if(count($campo_fases) != 0){
			$datas = $this->match_all_between($campo_fases[0],$this->delimitador_inicio_datas,$this->delimitador_fim_datas);
			$fases = $this->match_all_between($campo_fases[0],$this->delimitador_inicio_fases,$this->delimitador_fim_fases);
			for ($i=0; $i < count($datas) ; $i++) {
				//formata descricao da fase.
				$nome_fase_formatada = str_replace("&nbsp;", "", $fases[$i]);
				$nome_fase_formatada = str_replace("<BR>", "", $nome_fase_formatada);
				$fase = new Fase($datas[$i],$nome_fase_formatada); 
				array_push($this->lista_fases,$fase);
			}
		}
	}

}

?>