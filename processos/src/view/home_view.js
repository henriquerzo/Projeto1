  function show_processos_usuario(table_array){

  	if (table_array.length <= 0){
      $("#tabela_processos_usuario").html("<em>Nenhum processo cadastrado.</em>");
      return false;
    }

    var table = $("#tab_processos");
    table.append('<thead>'
      + '<tr>'
      + '<th style="cursor: pointer; width: 140px;" >Processo</th>'
      + '<th style="cursor: pointer; width: 140px;" >Tribunal</th>'
      + '<th style="cursor: pointer; width: 289px;" >Situação</th>'
      + '<th style="cursor: pointer; width: 140px;" >Cliente</th>'
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
      + '<button class="btn btn-warning btn-xs" onClick="atualiza_processo(' + "'" + row['numeroProcesso'] + "'"
        + ',' + "'" + row['tribunal'] + "'" + ","+ "'" + row['situacao'] + "'" +');">Atualizar</button>'
     + ' '
     + '<a class="btn btn-info btn-xs" href="detalhes.php?numeroProcesso=' + row['numeroProcesso'] + '">Detalhes</a>'
     + ' '
     + '<a class="btn btn-primary btn-xs" href="update.php?id=' + row['id'] + '">Editar</a>'
     + ' '
     + '<a class="btn btn-danger btn-xs" onClick="deleteConfirmation(' + row['id'] + ')">Deletar</a>'
     + '</td>'
     + '</tr>'
     );
   }
   //Implementa Search and Sort
   var oTable = $('#tab_processos').dataTable({
    'bPaginate':false,
    'bInfo':false,
    'bFilter': true,
    "aoColumnDefs": [
    { 'bSortable': false, 'aTargets': [ 4 ] },
    { "bSearchable": false, "aTargets": [ 4 ] }
    ],
    "aaSorting": [[0,'asc']]
  });
   $('#seach_field').keyup(function(){
    oTable.fnFilter( $(this).val() );
  })

   jQuery.fn.dataTableExt.oSort['string-case-asc']  = function(x,y) {
    return ((x < y) ? -1 : ((x > y) ?  1 : 0));
  };

  jQuery.fn.dataTableExt.oSort['string-case-desc'] = function(x,y) {
    return ((x < y) ?  1 : ((x > y) ? -1 : 0));
  };
}

function show_data_ultima_atualizacao(data_atualizacao){

  $("#data_ultima_atualizacao").html("Ultima atualização: " + data_atualizacao[0]);
  return false;
}

function deleteConfirmation(id){
  var x;
  var r=confirm("Você tem certeza que deseja excluir o processo?");
  if (r==true) {
    $.ajax({
      type: "POST",
      url: "delete.php",
      data: {"id": id}
    })
    location.reload();
  }
}