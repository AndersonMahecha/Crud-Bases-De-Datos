<?php include "conexion.php";
include "navbar.php";
	

	if (isset($_POST["nitProvedor"])) {
		$result = $con->query("SELECT * FROM `movimientos` WHERE `nitProvedor` = ".$_POST['nitProvedor']);
		table($result);
	}


	
	
	function table( $result ) {
	    $result->fetch_array( MYSQLI_ASSOC );
	    echo '<table class="table table-striped" style="font-size:15px">';
	    tableHead( $result );
	    tableBody( $result );
	    echo '</table>';
	}
	function tableHead( $result ) {
	    echo '<thead>';
	    foreach ( $result as $x ) {
	    echo '<tr>';
	    foreach ( $x as $k => $y ) {
	        echo '<th>' . ucfirst( $k ) . '</th>';
	    }
	    echo '</tr>';
	    break;
	    }
	    echo '</thead>';
	}

	function tableBody( $result ) {
	    echo '<tbody>';
	    foreach ( $result as $x ) {
	    echo '<tr>';
	    foreach ( $x as $y ) {
	        echo '<td>' . $y . '</td>';
	    }
	    echo '</tr>';
	    }
	    echo '</tbody>';
	}

 ?>


