<html>
	<head>
		<title>.: CRUD :.</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php include "navbar.php"; ?>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
		<?php 
			if(isset($_SESSION['loggedin'])){
    			if($_SESSION['loggedin'] == false){
    
    
  
		 ?>
		<div class="loginBox" id="logueo">
			<h2>Login</h2>
			<form action="check-login.php" method="post" target="_top">                           	
				<div class="form-group">									
					<input type="email" class="form-control input-lg" name="email" placeholder="Email" required>        
				</div>							
				<div class="form-group">        
					<input type="password" class="form-control input-lg" name="password" placeholder="Password" required>       
				</div>								    
					<button type="submit" class="btn btn-success btn-block">Login</button>
			</form>
			<p><a href="#showForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">Recordar Contraseña</a></p>	
			<div class="collapse" id="showForm">
				<div class='well'>
					<form action="password-recovery.php" method="post">
						<div class="form-group">										
							<input type="email" class="form-control" name="email" placeholder="Ingrese un email valido." required>
						</div>
						<button type="submit" class="btn btn-dark">Recuperar contraseña</button>
					</form>								
				</div>
			</div>
									
			<hr><p>Primera vez? <a data-toggle="modal" href="" data-target="#newModal" title="Crear una cuenta">Crear una cuenta</a>.</p>

		</div>

	<?php }
		else{
			?>
			<div>
				<h2>Bienvenido. <?php echo $_SESSION['name']; ?></h2>
			</div>
			<?php
		}
		}else{?>
			<div class="loginBox" id="logueo">
			<h2>Login</h2>
			<form action="check-login.php" method="post" target="_top">                           	
				<div class="form-group">									
					<input type="email" class="form-control input-lg" name="email" placeholder="Email" required>        
				</div>							
				<div class="form-group">        
					<input type="password" class="form-control input-lg" name="password" placeholder="Password" required>       
				</div>								    
					<button type="submit" class="btn btn-success btn-block">Login</button>
			</form>
			<p><a href="#showForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">Recordar Contraseña</a></p>	
			<div class="collapse" id="showForm">
				<div class='well'>
					<form action="password-recovery.php" method="post">
						<div class="form-group">										
							<input type="email" class="form-control" name="email" placeholder="Ingrese un email valido." required>
						</div>
						<button type="submit" class="btn btn-dark">Recuperar contraseña</button>
					</form>								
				</div>
			</div>
									
			<hr><p>Primera vez? <a data-toggle="modal" href="" data-target="#newModal" title="Crear una cuenta">Crear una cuenta</a>.</p>

		</div>

			<?php

		} ?>
		<div id="newModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4>Crear nuevo usuario</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" action="create-account.php" id="crear">
							<div class="form-group">
							    <label for="name">Nombre</label>
							    <input type="text" class="form-control" name="nombre" required>
						  	</div>
						  	<div class="form-group">
							    <label for="email">Email</label>
							    <input type="email" class="form-control" name="email" required>
						  	</div>
						  	<div class="form-group">
							    <label for="password">Contraseña</label>
							    <input type="password" class="form-control" name="password" required>
						  	</div>
						  	<button type="submit" class="btn btn-default">Crear Cuenta</button>
						</form>
					</div>
					
				</div>
			</div>
		</div>

		<script type="text/javascript">
			/*$("#crear").submit(function(e){
		    e.preventDefault();
		    $.post("create-account.php",$("#crear").serialize(),function(data){
		    });
		    $("#crear")[0].reset();
		    $('#newModal').modal('hide');
		  });*/
		</script>
	</div>
	</div>
	</div>
	</body>
</html>