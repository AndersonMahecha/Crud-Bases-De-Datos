<?php
include "../conexion.php";

$user_id=null;
$sql1= "select * from productos where id = ".$_GET["id"];
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
    <label for="descripcion">Descripcion</label>
    <input type="text" class="form-control" value="<?php echo $person->descripcion; ?>" name="descripcion" required>
  </div>
  <div class="form-group">
    <label for="linea">Linea</label>
    <input type="text" class="form-control" value="<?php echo $person->linea; ?>" name="linea" required>
  </div>
  <div class="form-group">
    <label for="precio">Precio</label>
    <input type="text" class="form-control" value="<?php echo $person->precio; ?>" name="precio" >
  </div>
  
<input type="hidden" name="id" value="<?php echo $person->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./productos/actualizar.php",$("#actualizar").serialize(),function(data){
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