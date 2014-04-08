<?php

include 'Fase.php';
include 'ABSTRACT_PULL.php';

class TRT_PULL extends ABSTRACT_PULL{

	var $numero_processo;
	var $lista_fases = array();
	var$delimitador_inicio_campo_fases = '<p class="sem_indent"><BR>';
	var	$delimitador_fim_campo_fases = 'hr><BR>';
	var	$delimitador_inicio_datas = '<LI><p><strong>';
	var	$delimitador_fim_datas = '</strong></p></LI>';
	var	$delimitador_inicio_fases = '</LI><p>';
	var	$delimitador_fim_fases = '<BR><';
	

	public function TRT_PULL($numero_processo){
		$this->numero_processo = $numero_processo;
	}

	public function pull(){
		
		$tmp_fname = tempnam("/tmp", "COOKIE");
		$url_post = "https://www.trt13.jus.br/portalservicos/consulta/informarProcesso.jsf";
		$cURL = curl_init($url_post);
		echo $url_post;
		curl_setopt($cURL, CURLOPT_POSTFIELDS, "formConsulta=formConsulta&formConsulta%3Anumero=216&formConsulta%3Asequencial=00&formConsulta%3Adigito=82&formConsulta%3Aano=2006&formConsulta%3Aorgao=5&formConsulta%3Aregional=13&formConsulta%3Avara=1&formConsulta%3Aj_id153=Consultar&javax.faces.ViewState=j_id3");
		curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURL, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($cURL, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($cURL, CURLOPT_CAINFO, getcwd() . "www.trt13.jus.br.crt");
		$resultado = curl_exec($cURL) or die( curl_error($cURL) );;
		echo $resultado;
		//$this->parserHTMLtoFase($resultado);
		curl_close($cURL);
		
	}

	public function parserHTMLtoFase($resultadoHTML){
		
		$campo_fases = match_all_between($resultadoHTML,$this->delimitador_inicio_campo_fases,$this->delimitador_fim_campo_fases);
		$datas = match_all_between($campo_fases[0],$this->delimitador_inicio_datas,$this->delimitador_fim_datas);
		$fases = match_all_between($campo_fases[0],$this->delimitador_inicio_fases,$this->delimitador_fim_fases);
		for ($i=0; $i < count($datas) ; $i++) {
			//formata descricao da fase.
			$nome_fase_formatada = str_replace("&nbsp;", "", $fases[$i]);
			$nome_fase_formatada = str_replace("<BR>", "", $nome_fase_formatada);
			$fase = new Fase($datas[$i],$nome_fase_formatada); 
			array_push($this->lista_fases,$fase);
		}
	}

}

?>