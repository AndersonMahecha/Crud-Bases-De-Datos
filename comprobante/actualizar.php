<?php

if(!empty($_POST)){
	if(isset($_POST["idCom"]) &&isset($_POST["descripcion"]) &&isset($_POST["tipo"]) &&isset($_POST["cuenta"])){
		if($_POST["idCom"]!=""&& $_POST["descripcion"]!=""&&$_POST["tipo"]!=""&&$_POST["cuenta"]!=""){
			include "../conexion.php";
			
			$sql = "update comprobante set descripcion=\"$_POST[descripcion]\",tipo=\"$_POST[tipo]\",cuenta=\"$_POST[cuenta]\" where idCom=".$_POST["idCom"];
			$query = $con->query($sql);
			if($query!=null){
				echo  "<script>alert(\"Actualizado exitosamente.\");window.location='../comprobante.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo actualizar.\");window.location='../comprobante.php';</script>";

			}
		}
	}
}


?>
