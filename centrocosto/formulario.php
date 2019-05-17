<?php
include "../conexion.php";

$user_id=null;
$sql1= "select * from centrocosto where id_CC = ".$_GET["id_CC"];
$query = $con->query($sql1);
$centrocosto = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $centrocosto=$r;
  break;
}

  }
?>

<?php if($centrocosto!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="nombre">Id</label>
    <input type="text" class="form-control" value="<?php echo $centrocosto->id_CC; ?>" name="id_CC" required>
  </div>
  <div class="form-group">
    <label for="direccion">Descripcion</label>
    <input type="text" class="form-control" value="<?php echo $centrocosto->descripcion; ?>" name="descripcion" required>
  </div>
  <div class="form-group">
    <label for="ciudad">Cuenta</label>
    <input type="text" class="form-control" value="<?php echo $centrocosto->cuenta; ?>" name="cuenta" >
  </div>
  <input type="hidden" name="id" value="<?php echo $centrocosto->id_CC; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./centrocosto/actualizar.php",$("#actualizar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    //$("#actualizar")[0].reset();
    $('#editModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  });
</script>

<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>