<?php

if(!empty($_POST)){
	if(isset($_POST["idCom"]) &&isset($_POST["descripcion"]) &&isset($_POST["tipo"]) &&isset($_POST["cuenta"])){
		if($_POST["idCom"]!=""&& $_POST["descripcion"]!=""&&$_POST["tipo"]!=""&&$_POST["cuenta"]!=""){
			include "../conexion.php";
			
			$sql = "INSERT INTO `comprobante`(`idCom`, `descripcion`, `tipo`, `cuenta`) VALUES (\"$_POST[idCom]\",\"$_POST[descripcion]\",\"$_POST[tipo]\",\"$_POST[cuenta]\")";
			echo "EHEH";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../comprobante.php';</script>";
			}else{
				print "<script>alert(\"No se pudo agregar.\");window.location='../comprobante.php';</script>";

			}
		}
	}
	else{
		echo "EEEE";
	}
}



?>