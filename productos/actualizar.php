<?php

if(!empty($_POST)){
	if(isset($_POST["id"]) &&isset($_POST["descripcion"]) &&isset($_POST["linea"]) &&isset($_POST["precio"])){
		if($_POST["id"]!=""&& $_POST["descripcion"]!=""&&$_POST["linea"]!=""&&$_POST["precio"]!=""){
			include "../conexion.php";
			
			$sql = "update productos set descripcion=\"$_POST[descripcion]\",linea=\"$_POST[linea]\",precio=\"$_POST[precio]\" where id=".$_POST["id"];
			$query = $con->query($sql);
			if($query!=null){
				echo  "<script>alert(\"Actualizado exitosamente.\");window.location='../productos.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo actualizar.\");window.location='../productos.php';</script>";

			}
		}
	}
}



?>