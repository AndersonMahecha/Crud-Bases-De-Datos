<?php

if(!empty($_POST)){
	if(isset($_POST["cedula"]) &&isset($_POST["nitProvedor"]) &&isset($_POST["fecha"]) &&isset($_POST["productoOC"])&&isset($_POST["valorOC"]) &&isset($_POST["Fpago"]) &&isset($_POST["comprobanteOC"])){
		if($_POST["cedula"]!=""&&$_POST["nitProvedor"]!=""&&$_POST["fecha"]!=""&&$_POST["productoOC"]!=""&&$_POST["valorOC"]!=""&&$_POST["Fpago"]!=""&&$_POST["comprobanteOC"]!=""){
			include "../conexion.php";
			
			$sql = "INSERT INTO `movimientos`(`cedula`, `nitProvedor`, `fecha`, `productoOC`, `valorOC`, `Fpago`, `comprobanteOC`) VALUES (\"$_POST[cedula]\",\"$_POST[nitProvedor]\",\"$_POST[fecha]\",\"$_POST[productoOC]\",\"$_POST[valorOC]\",\"$_POST[Fpago]\",\"$_POST[comprobanteOC]\")";

			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Agregado exitosamente.\");window.location='../movimientos.php';</script>";
			}else{
				print($sql);
				//print "<script>alert(\"No se pudo agregar.\");window.location='../movimientos.php';</script>";

			}
		}
	}
	else{
		echo "EEEE";
	}
}



?>