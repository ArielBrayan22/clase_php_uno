<?php
 session_start();

 $email = $_POST['email'];
 $password = $_POST['password'];

 require 'conexion.php';

 $sql = mysql_query("SELECT * FROM cuenta WHERE correo = '$email' AND password='$password'");

 $cont =0;
 $ID_cuenta;

 while ($row = mysql_fetch_array($sql)) {
 	$cont++;
 	$ID_cuenta = $row['ID_cuenta'];
 }

 if($cont==1){

 	echo "Cuenta Correcta";
 	 $_SESSION["ID_cuenta"]= $ID_cuenta;
 	 ?>
     <script type="text/javascript">
        window.location="menu_ingreso.php";
     </script>
 	 <?php
 }
 else{
 	echo "<label style='color:red;'> Cuenta Incorrecta !!! Intente de Nuevo </label>";
 }

?>