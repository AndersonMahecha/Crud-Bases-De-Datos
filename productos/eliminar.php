<?php

if(!empty($_GET)){
			include "../conexion.php";
			
			$sql = "DELETE FROM productos WHERE id=".$_GET["id"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../productos.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../productos.php';</script>";

			}
}

?>