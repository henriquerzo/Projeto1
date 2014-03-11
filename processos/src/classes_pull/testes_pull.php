<?php
		//TESTA CLASSE STF_PULL.php
		include 'STF_PULL.php';
		$obj = new STF_PULL('RE 328778');
		$obj->pull();
 		$lista_processos_pull = $obj->getListaFases();
 		echo var_dump($lista_processos_pull);

		//TESTA CLASSE TRE_PULL.php
		//include 'TRE_PULL.php';
		//$obj = new TRE_PULL('145892013');
		//$obj->pull();
 		//$lista_processos_pull = $obj->getListaFases();
 		//echo var_dump($lista_processos_pull);

		//TESTA CLASSE TRF_PULL.php
		//include 'TRF_PULL.php';
		//$obj = new TRF_PULL('201302010125452');
		//$obj->pull();
 		//$lista_processos_pull = $obj->getListaFases();
 		//echo var_dump($lista_processos_pull);

		//TESTA CLASSE TRF_REGIAO5_PULL.php
		//include 'TRF_REGIAO5_PULL.php';
		//$obj = new TRF_REGIAO5_PULL('00139061320004058300');
		//$obj->pull();
 		//$lista_processos_pull = $obj->getListaFases();
 		//echo var_dump($lista_processos_pull);
		
		


function match_all_between($text, $start_tag, $end_tag){

		$delimiter = '#';
		$regex = $delimiter . preg_quote($start_tag, $delimiter) 
		. '(.*?)' 
		. preg_quote($end_tag, $delimiter) 
		. $delimiter 
		. 's';
		preg_match_all($regex, $text, $result_array);
		return $result_array[1];

	}
		?>