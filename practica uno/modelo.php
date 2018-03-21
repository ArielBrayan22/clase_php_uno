<?php

    $nombre = $_POST['nombre'];
    
    $apellido = $_POST["apellido"];
     
    $edad = $_POST["edad"];
     
    $descripcion = $_POST["descripcion"];
     

    require 'conexion.php';

    $sql = mysql_query("INSERT INTO `usuario` (`ID_usuario`, `nombre`, `apellido`, `edad`, `descripcion`) VALUES (NULL, '$nombre', '$apellido', '$edad', '$descripcion')");

    if ($sql!=FALSE) {
    echo "Registro Corecto";
    }

    else{
    	echo "No se Registrar";
    }

?>