<?php

if(!empty($_POST)){
	if(isset($_POST["nit"]) &&isset($_POST["nombre"]) &&isset($_POST["direccion"]) &&isset($_POST["telefono"]) &&isset($_POST["ciudad"])){
		if($_POST["nit"]!=""&& $_POST["nombre"]!=""&&$_POST["direccion"]!=""){
			include "conexion.php";
			
			$sql = "INSERT INTO `proovedores`(`nit`, `nombre`, `direccion`, `telefono`, `ciudad`, `tipo`) VALUES (\"$_POST[nit]\",\"$_POST[nombre]\",\"$_POST[direccion]\",\"$_POST[telefono]\",\"$_POST[ciudad]\",\"$_POST[tipo]\")";
			echo "EHEH";
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