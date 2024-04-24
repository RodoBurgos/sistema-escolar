/*Tabla roles*/
CREATE TABLE roles(
    id_roles          INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre            varchar(100) NOT NULL UNIQUE KEY,

    estado            varchar(10),
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL
)ENGINE=InnoDB;

INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('ADMINISTRADOR','ACTIVO','2024-04-16 15:00:10');
INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('DIRECTOR ACADÉMICO','ACTIVO','2024-04-16 15:01:30');
INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('DIRECTOR ADMINISTRATIVO','ACTIVO','2024-04-16 15:02:50');
INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('CONTADOR','ACTIVO','2024-04-16 15:03:20');
INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('SECRETARIA','ACTIVO','2024-04-16 15:03:40');

CREATE TABLE usuarios(
    id_usuarios          INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dni                  varchar(10)NOT NULL,
    nombre               varchar(100) NOT NULL,
    apellido             varchar(100) NOT NULL,
    email                varchar(255) NOT NULL UNIQUE KEY,
    usuario              varchar(100) NOT NULL,
    contrasena           TEXT NOT NULL,
    rol_id               INT(11) NOT NULL,

    estado               varchar(10),
    fyh_creacion         DATETIME NULL,
    fyh_actualizacion    DATETIME NULL,
    FOREIGN KEY (rol_id) REFERENCES roles(id_roles) on delete no action on update cascade
)ENGINE=InnoDB;

/*contraseña es 12345*/
INSERT INTO usuarios(dni,nombre,apellido,email,usuario,contrasena,rol_id,estado,fyh_creacion)
VALUES('41421840','Rodolfo','Burgos','rodo@gmail.com','admin','$2y$10$ewfhWicaUSQYxZMNygx.ru5U2nbtZulkKslGw39w2M3SFEbyLhoWy',1,'Activo','2024-04-13 12:30:00');

CREATE TABLE instituciones(
    id_instituciones         INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre                   varchar(100) NOT NULL,
    direccion                varchar(255) NOT NULL,
    email                    varchar(255) NULL,
    telefono                 varchar(100) NULL,
    celular                  varchar(100) NULL,
    logo                     TEXT NULL,
    usuario_id               INT(11) NOT NULL,

    fyh_creacion             DATETIME NULL,
    fyh_actualizacion        DATETIME NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuarios) on delete no action on update cascade
)ENGINE=InnoDB;

INSERT INTO instituciones(nombre,direccion,email,telefono,celular,logo,usuario_id,fyh_creacion)
VALUES('Dr. Mariano Boedo','Sarmiento 980','escuelamarianoboedo@gmail.com','5100120','3875120100','logo.jpg',1,'2024-04-20 22:20:00');

CREATE TABLE gestiones(
    id_gestiones      INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre            varchar(100) NOT NULL,
    usuario_id        INT(11) NOT NULL,

    estado            varchar(10),
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id_usuarios) on delete no action on update cascade
)ENGINE=InnoDB;

INSERT INTO gestiones(nombre,usuario_id,estado,fyh_creacion) VALUES('GESTIÓN - 2024',1,'ACTIVO','2024-04-22 17:00:10');