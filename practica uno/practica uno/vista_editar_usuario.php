<?php

  $ID_usuario = $_POST['ID_usuario'];

require 'conexion.php';

$sql = mysql_query("SELECT * FROM usuario WHERE ID_usuario='$ID_usuario'");

while ($row = mysql_fetch_array($sql)) {
  
  ?>

   <label for=""> Nombre : <?php echo $row['nombre'];?> </label>
   <input type="text" class="form-control" id="nombre_ed" value="<?php echo $row['nombre'];?>" placeholder="* Escriba el nombre">

    <label for=""> Apellido : <?php echo $row['apellido'];?> </label>
   <input type="text" class="form-control" id="apellido_ed" value="<?php echo $row['apellido'];?>" placeholder="* Escriba el apellido">

    <label for=""> Edad : <?php echo $row['edad'];?> </label>
   <input type="number" class="form-control" id="edad_ed" value="<?php echo $row['edad'];?>" placeholder="* Escriba el edad">

   <label for=""> Descripcion : <?php echo $row['descripcion'];?> </label>
   <textarea class="form-control" id="descripcion_ed" placeholder="Escriba su Descripcion"><?php echo $row['descripcion'];?></textarea>
  

  <?php
}

?>