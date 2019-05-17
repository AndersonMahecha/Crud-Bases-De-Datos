<?php

if(!empty($_POST)){
	if(isset($_POST["id"]) &&isset($_POST["descripcion"]) &&isset($_POST["cuenta"])){
		if($_POST["id"]!=""&& $_POST["descripcion"]!=""&&$_POST["cuenta"]!=""){
			include "../conexion.php";
			$sql = "INSERT INTO `centrocosto`(`id_CC`, `descripcion`, `cuenta`) VALUES (\"$_POST[id]\",\"$_POST[descripcion]\",\"$_POST[cuenta]\")";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../proveedores.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../proveedores.php';</script>";

			}
		}
	}
}



?>