<?php
include "../conexion.php";

$user_id=null;
$sql1= "select * from comprobante where idCom = ".$_GET["idCom"];
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
    <label for="tipo">Tipo</label>
    <input type="text" class="form-control" value="<?php echo $person->tipo; ?>" name="tipo" required>
  </div>
  <div class="form-group">
    <label for="cuenta">Cuenta</label>
    <input type="text" class="form-control" value="<?php echo $person->cuenta; ?>" name="cuenta" >
  </div>
  
<input type="hidden" name="idCom" value="<?php echo $person->idCom; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./comprobante/actualizar.php",$("#actualizar").serialize(),function(data){
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