
<?php

include_once 'Fase.php';
include_once 'ABSTRACT_PULL.php';

class TJPB_PULL extends ABSTRACT_PULL{

    var $numero_processo;
    var $lista_fases = array();
    var $delimitador_inicio_campo_fases = '<div class="divRolagemConteudoMov">';
    var $delimitador_fim_campo_fases = '</tbody></table>';
    var $delimitador_inicio_data_fase = 'width="70">';
    var $delimitador_fim_data_fase = '</td><td class="rich-table-cell';
    var $delimitador_inicio_descricao = 'width="300">';
    var $delimitador_fim_descricao = '</td></tr>';

    //Construtor.Recebe o numero do processo como parametro.
    public function TJPB_PULL($numero_processo){
        $this->numero_processo = $numero_processo;
    }
    
    
    //Executa o codigo que faz requisicao das fases do processo no site do tribunal.
    public function pull(){
        
        $tmp_fname = tempnam("/tmp", "COOKIE");
        $url_post = 'http://app.tjpb.jus.br/consultaprocessual2/views/consultaPublica.jsf;jsessionid=FC0CF5FF1EF41FF56BF9D750CB899DF7.webserver04';
        $cURL = curl_init($url_post);
        $parametros = "consulta-processual=consulta-processual&consulta-processual%3AcpSelectTipoPesquisa=1&consulta-processual%3AtextoPesquisa=".$this->getNumeroProcesso()."&consulta-processual%3AcpSelectGrau=1&consulta-processual%3AbotaoPublico=Consultar&javax.faces.ViewState=H4sIAAAAAAAAANVaS2wbxxkeUpIlUWoSW4EdJ1FKy4HlB02JFElRVgRbsiyLEGUpImW4cgt5uBxJKy1317uzIu3AqVMgLdAe0iJ10CAOEqA9xqceWvTUIEALFEiLGihaFGiR9tCiQB9B0aKPQ9uZ2Qd3yVmSotIXD%2BPR7sz8r%2B9%2F7D9%2B53egS9fAaUXbjMJtWEls6xtRqKqSKEAsKnI0ryGUw5ohYENDV5Qi%2Bswrf%2FjKexvHe%2FoBqKi3AegE4Lhnt6CUVEVGMo5Ok0dXRVReURQMetd37an5C4Dj23AXVqIbUEC6a9sWLknReTLMKVoJDAiKrBsShmdVTSELdQNK1glBcKrJCctQRtJlTTFU8IgAyWt9Gek3DVGH1hFdINLkiBySkICXZLSIZAM8Lqjmg7yoKq6zAuCYV4VkEs2tLi8vreQVWdiC8iYCZ3z05NCiCssZqqpoGHRtr4vFJKj%2BfPW1mjFZymBU0s19CWcXs6wmClu%2BAmZk1cB5VMHgY5iMSo2GwF6UHCKvC4qEsAYdrvem4EdsBWfpIbpj6aHmspuipx2%2BW1fXRDuydjNZV%2BfaFDRkC%2Bo6oSWOD1COY3GH5b2R7bfJXtag0Q7hZJ2uykYL2uqCgoL0lnV1USmVoFycMTBWZNBfUDBUlo0CCUuKTb5iaGDgepYeFJWIf0WXCtuE18kvfv%2FaW4%2Fpp6QgDVAUO8ZN8CJBkHvW4cx6nFmvqrqjFH3cQ0LjwSqBGYVAG8rvh7W7P7r%2F998HQWANdO1CyUAVNaDTDb1ApaeE5vOL2fWZ6VzmIgZPj9Aj9RE7jpliwGiFCksIPMYIGFiUollFgBJ68a8Hb9wf%2Fdtvg6AzA3q2oL4lkLibpYAzZKzdwuAQk3qEMjVCgrMob05mQQ%2F904CbiDLyKFm%2BCzURykyQRyvqP8kPg%2BDMChlUTIKwV7aMjNEm0g798u2v%2FeWlz6WJbBlbNptFtu6KUSog7bPv3Bvs%2B%2FIHX7B1PKCq5LiBqiTTmgZvZUUdV156OPj6d%2BGbHfTATl28jdiGQLmTjmTTCT4SchhiNK9IRaTl4C7SPvG9r0%2B9ev%2F9xSAIZkGvIEFdvwJLtqwhnawpsj0YHDa1IyojOUQ0IIm3YUFCkxXG46g3HqJdSmwFyYTOMlE1umhzQJlHMtJ%2BHvn0jdJ3HvyJiVpx0NJFJ31sUKtTBoIjLvno30fZgsHq3gAHkYc5z3odEzGdzhMkLEK1q%2Fun7753%2BMYPO0BwDoQkBRbnoIAVLQN68ZaG9C2itIp6%2FgJzkgPlHgpyCnkMniDqjeqGzJRNgrQeXZxeWVjPzGIwEI%2BNpmKJRCqWWh8vpifGxsfjvA3Ty8vZzKVZwthI3TuxpErRWbQBCcrnzIfPTpNS4lZe2UHy%2FP0fzE7Kr73N6obyicZuQXQ0%2ByvhzS2SlPoksSTivELtgUEnKUUIgjC3LKB6G6FDiBkDm7i1sUWrCdUxUCcz0AEMupEs4FsqQ9JZOpykw2mClrofBkcdbh2iFt%2BqyjFgddbpMiqdnaizT4DR5lkiKVCBhzgCn%2FPWNLi2yHHr4qBbFywmqzVoPcA4oIJXUc4R5amqKJx46ide0Fe8eAqDjg1a8njrj4qLdk2kt2Leg4dXf%2F2bwRcuO5EeWyELgx676KoeYvkiDTl10EVSNA83r9K9lyoqcSKd1L52sqKI1cATpv7Iyppl5dDd6x98%2Bx9fCrJlA86y6oqvvvz53B%2FXHj7H%2BCT0wzQGbRcUXecclyFeNPHgTujaq3iYUqZcL5fHwMePv1APvhmSjqKKKkDljjtIm5lQVSvlRbDQyM%2FCF%2BLpSGIizLQ2NdSExFDF1CH2rWQv0XBaIxAGT57jYZfVtxic5OKaU2VjfvHt6%2B%2B03Knzd%2FrnHB0WHFfPEsSbcVw1JyGO6zu%2Fhl4e3IeXj45Was7J2OsXqpnDBjH9Z4mNufIkGG5kOFJ2WZWTD0ZWQa4JRiYi44lWMOIiNVRxRctasyesz5tE1XiuaBSsmmrBCkmOAkBVR7iFTy6OZZ7mBLe9WytWrKgNBEza329udPo4jR51ffaZlQjSTLA5u0PcasM7ZFXuK3pONfQdcRWboryDirSoyCH8E%2BnHa%2Fd%2BdvoZM4jVFB3k%2FbdmX7732je%2Fkehg2buf6sfSVqAu65hR4vG75KXbtNUHdNjhmGawrczibyQEeS7FMtECNovR%2BvTQqmd5clW7njWWiqTGmnqWl5Qdhb2sJsDZxtE7PDUVjofPh5Phc%2BF44g7oEGXG4xq41gqPVFnNEkQNCRoCjvE8xCNPbdr3jee0RWE7hV%2BstgpE76P%2BDRFJRSswmdt46NtPibaR4AZvUodopkMXG4fwEfBsC6q9A7oL5idoa%2BCaiKSTYZuBlozHbPYMNyM7jR3s7vJ4g9Nz3CD%2BRn1dyfsCaq%2Bu9LdJEfl7P2Orse%2Bnm5mENah8HD8Hnm9sm0QsEhtrse4yCfHdvh3gXAX5lpjbO3L43yiehh6u7fB5EbRWRVBHTRngwOgjKta694GtQrph%2Bk9b6T%2FNrW9qv7bI4qztSwO%2B4Wk%2FtWUh2W5teQ6caFLwmVb08YM8WGkCtbHWS0uLUsPKcsLS%2FESrleW%2FIxuk477qfuO%2FkAcS6Ug63oY3P%2BWbB1bnsNP%2B%2Ft%2FNAKmU0C7sk%2BBYYy2tzvkgfgksNrZGcjSSbgnxjIh%2FPnZuD7D7KsE3mnKg304g5ZltH5EpNZ5q10Qp0Cxe%2BNpoGVxpYqNYZHy0xahkGelJv4gUi2P7yma%2FMemj9o%2FEWLvKz4BkY%2BgyPIqKDIuQXjQ1bkAUQaGJPcYjsWRLBvGlTG0UbuRIdDH2Xo%2F9vzlTvNiuPc%2BDM01g3tyKTT8kk%2BlILB5v0a1qbefvX0nbv1zNlv94zk%2BNQd%2BKkN18YusG1Ddd%2BvbgeSjZSxOrw5fn0QRRHYbaJsJksl4gBt1hn6xmF4p%2FyULF5DqS%2B44We69sq0JjcMj9TW%2Fe7%2FK6tAF6FxM4Q%2BoMRRbIGTuWYqqtrGGfLv4iwltK0a%2BNf9Tpz9euu5k90rf2yi8%2BDFpN9%2BcJjWOeTn3tDtqqL3x45M997x5ctFr1gVT5Aoj4Ytt%2BrFmKOXnK40zmvYbjuYC61SfBWmO3Sk1E4qlkGAr0%2F%2Bs08CsO7SFqzN6L9gtXzyRZVASjRFv6G4pW0q8Pcyw%2B%2FKmoCZ6pYRM7wzW9GA8G6IMDulEoiexGekf9F085Qr17JAAA";
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $parametros);
        curl_setopt($cURL, CURLOPT_POST, true);
        curl_setopt ($cURL, CURLOPT_COOKIEJAR, $tmp_fname);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($cURL);
        $cURL = curl_init('http://app.tjpb.jus.br/consultaprocessual2/views/consultarPorProcesso.jsf');
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($cURL, CURLOPT_COOKIEFILE, $tmp_fname);
        $resultado = curl_exec($cURL);
        $this->parserHTMLtoFase($resultado);
        curl_close($cURL);
        
    }
    //Recebe como parametro a string que representa a pagina com as fases do processo.
    //Faz o parse do HTML para Fase.
    //Adiciona todas as fases do processo em $lista_fases.
    public function parserHTMLtoFase($resultadoHTML){

        //Pega o campo da tabela com todas as fases
        $tabela_fases = $this->match_all_between($resultadoHTML,$this->delimitador_inicio_campo_fases,$this->delimitador_fim_campo_fases);
        if(count($tabela_fases) != 0){
            $array_datas = $this->match_all_between($tabela_fases[0],$this->delimitador_inicio_data_fase,$this->delimitador_fim_data_fase);
            $array_descricoes = $this->match_all_between($tabela_fases[0],$this->delimitador_inicio_descricao,$this->delimitador_fim_descricao);
            for ($i=1; $i < count($array_datas) ; $i++) {
                $fase = new Fase($array_datas[$i],trim($array_descricoes[$i])); 
                array_push($this->lista_fases,$fase);
            }
        }else{
            
            
        }
    }

}

?>