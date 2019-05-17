<?php

if(!empty($_POST)){
	if(isset($_POST["nombre"]) &&isset($_POST["direccion"]) &&isset($_POST["ciudad"]) &&isset($_POST["telefono"]) &&isset($_POST["tipo"])){
		if($_POST["nombre"]!=""&& $_POST["direccion"]!=""&&$_POST["ciudad"]!=""){
			include "../conexion.php";
			
			$sql = "update proovedores set nombre=\"$_POST[nombre]\",direccion=\"$_POST[direccion]\",telefono=\"$_POST[telefono]\",ciudad=\"$_POST[ciudad]\",tipo=\"$_POST[tipo]\" where nit=".$_POST["nit"];
			$query = $con->query($sql);
			if($query!=null){
				echo  "<script>alert(\"Actualizado exitosamente.\");window.location='../proveedores.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo actualizar.\");window.location='../proveedores.php';</script>";

			}
		}
	}
}



?>