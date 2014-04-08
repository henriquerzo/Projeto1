function exibe_campo_entrada_processo() {

      tribunal = document.getElementsByName("tribunal")[0].value;
      mascara = "";
      if(tribunal=="TJ-PB"){
        mascara = "999.9999.999.999-9";
        saida = '<input type="text" name="campo_numero_processo" id="campo_numero_processo" class="form-control input-lg" placeholder="Número do Processo" tabindex="1">';
        $('#input_numero_processo').html(saida);
        $("#campo_numero_processo").mask(mascara);
      }else if(tribunal=="S. Tribunal Federal"){
        //mascara = "aa 9999999";
        saida = '<input type="text" id="campo_numero_processo" name="campo_numero_processo" class="form-control input-lg" placeholder="Número do Processo" tabindex="1">';
        $('#input_numero_processo').html(saida);
        //$("#campo_numero_processo").mask(mascara);
      }else if(tribunal=="T. Regional Federal"){
        mascara = "9999999-99.9999.9.99.9999";
        saida = '<input type="text" id="campo_numero_processo" name="campo_numero_processo" class="form-control input-lg" placeholder="Número do Processo" tabindex="1">';
        $('#input_numero_processo').html(saida);
        $("#campo_numero_processo").mask(mascara);
      }else if(tribunal=="T. Superior Eleitoral"){
        //mascara = ""
        saida = '<input type="text" id="campo_numero_processo" name="campo_numero_processo" class="form-control input-lg" placeholder="Número do Processo" tabindex="1">';
        $('#input_numero_processo').html(saida);
        //$("#campo_numero_processo").mask(mascara);
      }else if(tribunal=="T. Regional Eleitoral"){
        //mascara = ""
        saida = '<input type="text" id="campo_numero_processo" name="campo_numero_processo" class="form-control input-lg" placeholder="Número do Processo" tabindex="1">';
        $('#input_numero_processo').html(saida);
        //$("#campo_numero_processo").mask(mascara);
      }else if(tribunal=="T. Regional Federal 5º Regiao"){
        //mascara = "99.999/9999";
        saida = '<input type="text" id="campo_numero_processo" name="campo_numero_processo" class="form-control input-lg" placeholder="Número do Processo" tabindex="1">';
        $('#input_numero_processo').html(saida);
        //$("#campo_numero_processo").mask(mascara);
      }
  
}

