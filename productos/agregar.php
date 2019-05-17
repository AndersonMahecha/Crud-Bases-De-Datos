<?php

if(!empty($_POST)){
	if(isset($_POST["id"]) &&isset($_POST["descripcion"]) &&isset($_POST["linea"]) &&isset($_POST["precio"])){
		if($_POST["id"]!=""&& $_POST["descripcion"]!=""&&$_POST["linea"]!=""&&$_POST["precio"]!=""){
			include "../conexion.php";
			
			$sql = "INSERT INTO `productos`(`id`, `descripcion`, `linea`, `precio`) VALUES (\"$_POST[id]\",\"$_POST[descripcion]\",\"$_POST[linea]\",\"$_POST[precio]\")";
			echo "EHEH";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../proveedores.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../proveedores.php';</script>";

			}
		}
	}
	else{
		echo "EEEE";
	}
}



?>