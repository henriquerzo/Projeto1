function show_processos_usuario(table_array){

	if (table_array.length <= 0){
        $("#tabela_processos_usuario").html("<em>Nenhum processo cadastrado.</em>");
        return false;
    }

    var table = $("#tab_processos");
    table.append('<thead>'
    				+ '<tr>'
    					+ '<th>Processo</th>'
    					+ '<th>Tribunal</th>'
              + '<th>Situação</th>'
              + '<th>Cliente</th>'
              + '<th>Ações</th>'
            	+ '</tr>'
          		+ '</thead>'
          		+ '<tbody id="tab_body"> </tbody>'
              );

    var tab_body = $("#tab_body");

    for (var i = 0; i < table_array.length; i++) {

    	row = table_array[i];

        tab_body.append('<tr>'
              	+ '<td>' + row['numeroProcesso'] + '</td>'
              	+ '<td>' + row['tribunal'] + '</td>'
              	+ '<td>' + row['situacao'] + '</td>'
              	+ '<td>' + row['cliente'] + '</td>'
              	+ '<td width=250>'
                + '<button class="btn btn-danger btn-xs" onClick="atualiza_processo(' + "'" + row['numeroProcesso'] + "'"
                + ',' + "'" + row['tribunal'] + "'" + ","+ "'" + row['situacao'] + "'" +');">Atualizar</button>'
                + ' '
              	+ '<a class="btn btn-info btn-xs" href="detalhes.php?numeroProcesso=' + row['numeroProcesso'] + '">Detalhes</a>'
              	+ ' '
              	+ '<a class="btn btn-primary btn-xs" href="#">Editar</a>'
              	+ ' '
              	+ '<a class="btn btn-danger btn-xs" href="delete.php?id=' + row['id'] + '">Deletar</a>'
              	+ '</td>'
              	+ '</tr>'
                );
    }

    var oTable = $('#tab_processos').dataTable({
        'bPaginate':false,
        'bInfo':false,
        'bFilter': true
        });
      $('#seach_field').keyup(function(){
      oTable.fnFilter( $(this).val() );
      })
}

function show_data_ultima_atualizacao(data_atualizacao){

  $("#data_ultima_atualizacao").html("Ultima atualização: " + data_atualizacao[0]);
  return false;
}