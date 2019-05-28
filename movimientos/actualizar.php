<?php

if(!empty($_POST)){
	if(isset($_POST["ordenCompra"]) &&isset($_POST["cedula"]) &&isset($_POST["nitProvedor"]) &&isset($_POST["fecha"]) &&isset($_POST["productoOC"])&&isset($_POST["valorOC"]) &&isset($_POST["Fpago"]) &&isset($_POST["comprobanteOC"])){
			include "../conexion.php";
			
			$sql = "update movimientos set cedula=\"$_POST[cedula]\",nitProvedor=\"$_POST[nitProvedor]\",fecha=\"$_POST[fecha]\",productoOC=\"$_POST[productoOC]\",valorOC=\"$_POST[valorOC]\",Fpago=\"$_POST[Fpago]\",comprobanteOC=\"$_POST[comprobanteOC]\" where ordenCompra=".$_POST["ordenCompra"];
			$query = $con->query($sql);
			if($query!=null){
				echo  "<script>alert(\"Actualizado exitosamente.\");window.location='../movimientos.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo actualizar.\");window.location='../movimientos.php';</script>";

			}
		}
	}
}


?>
