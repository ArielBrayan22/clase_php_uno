<?php
    
    $ID_usuario = $_POST['ID_usuario'];
    
    $nombre = $_POST['nombre'];
    
    $apellido = $_POST["apellido"];
     
    $edad = $_POST["edad"];
     
    $descripcion = $_POST["descripcion"];
     

    require 'conexion.php';

    $sql = mysql_query("UPDATE `usuario` SET `nombre` = '$nombre', `apellido` = '$apellido', `edad` = '$edad', `descripcion` = '$descripcion' WHERE `usuario`.`ID_usuario` = '$ID_usuario'");

    
    if ($sql!=FALSE) {
    echo "Edicion Corecto";
    }

    else{
        echo "No se Registrar";
    }


?>