<?php
session_start();

			// Connection info. file
			include 'conexion.php';	
			include 'navbar.php';			
			// data sent from form login.html 
			$email = $_POST['email']; 
			$password = $_POST['password'];
			$result = $con->query("SELECT Email, Password, Name, nivel FROM user WHERE Email = '$email'");
			$row = mysqli_fetch_assoc($result);
			
			// Variable $hash hold the password hash on database
			$hash = $row['Password'];
			
			/* 
			password_Verify() function verify if the password entered by the user
			match the password hash on the database. If everything is OK the session
			is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
			*/
			if (password_verify($_POST['password'], $hash)) {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['name'] = $row['Name'];
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (1 * 3600) ;	
				$_SESSION['level'] = $row['nivel'];
				header("location: index.php");
				return;			
			} else {
				?>
				<div class='alert alert-warning mt-4' role='alert'>
					<p>El email o contraseña se encuentran errados. Intente de nuevo</p>
					<p><a href='index.php'>Login</a></p>
				</div>;
				<?php  
				
				return;
			}	
?>