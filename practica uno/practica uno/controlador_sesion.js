function btn_ingresar_login()
{
  var email = $("#email").val();
  var password = $("#password").val();
  
  if(email!="" && password!="")
  {
  	var ob = {email:email, password:password};

    $.ajax({
                type: "POST",
                url:"modelo_login.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 $("#panel_respuesta_login").html(data);
                 $("#email").val("");
				 $("#password").val("");
				 
 
                }
             });
  }

  else{
     var mensaje = "";
    
     if (password==""){
       	$("#password").focus();
       	 mensaje = mensaje+" Debes escribir un password ";
     }

      if(email==""){
      $("#email").focus();

        mensaje = mensaje+" Debes escribir un email ";
     }
  	 
  	 $("#panel_respuesta_login").html("<label style='color:red;'>"+mensaje+"</label>");
  }
  
}