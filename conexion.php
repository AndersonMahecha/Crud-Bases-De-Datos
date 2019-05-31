<?php
$host="localhost";
$user="user";
$password="rC9AZGcbif9deVhq";
$db="conex";
$con = new mysqli($host,$user,$password,$db);

	if (!$con) 
	{
		die("Connection failed: " . mysqli_connect_error());
	}
	else{
		
		$consulta="create table if not exists proovedores(nit int, primary key(nit), nombre varchar(50), direccion varchar(50), telefono varchar(20), ciudad varchar(30), tipo varchar(2))";
		$con->query($consulta);
		$consulta="create table if not exists productos(id int, primary key(id), descripcion varchar(40), linea int, precio int)";
		$con->query($consulta);
		$consulta="create table if not exists comprobante(idCom int, primary key(comprobante),descripcion varchar(50),tipo varchar(2),cuenta int)";
		$con->query($consulta);
		$consulta="create table if not exists centroCosto(id_CC int, primary key(id_CC),descripcion varchar(50), cuenta int)";
		$con->query($consulta);
		$consulta="CREATE TABLE IF NOT EXISTS `conex`.`movimientos` (
		  `ordenCompra` INT NOT NULL AUTO_INCREMENT,
		  `cedula` INT NULL,
		  `nitProvedor` INT NULL,
		  `fecha` DATE NULL,
		  `productoOC` INT NULL,
		  `valorOC` INT NULL,
		  `Fpago` VARCHAR(30) NULL,
		  `comprobanteOC` int NULL,
		  PRIMARY KEY (`ordenCompra`),
		  INDEX `cedula_idx` (`cedula` ASC) ,
		  INDEX `nitProvedor_idx` (`nitProvedor` ASC) ,
		  INDEX `productoOC_idx` (`productoOC` ASC),
		  INDEX `comprobanteOC_idx` (`comprobanteOC` ASC),
		  CONSTRAINT `cedula`
		    FOREIGN KEY (`cedula`)
		    REFERENCES `conex`.`centrocosto` (`id_CC`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `nitProvedor`
		    FOREIGN KEY (`nitProvedor`)
		    REFERENCES `conex`.`proovedores` (`nit`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `productoOC`
		    FOREIGN KEY (`productoOC`)
		    REFERENCES `conex`.`productos` (`id`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION,
		  CONSTRAINT `comprobanteOC`
		    FOREIGN KEY (`comprobanteOC`)
		    REFERENCES `conex`.`comprobante` (`idCom`)
		    ON DELETE NO ACTION
		    ON UPDATE NO ACTION);";
				$con->query($consulta);
	}



?>