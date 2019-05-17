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
		$consulta="create table if not exists comprobante(comprobante varchar(2), primary key(comprobante),descripcion varchar(50),tipo varchar(2),cuenta int)";
		$con->query($consulta);
		$consulta="create table if not exists centroCosto(id_CC int, primary key(id_CC),descripcion varchar(50), cuenta int)";
		$con->query($consulta);
		$consulta="create table movimientos(ordenCompra int, primary key(ordenCompra), cedula int, nitProvedor int)";
		$con->query($consulta);
	}



?>