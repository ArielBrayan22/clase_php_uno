<table class="table table-bordered table-condensed table-hover" style="background: white;">
	<thead>
		<td> # </td>
		<td> Nombres </td>
		<td> Apellidos </td>
		<td> Edad </td>
		<td> Descripcion </td>
		<td> </td>
	</thead>
	<tbody>
<?php

echo "Resultados para : <label>"; echo $txt_buscar = $_POST['txt_buscar'];
echo "</label> </br>";

require 'conexion.php';

   $sql = mysql_query("SELECT * FROM `usuario` WHERE nombre LIKE '%$txt_buscar%' OR apellido LIKE '%$txt_buscar%'");
         $i=1;
	    while ($row = mysql_fetch_array($sql)) {
	    
	      ?>
	      <tr>
	      	<td> <?php echo $i; ?></td>
	      	<td> <?php  echo $row['nombre']; ?></td>
	      	<td> <?php  echo $row['apellido']; ?></td>
	      	<td> <?php  echo $row['edad']; ?></td>
	      	<td> <?php  echo $row['descripcion']; ?></td>
	      	<td> 
                <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalVer"> Ver </button>
	      		<button class="btn btn-info btn-xs"> Edicion </button>
	      		<button class="btn btn-danger btn-xs"> Eliminar </button></td>
	      </tr>
	      <?php
	      $i++;
	    }
?>

	</tbody>
</table>