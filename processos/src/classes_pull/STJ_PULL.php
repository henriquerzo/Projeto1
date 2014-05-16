<?php

include_once 'Fase.php';
include_once 'ABSTRACT_PULL.php';

class STJ_PULL extends ABSTRACT_PULL{

	var $numero_processo;
	var $lista_fases = array();
	var $delimitador_inicio_campo_fases = '<!-- ALTERACAO SEGREDO DE JUSTICA -->';
	var $delimitador_fim_campo_fases = '<!-- FIM ALTERACAO SEGREDO DE JUSTICA -->';
	var $delimitador_inicio_horarios = '<td width="25%">';
	var $delimitador_fim_horarios = '</td>';

	public function STJ_PULL($numero_processo){
		$this->numero_processo = $numero_processo;
	}


	public function pull(){
		
		$tmp_fname = tempnam("/tmp", "COOKIE");
		$url_post = 'http://www.stj.jus.br/webstj/Processo/Justica/valida.asp';
		$cURL = curl_init($url_post);
		$numero_formatado = str_replace(" ", "+",$this->getNumeroProcesso());
		curl_setopt($cURL, CURLOPT_POSTFIELDS, "num_pro=REsp+123456&num_reg=&num_unico=&num_ori=&cod_oab=&nom_par=&nom_adv=&optTipo=I&chkordem=DESC&submit1=+Consultar+&pesquisa_avancada=");
		curl_setopt($cURL, CURLOPT_POST, true);
		curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$resultado = curl_exec($cURL);
		$cURL = curl_init('http://www.stj.jus.br/webstj/Processo/Justica/pagina_lista.asp');
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		curl_setopt ($cURL, CURLOPT_COOKIEFILE, $tmp_fname);
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