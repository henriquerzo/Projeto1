<?php

include_once 'Fase.php';
include_once 'ABSTRACT_PULL.php';

class TRE_PULL extends ABSTRACT_PULL{

	var $numero_processo;
	var $lista_fases = array();
	var $delimitador_inicio_campo_fases = '<!-- ALTERACAO SEGREDO DE JUSTICA -->';
	var $delimitador_fim_campo_fases = '<!-- FIM ALTERACAO SEGREDO DE JUSTICA -->';
	var $delimitador_inicio_horarios = '<td width="25%">';
	var $delimitador_fim_horarios = '</td>';

	public function TRE_PULL($numero_processo){
		$this->numero_processo = $numero_processo;
	}

	public function pull(){
		
		$tmp_fname = tempnam("/tmp", "COOKIE");
		$url_post = 'http://www.tse.jus.br/sadJudSadpPush/ExibirDadosProcesso.do?nprot='.$this->getNumeroProcesso().'&comboTribunal=pb';
		$cURL = curl_init($url_post);
		curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$resultado = curl_exec($cURL);
		$cURL = curl_init('http://www.tse.jus.br/sadJudSadpPush/ExibirPartesProcessoCGE.do');
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($cURL, CURLOPT_COOKIEFILE, $tmp_fname);
		curl_setopt($cURL, CURLOPT_POST, true);
		// Definimos quais informações serão enviadas pelo POST (array)
		curl_setopt($cURL, CURLOPT_POSTFIELDS, "partesSelecionadas=Andamento");
		curl_setopt($cURL, CURLOPT_REFERER, 'http://www.tse.jus.br/sadJudSadpPush/ExibirPartesProcessoZona.do');
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