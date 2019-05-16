<?php

include "conexion.php";

$sql1= "select * from proovedores";
$queryi = $con->query($sql1);
?>

<?php if($queryi->num_rows>0):?>
<table class="table table-bordered table-hover">
<thead>
	<th>Nit</th>
	<th>Nombre</th>
	<th>Direccion</th>
	<th>Ciudad</th>
	<th>Telefono</th>
	<th>Tipo</th>
	<th></th>
</thead>
<?php while ($r=$queryi->fetch_array()):?>
<tr>
	<td><?php echo $r["nit"]; ?></td>
	<td><?php echo $r["nombre"]; ?></td>
	<td><?php echo $r["direccion"]; ?></td>
	<td><?php echo $r["ciudad"]; ?></td>
	<td><?php echo $r["telefono"]; ?></td>
	<td><?php echo $r["tipo"]; ?></td>
	
	<td style="width:150px;">
		<a data-id="<?php echo $r["nit"];?>" class="btn btn-edit btn-sm btn-warning">Editar</a>
		<a href="#" id="del-<?php echo $r["nit"];?>" class="btn btn-sm btn-danger">Eliminar</a>
		<script>
		$("#del-"+<?php echo $r["nit"];?>).click(function(e){
			e.preventDefault();
			p = confirm("Estas seguro?");
			if(p){
				$.get("./proveedores/eliminar.php","nit="+<?php echo $r["nit"];?>,function(data){
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

  		$.get("./proveedores/formulario.php","nit="+id,function(data){
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