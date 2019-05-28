<?php

include "../conexion.php";

$sql1= "select * from movimientos";
$queryi = $con->query($sql1);
?>

<?php if($queryi->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Orden Compra</th>
	<th>Cedula</th>
	<th>Nit Provedor</th>
	<th>Fecha</th>
	<th>Producto</th>
	<th>Valor</th>
	<th>Forma de pago</th>
	<th>Comprobante</th>
	<th></th>
</thead>
<?php while ($r=$queryi->fetch_array()):?>
<tr>
	<td><?php echo $r["ordenCompra"]; ?></td>
	<td><?php echo $r["cedula"]; ?></td>
	<td><?php echo $r["nitProvedor"]; ?></td>
	<td><?php echo $r["fecha"]; ?></td>
	<td><?php echo $r["productoOC"]; ?></td>
	<td><?php echo $r["valorOC"]; ?></td>
	<td><?php echo $r["Fpago"]; ?></td>
	<td><?php echo $r["comprobanteOC"]; ?></td>
	<td style="width:150px;">
		<a data-id="<?php echo $r["ordenCompra"];?>" class="btn btn-edit btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["ordenCompra"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["ordenCompra"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./movimientos/eliminar.php","ordenCompra="+<?php echo $r["ordenCompra"];?>,function(data){
					loadTabla();
				});
			}

		});
		</script>
	</td>
</tr>
<?php endwhile;?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
  <!-- Modal -->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");

  		$.get("./movimientos/formulario.php","ordenCompra="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->