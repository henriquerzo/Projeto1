  function show_usuarios(table_array){

    if (table_array.length <= 0){
      $("#tabela_processos_usuario").html("<em>Nenhum usuário cadastrado.</em>");
      return false;
    }

    var table = $("#tab_processos");
    table.append('<thead>'
      + '<tr>'
      + '<th style="cursor: pointer; width: 140px;" >ID</th>'
      + '<th style="cursor: pointer; width: 140px;" >Nome</th>'
      + '<th style="cursor: pointer; width: 289px;" >Email</th>'
      + '<th style="cursor: pointer; width: 180px;" >Usuário</th>'
      + '<th style="cursor: pointer; width: 180px;" >Nível</th>'
      + '<th style="cursor: pointer; width: 180px;" >Ativo</th>'
      + '<th>Ações</th>'
      + '</tr>'
      + '</thead>'
      + '<tbody id="tab_body"> </tbody>'
      );

    var tab_body = $("#tab_body");

    for (var i = 0; i < table_array.length; i++) {

     row = table_array[i];
     buttonAtivo = returnButtonAtivo(row['ativo'],row['id']);

      tab_body.append('<tr>'
        + '<td>' + row['id'] + '</td>'
        + '<td>' + row['nome'] + '</td>'
        + '<td>' + row['email'] + '</td>'
        + '<td>' + row['usuario'] + '</td>'
        + '<td>' + row['nivel'] + '</td>'
        + '<td>' + row['ativo'] + '</td>'
        + '<td width=200>'
       + ' '
       + buttonAtivo
       + ' '
       + '<a class="btn btn-danger btn-xs btn-block" onClick="deleteConfirmation(' + row['id'] + ')">Deletar</a>'
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
    { 'bSortable': false, 'aTargets': [ 6 ] },
    { "bSearchable": false, "aTargets": [ 6 ] }
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

function deleteConfirmation(id){
  var x;
  var r=confirm("Você tem certeza que deseja excluir o Usuário?");
  if (r==true) {
    $.ajax({
      type: "POST",
      url: "admin-delete.php",
      data: {"id": id}
    })
    location.reload();
  }
}

function returnButtonAtivo(ativo, rowId) {
  if (ativo == 1) {
    return ('<a class="btn btn-default btn-xs btn-block" onClick="desativarUsuario(' + rowId + ')">Desativar</a>');
  }
  else {
    return ('<a class="btn btn-primary btn-xs btn-block" onClick="ativarUsuario(' + rowId + ')">Ativar</a>');
  }
}

function desativarUsuario(id) {
  $.ajax({
      type: "POST",
      url: "admin-desativar-usuario.php",
      data: {"id": id}
    })
    location.reload();
}

function ativarUsuario(id) {
  $.ajax({
      type: "POST",
      url: "admin-ativar-usuario.php",
      data: {"id": id}
    })
    location.reload();
}