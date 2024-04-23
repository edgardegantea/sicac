create database asesoriasitst24;

use asesoriasitst24;


create table carreras(
	id int not null auto_increment,
	clave varchar(10) not null unique,
	nombre varchar(100) not null unique,
	created_at datetime not null,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);


create table asignaturas(
	id int not null auto_increment,
	clave varchar(10) not null unique,
	nombre varchar(100) not null unique,
	created_at datetime not null,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);


create table asignatura_carrera(
	id int not null auto_increment,
	asignatura int not null,
	carrera int not null,
	constraint fk_ac_asignatura foreign key(asignatura) references asignaturas(id),
	constraint fk_ac_carrera foreign key(carrera) references carreras(id),
	created_at datetime not null,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);


create table perfiles(
	id int not null auto_increment,
	nombre varchar(100) not null unique,
	comentario text null,
	created_at datetime not null,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);


create table usuarios(
	id int not null auto_increment,
	identificador varchar(20) not null unique,
	nombre varchar(50) not null,
	apaterno varchar(50) not null,
	amaterno varchar(50) not null,
	perfil int not null,
	constraint fk_usuario_perfil foreign key (perfil) references perfiles(id),
	email varchar(100) not null unique,
	password varchar(255) not null,
	sexo char(1) not null,
	fecha_nacimiento date not null,
	status boolean default 1,
	created_at datetime not null,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);


create table periodo_academico(
	id int not null auto_increment,
	clave varchar(10) not null unique,
	nombre varchar(100) not null unique,
	created_at datetime not null,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);



create table solicitud_asesoria(
	id int not null auto_increment,
	carrera int not null,
	asignatura int not null,
	asesor int not null,
	periodo_academico int not null,
	constraint fk_sa_asignatura foreign key(asignatura) references asignaturas(id),
	constraint fk_sa_carrera foreign key(carrera) references carreras(id),
	constraint fk_sa_asesor foreign key(asesor) references usuarios(id),
	constraint fk_sa_pacademico foreign key(periodo_academico) references periodo_academico(id),
	fecha date not null,
	hora time not null,
	created_at datetime not null,
	updated_at datetime null,
	deleted_at datetime null,
	primary key(id)
);





























