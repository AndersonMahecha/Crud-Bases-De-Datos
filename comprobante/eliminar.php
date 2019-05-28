<?php

if(!empty($_GET)){
			include "../conexion.php";
			
			$sql = "DELETE FROM comprobante WHERE idCom=".$_GET["idCom"];
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Eliminado exitosamente.\");window.location='../comprobante.php';</script>";
			}else{
				print "<script>alert(\"No se pudo eliminar.\");window.location='../comprobante.php';</script>";

			}
}

?>