
<html>
	<head>
		<title>.: CRUD :.</title>
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
    <label for="name">Nit</label>
    <input type="text" class="form-control" name="nit" required>
  </div>
  <div class="form-group">
    <label for="lastname">Nombre</label>
    <input type="text" class="form-control" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="address">Direccion</label>
    <input type="text" class="form-control" name="direccion" required>
  </div>
  <div class="form-group">
    <label for="text">Ciudad</label>
    <input type="text" class="form-control" name="ciudad" >
  </div>
  <div class="form-group">
    <label for="phone">Telefono</label>
    <input type="text" class="form-control" name="telefono" >
  </div>

  <div class="form-group">
    <label for="text">Tipo</label>

    <select id="selec"  name="tipo">
        <option value="Extranjero">Extranjero</option>
        <option value="Local">Local</option>
    </select><br>
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

  $.get("./proveedores/tabla.php","",function(data){
    $("#tabla").html(data);
  })

}

$("#buscar").submit(function(e){
  e.preventDefault();
  $.get("./proveedores/busqueda.php",$("#buscar").serialize(),function(data){
    $("#tabla").html(data);
  $("#buscar")[0].reset();
  });
});

loadTabla();


  $("#agregar").submit(function(e){
    e.preventDefault();
    $.post("./proveedores/agregar.php",$("#agregar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });
</script>

	</body>
</html>