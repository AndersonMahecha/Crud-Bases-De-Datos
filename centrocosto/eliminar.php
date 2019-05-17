<?php

if(!empty($_GET)){
			include "../conexion.php";
			
			$sql = "DELETE FROM centrocosto WHERE id_CC=".$_GET["id_CC"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../proveedores.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../proveedores.php';</script>";

			}
}

?>