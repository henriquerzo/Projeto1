<?php
	
	abstract class ABSTRACT_PULL{

		//Retorna o numero do processo.
		public function getNumeroProcesso(){
			return $this->numero_processo;
		}

		//Retorna uma lista de objetos(Fases) com todas as fases do processo. 
		public function getListaFases(){
			return $this->lista_fases;
		}

		//Pega o texto entre duas tags
		public function match_all_between($text, $start_tag, $end_tag){

			$delimiter = '#';
			$regex = $delimiter . preg_quote($start_tag, $delimiter) 
			. '(.*?)' 
			. preg_quote($end_tag, $delimiter) 
			. $delimiter 
			. 's';
			preg_match_all($regex, $text, $result_array);
			return $result_array[1];

		}

		public abstract function pull();
		public abstract function parserHTMLtoFase($html);  

	}
?>