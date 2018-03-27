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

//funcion de busqueda para usuarios

function btn_buscar_usuario()
{
    var txt_buscar = $("#txt_buscar").val();

    var ob = {txt_buscar:txt_buscar};
    
    $.ajax({
                type: "POST",
                url:"modelo_busqueda_usuario.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 $("#panel_listado_usuarios").html(data);
                
                }
             });

}

function btn_editar_usuario(ID_usuario)
{   
    
    $("#ID_usuario_edicion").val(ID_usuario);
     
    var ob = {ID_usuario:ID_usuario};
    
    $.ajax({
                type: "POST",
                url:"vista_editar_usuario.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 $("#panel_edicion_usuario").html(data);
                
                }
             });    
}

function btn_guardar_usuario()
{  
    var nombre = $("#nombre_ed").val();
    var apellido = $("#apellido_ed").val();
    var edad = $("#edad_ed").val();
    var descripcion = $("#descripcion_ed").val();
    var ID_usuario =  $("#ID_usuario_edicion").val();
        
    //alert(nombre+" - "+apellido+" - "+edad+" - "+descripcion);
    
    var ob = {ID_usuario:ID_usuario, nombre:nombre, apellido:apellido, 
        descripcion:descripcion, edad:edad};
    
    $.ajax({
                type: "POST",
                url:"modelo_editar_usuario.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                
                 $("#nombre").val("");
                 $("#apellido").val("");
                 $("#edad").val("");
                 $("#descripcion").val("");

                 $("#panel_respuesta_edicion").html(data);
                 listar_usuarios();
                 
                }
             });

}