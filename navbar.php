<?php
  session_start();
  if(isset($_SESSION['loggedin'])){
    if($_SESSION['loggedin'] == true){
      $nivel = $_SESSION['level'];
      }
    else{
      header("location: index.php");
    }
  }
?>
<nav class="navbar navbar-default" role="navigation">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./"><b>CRUD</b></a>
  </div>
  <div class="collapse navbar-collapse navbar-ex1-collapse">

    <ul class="nav navbar-nav">
      <?php
        if(isset($nivel)) 
        if($nivel==3){
          ?>
          <li><a class="level3" href="proveedores.php">Proveedores</a></li>
          <li><a class="level3" href="centrocosto.php">Centro Costo</a></li>
          <li><a class="level3" href="productos.php">Productos</a></li>
          <?php
        }
       ?>
          <?php 
        if(isset($nivel)) 
        if($nivel>=1){
          ?>
           <li><a class="level1" href="logout.php">Logout</a></li>
          <?php
        }
       ?>
      
    </ul>
  </div>
</div>
</nav>


