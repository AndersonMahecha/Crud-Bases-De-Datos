<?php
include "../conexion.php";

$user_id=null;
$sql1= "select * from movimientos where ordenCompra = ".$_GET["ordenCompra"];
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
    <label for="descripcion">Cedula</label>
    <input type="text" class="form-control" value="<?php echo $person->cedula; ?>" name="cedula" required>
  </div>
  <div class="form-group">
    <label for="tipo">Nit Proovedor</label>
    <input type="text" class="form-control" value="<?php echo $person->nitProvedor; ?>" name="nitProvedor" required>
  </div>
  <div class="form-group">
    <label for="cuenta">Fecha</label>
    <input type="text" class="form-control" value="<?php echo $person->fecha; ?>" name="fecha" >
  </div>
  <div class="form-group">
    <label for="cuenta">Producto</label>
    <input type="text" class="form-control" value="<?php echo $person->productoOC; ?>" name="productoOC" >
  </div>
  <div class="form-group">
    <label for="cuenta">Valor</label>
    <input type="text" class="form-control" value="<?php echo $person->valorOC; ?>" name="valorOC" >
  </div>
  <div class="form-group">
    <label for="cuenta">Forma de Pago</label>
    <input type="text" class="form-control" value="<?php echo $person->Fpago; ?>" name="Fpago" >
  </div>
  <div class="form-group">
    <label for="cuenta">Comprobante</label>
    <input type="text" class="form-control" value="<?php echo $person->comprobanteOC; ?>" name="comprobanteOC" >
  </div>
  
<input type="hidden" name="ordenCompra" value="<?php echo $person->ordenCompra; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./movimientos/actualizar.php",$("#actualizar").serialize(),function(data){
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