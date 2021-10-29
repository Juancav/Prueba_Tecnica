-- DROP DATABASE Db_prueba_tecnica;
CREATE DATABASE Db_prueba_tecnica;
use Db_prueba_tecnica;

create table tbl_usuarios(
Usu_Id int not null primary key auto_increment,
Usu_email varchar(100) not null,
Usu_contraseña varchar(500) not null,
Usu_nombres varchar(100) not null,
Usu_apellido varchar(100) not null,
Usu_estado varchar(25) not null default 'ACTIVO',
Usu_rol_usuario varchar(100) not null,
Usu_fecha_registro date not null
)ENGINE=InnoDB;

-- Contraseña desencriptada 'super-admin'
INSERT INTO tbl_usuarios VALUES(0,'john@gmail.com','$2y$10$EshRBlU7E4hEmAOix/tkOOEuT6u3fyLNBDfn30cs3QJzbZB3UepxC','John','Dodoe','ACTIVO','ADMINISTRADOR','2021-10-28');

SELECT * FROM tbl_usuarios;