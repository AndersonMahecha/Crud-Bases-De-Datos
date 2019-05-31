<?php include "conexion.php"; ?>

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
    <label for="Centro costo">Centro costo</label>
    <select name="cedula" >
    <?php 
        $quer = $con->query("SELECT id_CC, descripcion FROM centrocosto WHERE 1");
          if($quer->num_rows>0){
           while ($r=$quer->fetch_array()){


            echo "<option value=".$r['id_CC'].">".$r['descripcion']."</option>";
           }
        }
     ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="nitProvedor">Nit Proovedor</label>
    <select name="nitProvedor" >
    <?php 
        $quer = $con->query("SELECT `nit`, `nombre` FROM `proovedores` WHERE 1");
          if($quer->num_rows>0){
           while ($r=$quer->fetch_array()){


            echo "<option value=".$r['nit'].">".$r['nombre']."</option>";
           }
        }
     ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="date">Fecha</label>
    <input type="date" class="form-control" name="fecha" required>
  </div>
  <div class="form-group">
    <label for="Producto">Producto</label>
    <select name="productoOC" id="combo">
    <?php 
        $quer = $con->query("SELECT `id`, `descripcion`, `precio` FROM `productos` WHERE 1");
          if($quer->num_rows>0){
           while ($r=$quer->fetch_array()){


            echo "<option value=".$r['id'].">".$r['descripcion']."</option>";
            ?>
            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
            <script type="text/javascript">
              $( "#combo" ).change(function() {
                $("#prec").text(<?php echo $r['precio']; ?>);
              });
            </script>
            <?php

           }
        }
     ?>
      
    </select>
  </div>
  <div class="form-group">
    <label for="">Valor</label>
    <input id="prec" type="number" class="form-control" name="valorOC" value="" required>
  </div>
  <div class="form-group">
    <label for="">Forma de pago</label>
    <select name="Fpago">
      <option value="efectivo">Efectivo</option>
      <option value="debito">Debito</option>
      <option value="credito">Credito</option>
    </select>
  </div>
  <div class="form-group">
    <label for="">Comprobante</label>
    <select name="comprobanteOC" >
    <?php 
        $quer = $con->query("SELECT `idCom`, `descripcion` FROM `comprobante` WHERE 1");
          if($quer->num_rows>0){
           while ($r=$quer->fetch_array()){


            echo "<option value=".$r['idCom'].">".$r['descripcion']."</option>";
           }
        }
     ?>
      
    </select>
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
    $("#agregar")[0].reset();
    $('#newModal').modal('hide');
    loadTabla();
  });
</script>

  </body>
</html>