create database conex;
use conex;

create table user (
	Id int not null auto_increment primary key, 
	Name varchar(50) not null, 
	Email varchar(50) not null, 
	Password varchar(70) not null, 
	pass varchar(40) not null,
	nivel int
	);


