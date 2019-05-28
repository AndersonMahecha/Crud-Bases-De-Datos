<?php

if(!empty($_GET)){
			include "../conexion.php";
			
			$sql = "DELETE FROM movimientos WHERE ordenCompra=".$_GET["ordenCompra"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../movimientos.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../movimientos.php';</script>";

			}
}

?>