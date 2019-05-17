<?php
include "../conexion.php";

$user_id=null;
$sql1= "select * from proovedores where nit = ".$_GET["nit"];
$query = $con->query($sql1);
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}

  }
?>

<?php if($person!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" value="<?php echo $person->nombre; ?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="direccion">Direccion</label>
    <input type="text" class="form-control" value="<?php echo $person->direccion; ?>" name="direccion" required>
  </div>
  <div class="form-group">
    <label for="ciudad">Ciudad</label>
    <input type="text" class="form-control" value="<?php echo $person->ciudad; ?>" name="ciudad" >
  </div>
  <div class="form-group">
    <label for="phone">Telefono</label>
    <input type="text" class="form-control" value="<?php echo $person->telefono; ?>" name="telefono" >
  </div>
  <div class="form-group">
    <label for="text">Tipo</label>
    <input type="text" class="form-control" value="<?php echo $person->tipo; ?>" name="tipo" >
  </div>
<input type="hidden" name="nit" value="<?php echo $person->nit; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./proveedores/actualizar.php",$("#actualizar").serialize(),function(data){
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