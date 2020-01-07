create database weather;

use weather;

create table cities(
	id int primary key auto_increment not null,
	name varchar(100) null
);

create table forecast(
	id int primary key auto_increment not null,
	forecast varchar(100) null,
	`date` datetime null,
	id_city int not null,
	foreign key (id) references cities(id)
);

SET FOREIGN_KEY_CHECKS = 0; 
truncate table cities;
truncate table forecast;
SET FOREIGN_KEY_CHECKS = 1; 