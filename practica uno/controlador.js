function btn_registrar()
{
	var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var edad = $("#edad").val();
    var descripcion = $("#descripcion").val();
    	

	//alert(nombre+" - "+apellido+" - "+edad+" - "+descripcion);
    
    var ob = {nombre:nombre, apellido:apellido, descripcion:descripcion, edad:edad};
	
	$.ajax({
                type: "POST",
                url:"modelo.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 $("#panel_respuesta").html(data);
                 listar_usuarios();
                 $("#nombre").val("");
				 $("#apellido").val("");
				 $("#edad").val("");
				 $("#descripcion").val("");

				 setTimeout(function(){
				 	  $("#panel_respuesta").html("");
				 },3000);
                
                }
             });
}

 
$(document).ready(function(){
	listar_usuarios();
});

function listar_usuarios()
{
	 var ob = "";
	
	$.ajax({
                type: "POST",
                url:"modelo_listar.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 $("#panel_listado_usuarios").html(data);
                
                }
             });
}