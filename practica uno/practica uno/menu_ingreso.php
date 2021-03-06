<?php
   session_start();

    if (!empty($_SESSION["ID_cuenta"])) {
       $ID_cuenta = $_SESSION["ID_cuenta"];
    }
    else{
      ?>
     <script type="text/javascript">
        window.location="index.html";
     </script>
     <?php
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title> Pagina </title>
	<link rel="stylesheet" type="text/css" href="librerias/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="librerias/js/jquery.min.js"></script>
	<script type="text/javascript" src="librerias/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="controlador.js"></script>
</head>
<body>

<header>
	<nav class="navbar navbar-default" style="margin: 0px; padding: 0px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"> System </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#"> Inicio <span class="sr-only">(current)</span></a></li>
       
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Session <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"> Perfil </a></li>
            <li><a href="salir.php"> Salir </a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

<!-- Constitucion de un sistema -->

<div class="row" style="margin: 0px; padding: 0px; background: #D8D8D8;">	
        
    <div class="col-lg-6 col-md-6 col-xs-12" style="margin: 0px; padding: 1%; background: #BDBDBD;">
    	<h1 style="margin-top: 0px;"> Formulario </h1>
    	
    	<div class="row">
    		
    		<div class="col-lg-6 col-md-6 col-xs-12">
    		<label for="nombre"> Nombre : </label>
    		<input type="text" name="nombre" id="nombre" class="form-control" placeholder="* Escriba su Nombre">
    		<hr>
    		</div>

    		<div class="col-lg-6 col-md-6 col-xs-12">
    		<label for="apellido"> Apellido: </label>
    		<input type="text" name="apellido" id="apellido" class="form-control" placeholder="* Escriba su Apellido">
    		<hr>
    		</div>

    		<div class="col-lg-6 col-md-6 col-xs-12">
    		<label for="edad"> Edad: </label>
    		<input type="number" name="edad" id="edad" class="form-control" placeholder="* Escriba su Edad" maxlength="3" min="0">
    		<hr>
    		</div>

    		<div class="col-lg-6 col-md-6 col-xs-12">
    		<label for="descripcion"> Descripcion: </label>
    		<textarea name="descripcion" id="descripcion" class="form-control" placeholder="* Escriba su descripcion" rows="1"></textarea>

    		<hr>
    		</div>

    		<div class="col-lg-12 col-md-12 col-xs-12" align="center">
    		 <button class="btn btn-success btn-lg" onclick="btn_registrar();"> Registrar </button>

    		<hr>
    		</div>

    		<div id="panel_respuesta" class="col-lg-12 col-md-12 col-xs-12" align="center">
    		 
    		</div>

    	</div>
    </div>
        <div class="col-lg-6 col-md-6 col-xs-12" style="margin: 0px; padding: 1%; background:;">
    	<h3 style="margin-top: 0px;"> Usuarios Registrados </h3>
      <table class="table table-bordered table-condensed">
        <tr>
        <td>
          <input type="text" name="txt_buscar" id="txt_buscar" placeholder="* Escriba su busqueda" class="form-control" onkeyup="btn_buscar_usuario();">
        </td>
        <td>
           <button class="btn btn-default btn-md" onclick="btn_buscar_usuario();"> Buscar </button>
        </td>
      </td>
        
      </table>
    	<div id="panel_listado_usuarios"></div>
    </div>

</div>

</body>

<!-- Creacion de Modals -->
<div id="myModalVer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Examinar </h4>
      </div>
      <div class="modal-body">
        <p> Examinar el dato </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Creacion de Modals -->
<div id="myModalEditar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Editar Usuario </h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="ID_usuario_edicion">
        <div id="panel_edicion_usuario"></div>
        <div id="panel_respuesta_edicion"></div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-success" data-dismiss="modal" onclick="btn_guardar_usuario();"> Guardar </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
      </div>
    </div>

  </div>
</div>


<!-- Creacion de Modals -->
<div id="myModalEliminar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Examinar </h4>
      </div>
      <div class="modal-body">
        <p> Examinar el dato </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!--<footer style="margin: 0px; padding: 0px;">

<div class="row" style="margin: 0px; padding: 0px;">	
   
    <div class="col-lg-3 col-md-3 col-xs-12"  style="margin: 0px; padding: 0px; background: red;">
    	<h1 style="margin-top: 0px;"> Aside </h1>
    </div>
    
    <div class="col-lg-3 col-md-3 col-xs-12" style="margin: 0px; padding: 0px; background: blue;">
    	<h1 style="margin-top: 0px;"> Center </h1>
    </div>

    <div class="col-lg-3 col-md-3 col-xs-12" style="margin: 0px; padding: 0px; background: orange;">
    	<h1 style="margin-top: 0px;"> Nav </h1>
    </div>

     </div>
        <div class="col-lg-3 col-md-3 col-xs-12" style="margin: 0px; padding: 0px; background: orange;">
    	<h1 style="margin-top: 0px;"> Nav </h1>
    </div>

</div>
</footer> -->
</html>
