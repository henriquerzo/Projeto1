<?php

include_once 'Fase.php';
include_once 'ABSTRACT_PULL.php';

class STF_PULL extends ABSTRACT_PULL{

	var $numero_processo;
	var $lista_fases = array();
	var $delimitador_inicio_campo_fases = '<table class="resultadoAndamentoProcesso">';
	var	$delimitador_fim_campo_fases = '</table>';
	var	$delimitador_inicio_cada_fase = '<tr>';
	var	$delimitador_fim_cada_fase = '</tr>';
	var	$delimitador_inicio_informacao = '<span>';
	var	$delimitador_fim_informacao = '</span>';

	//Construtor.Recebe o numero do processo como parametro.
	public function STF_PULL($numero_processo){
		$this->numero_processo = $numero_processo;
	}
	
	
	//Executa o codigo que faz requisicao das fases do processo no site do tribunal.
	public function pull(){
		
		$tmp_fname = tempnam("/tmp", "COOKIE");
		$url_post = 'http://www.stf.jus.br/portal/processo/verProcessoAndamento.asp';
		$cURL = curl_init($url_post);
		$numero_formatado = str_replace(" ", "+",$this->getNumeroProcesso());
		curl_setopt($cURL, CURLOPT_POSTFIELDS, "dropmsgoption=1&partesAdvogadosRadio=1&numero=".$numero_formatado);
		curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
		curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
		$resultado = curl_exec($cURL);
		if($resultado != false){
			$this->parserHTMLtoFase($resultado);
		}
		curl_close($cURL);
		
	}
	//Recebe como parametro a string que representa a pagina com as fases do processo.
	//Faz o parse do HTML para Fase.
	//Adiciona todas as fases do processo em $lista_fases.
	public function parserHTMLtoFase($resultadoHTML){

		//Pega o campo da tabela com todas as fases
		$tabela_fases = $this->match_all_between($resultadoHTML,$this->delimitador_inicio_campo_fases,$this->delimitador_fim_campo_fases);
		if(count($tabela_fases) != 0){
			$array_fases = $this->match_all_between($tabela_fases[0],$this->delimitador_inicio_cada_fase,$this->delimitador_fim_cada_fase);
			for ($i=1; $i < count($array_fases) ; $i++) {
				$array_dados_fase = $this->match_all_between($array_fases[$i],$this->delimitador_inicio_informacao,$this->delimitador_fim_informacao);
				$fase = new Fase($array_dados_fase[0],$array_dados_fase[1]); 
				array_push($this->lista_fases,$fase);
			}
		}
	}

}

?>