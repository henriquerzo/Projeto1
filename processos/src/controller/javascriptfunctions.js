function validarSenha(){
   
        
        var usuario = $("input[name=usuario]").val();
        var senha = $("input[name=senha]").val();
          

        $.ajax({
          
          type: "POST",
          data: { usuario:usuario, senha:senha },
          dataType: 'text',
          url: "model/model_login.php",
          success: function(result){
            
            if(result == false){
              alert("Usuario ou senha esta incorreto!");
            }else{
              
              location.href="home.php";
            }

          },
          beforeSend: function(){
                $('#loading').css({display:"block"});
            },
              complete: function(msg){
                $('#loading').css({display:"none"});
            }
        });
   
};