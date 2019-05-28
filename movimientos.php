

<html>
  <head>
    <title>.: CRUD :.</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
  </head>
  <body>
  <?php include "navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-12">
    <h2>VER ENTRADAS</h2>
<!-- Button trigger modal -->
<form class="form-inline" role="search" id="buscar">
      <div class="form-group">
        <input type="text" name="s" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
  <a data-toggle="modal" href="#newModal" class="btn btn-default">Agregar</a>
    </form>

<br>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar">
  <div class="form-group">
    <label for="name">Orden Compra</label>
    <input type="text" class="form-control" name="ordenCompra" required>
  </div>
  <div class="form-group">
    <label for="lastname">Cedula</label>
    <input type="text" class="form-control" name="cedula" required>
  </div>
  <div class="form-group">
    <label for="address">Nit Proovedor</label>
    <input type="text" class="form-control" name="nitProvedor" required>
  </div>
  <div class="form-group">
    <label for="address">Fecha</label>
    <input type="text" class="form-control" name="fecha" required>
  </div>
  <div class="form-group">
    <label for="text">Producto</label>
    <input type="text" class="form-control" name="productoOC" >
  </div>
  <div class="form-group">
    <label for="address">Valor</label>
    <input type="text" class="form-control" name="valorOC" required>
  </div>
  <div class="form-group">
    <label for="address">Forma de pago</label>
    <input type="text" class="form-control" name="Fpago" required>
  </div>
  <div class="form-group">
    <label for="address">Comprobante</label>
    <input type="text" class="form-control" name="comprobanteOC" required>
  </div>

  <button type="submit" class="btn btn-default">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

<div id="tabla"></div>


</div>
</div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

function loadTabla(){
  $('#editModal').modal('hide');

  $.get("./movimientos/tabla.php","",function(data){
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./movimientos/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./movimientos/agregar.php",$("#agregar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });
</script>

  </body>
</html>