<?php include "conexion.php"; ?>
  <?php include "navbar.php"; ?>



<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div align="center">
				
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalVentas">Ver Ventas por vendedor</button>
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalProductosOC">Ver Productos por orden de compra</button>
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalOrdenDeCompra">Ver Ordenes Compra</button>
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalOrdenCentro">Ver Ordenes Compra por Centro Costo</button>
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modalMasVendido">Producto mas vendido</button>
			</div>
		</div>
	</div>

	<div id="modalVentas"  class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Ventas de un proveedor</h4>
	      </div>
	      <div class="modal-body">
	      	<form role="form" action="mostrarVentas.php" method="post" id="mostrarVentas">
	      	<label for="nitProvedor">Proovedor</label>
	        <select name="nitProvedor">
			    <?php 
			        $quer = $con->query("SELECT `nit`, `nombre` FROM `proovedores` WHERE 1");
			          if($quer->num_rows>0){
			           while ($r=$quer->fetch_array()){


			            echo "<option value=".$r['nit'].">".$r['nombre']."</option>";
			           }
			        }
			     ?>
      
    		</select>
    		<button type="submit" class="btn btn-default">Buscar</button>
			</form>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div id="modalProductosOC" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Ver Productos por Orden de Compra</h4>
	      </div>
	      <div class="modal-body">
	        <form role="form" action="mostrarOrdenCompra.php" method="post" id="mostrarVentas">
	      	<label for="nitProvedor">Orden De Compra</label>
	        <select name="ordenCompra">
			    <?php 
			        $quer = $con->query("SELECT * FROM `movimientos` WHERE 1");
			          if($quer->num_rows>0){
			           while ($r=$quer->fetch_array()){


			            echo "<option value=".$r['ordenCompra'].">".$r['ordenCompra']."</option>";
			           }
			        }
			     ?>
      
    		</select>
    		<button type="submit" class="btn btn-default">Buscar</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div id="modalOrdenDeCompra" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Ver Ordenes de compra</h4>
	      </div>
	      <div class="modal-body">
	        <form role="form" action="mostrarOrdenes.php" method="post" id="mostrarVentas">
	      	<div class="form-group">
			    <label for="date">Fecha inicial</label>
			    <input type="date" class="form-control" name="fechaI" required>
		  	</div>
		  	<div class="form-group">
			    <label for="date">Fecha final</label>
			    <input type="date" class="form-control" name="fechaF" required>
		  	</div>
		  	<button type="submit" class="btn btn-default">Buscar</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div id="modalOrdenCentro" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
	        <form role="form" action="mostrarOrdenCentro.php" method="post" id="mostrarVentas">
	      	<label for="Centro Costo">Centro costo</label>
	        <select name="centrocosto">
			    <?php 
			        $quer = $con->query("SELECT * FROM `centrocosto` WHERE 1");
			          if($quer->num_rows>0){
			           while ($r=$quer->fetch_array()){
			            echo "<option value=".$r['id_CC'].">".$r['descripcion']."</option>";
			           }
			        }
			     ?>
      
    		</select>
    		<button type="submit" class="btn btn-default">Buscar</button>
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div id="modalMasVendido" class="modal fade" role="dialog">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Producto Mas Vendido</h4>
	      </div>
	      <div class="modal-body">
	        <form role="form" action="masvendido.php" method="post" id="mostrarVentas">
				<button type="submit" class="btn btn-default">Buscar</button>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div>
		
	</div>
</div>



<script src="bootstrap/js/bootstrap.min.js"></script>
