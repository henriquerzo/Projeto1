  function show_contatos(table_array){

    if (table_array.length <= 0){
      $("#tabela_processos_usuario").html("<em>Nenhuma Mensagem.</em>");
      return false;
    }

    var table = $("#tab_processos");
    table.append('<thead>'
      + '<tr>'
      + '<th style="cursor: pointer; width: 100px;" >ID</th>'
      + '<th style="cursor: pointer; width: 100px;" >Email</th>'
      + '<th style="cursor: pointer; width: 400px;" >Mensagem</th>'
      + '<th style="width: 140px;" >Ações</th>'
      + '</tr>'
      + '</thead>'
      + '<tbody id="tab_body"> </tbody>'
      );

    var tab_body = $("#tab_body");

    for (var i = 0; i < table_array.length; i++) {

     row = table_array[i];

      tab_body.append('<tr>'
        + '<td>' + row['id'] + '</td>'
        + '<td>' + row['email'] + '</td>'
        + '<td>' + row['mensagem'] + '</td>'
        + '<td width=200>'
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
    { 'bSortable': false, 'aTargets': [ 3 ] },
    { "bSearchable": false, "aTargets": [ 3 ] }
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
  var r=confirm("Você tem certeza que deseja excluir a mensagem?");
  if (r==true) {
    $.ajax({
      type: "POST",
      url: "admin-delete-contato.php",
      data: {"id": id}
    })
    location.reload();
  }
}