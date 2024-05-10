/*Tabla roles*/
CREATE TABLE roles(
    id_roles          INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre            varchar(100) NOT NULL UNIQUE KEY,

    estado            varchar(10),
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL
)ENGINE=InnoDB;

INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('ADMINISTRADOR','1','2024-04-30 12:00:10');
INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('DIRECTOR ACADÉMICO','1','2024-04-30 12:01:30');
INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('DOCENTE','1','2024-04-30 12:02:50');
INSERT INTO roles(nombre,estado,fyh_creacion) VALUES('ESTUDIANTE','1','2024-04-30 12:03:20');

CREATE TABLE personas(
    id_personas       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    dni               varchar(15) NOT NULL,
    nombre            varchar(100) NOT NULL,
    apellido          varchar(100) NOT NULL,
    direccion         varchar(100) NOT NULL,
    celular           varchar(15) NULL,
    f_nacimiento      DATE NULL,
    profesion         varchar(100) NULL,

    estado            varchar(10),
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL
)ENGINE=InnoDB;

INSERT INTO personas(dni,nombre,apellido,direccion,celular,f_nacimiento,profesion,estado,fyh_creacion) 
VALUES('41421840','Rodolfo Alfredo','Burgos','Pje. Mendoza 955','3875994190','1994-10-07','ANALISTA DE SISTEMA','1','2024-04-30 12:04:40');

CREATE TABLE usuarios(
    id_usuarios          INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id               INT(11) NOT NULL,
    persona_id           INT(11) NOT NULL,
    email                varchar(255) NOT NULL UNIQUE KEY,
    usuario              varchar(100) NOT NULL,
    contrasena           TEXT NOT NULL,

    estado               varchar(10),
    fyh_creacion         DATETIME NULL,
    fyh_actualizacion    DATETIME NULL,
    FOREIGN KEY (rol_id) REFERENCES roles(id_roles) on delete no action on update cascade,
    FOREIGN KEY (persona_id) REFERENCES personas(id_personas) on delete no action on update cascade
)ENGINE=InnoDB;

/*contraseña es 12345*/
INSERT INTO usuarios(rol_id,persona_id,email,usuario,contrasena,estado,fyh_creacion)
VALUES(1,1,'rodo@gmail.com','admin','$2y$10$ewfhWicaUSQYxZMNygx.ru5U2nbtZulkKslGw39w2M3SFEbyLhoWy','1','2024-04-30 12:08:00');

CREATE TABLE administrativos(
    id_administrativos   INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id           INT(11) NOT NULL,

    estado               varchar(10),
    fyh_creacion         DATETIME NULL,
    fyh_actualizacion    DATETIME NULL,
    FOREIGN KEY (persona_id) REFERENCES personas(id_personas) on delete no action on update cascade
)ENGINE=InnoDB;

INSERT INTO administrativos(persona_id,estado,fyh_creacion)
VALUES(1,'1','2024-04-30 12:08:00');

CREATE TABLE docentes(
    id_docentes          INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id           INT(11) NOT NULL,
    especialidad         varchar(100) NULL,
    antiguedad           varchar(10) NULL,

    estado               varchar(10),
    fyh_creacion         DATETIME NULL,
    fyh_actualizacion    DATETIME NULL,
    FOREIGN KEY (persona_id) REFERENCES personas(id_personas) on delete no action on update cascade
)ENGINE=InnoDB;

CREATE TABLE estudiantes(
    id_estudiantes       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id           INT(11) NOT NULL,
    grado_id             INT(11) NOT NULL,
    legajo               varchar(50) NOT NULL,

    estado               varchar(10),
    fyh_creacion         DATETIME NULL,
    fyh_actualizacion    DATETIME NULL,
    FOREIGN KEY (persona_id) REFERENCES personas(id_personas) on delete no action on update cascade,
    FOREIGN KEY (grado_id) REFERENCES grados(id_grados) on delete no action on update cascade
)ENGINE=InnoDB;

CREATE TABLE parentescos(
    id_parentescos       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre               varchar(50) NOT NULL,
    
    estado               varchar(10),
    fyh_creacion         DATETIME NULL,
    fyh_actualizacion    DATETIME NULL
)ENGINE=InnoDB;

CREATE TABLE tutores(
    id_tutores           INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    parentesco_id        INT(11) NOT NULL,
    dni                  varchar(15) NOT NULL,
    nombre               varchar(50) NOT NULL,
    apellido             varchar(50) NOT NULL,
    
    estado               varchar(10),
    fyh_creacion         DATETIME NULL,
    fyh_actualizacion    DATETIME NULL,
    FOREIGN KEY (parentesco_id) REFERENCES parentescos(id_parentescos) on delete no action on update cascade
)ENGINE=InnoDB;

CREATE TABLE estudxtutores(
    id_estudxtutores     INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tutor_id             INT(11) NOT NULL,
    estudiante_id        INT(11) NOT NULL,
    direccion            varchar(100) NOT NULL,
    celular              varchar(15) NULL,
    ocupacion            varchar(100) NULL,

    estado               varchar(10),
    fyh_creacion         DATETIME NULL,
    fyh_actualizacion    DATETIME NULL,
    FOREIGN KEY (tutor_id) REFERENCES tutores(id_tutores) on delete no action on update cascade,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes(id_estudiantes) on delete no action on update cascade
)ENGINE=InnoDB;

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
VALUES('Dr. Mariano Boedo','Sarmiento 980','escuelamarianoboedo@gmail.com','5100120','3875120100','logo.jpg',1,'2024-04-30 12:10:00');

CREATE TABLE gestiones(
    id_gestiones      INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre            varchar(100) NOT NULL,

    estado            varchar(10),
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL
)ENGINE=InnoDB;

INSERT INTO gestiones(nombre,estado,fyh_creacion) VALUES('GESTIÓN - 2024','1','2024-04-30 12:10:10');

CREATE TABLE niveles(
    id_niveles        INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion_id        INT(11) NOT NULL,
    nivel             varchar(100) NOT NULL,
    turno             varchar(100) NOT NULL,

    estado            varchar(10),
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    FOREIGN KEY (gestion_id) REFERENCES gestiones(id_gestiones) on delete no action on update cascade
)ENGINE=InnoDB;

INSERT INTO niveles(gestion_id,nivel,turno,estado,fyh_creacion) VALUES(1,'INICIAL','MAÑANA','1','2024-04-30 12:12:10');

CREATE TABLE grados(
    id_grados        INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nivel_id          INT(11) NOT NULL,
    curso             varchar(100) NOT NULL,
    paralelo          varchar(100) NOT NULL,

    estado            varchar(10),
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    FOREIGN KEY (nivel_id) REFERENCES niveles(id_niveles) on delete no action on update cascade
)ENGINE=InnoDB;

INSERT INTO grados(nivel_id,curso,paralelo,estado,fyh_creacion) VALUES(1,'PRIMERO','A','1','2024-04-30 12:14:10');

CREATE TABLE materias(
    id_materias       INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre            varchar(100) NOT NULL,

    estado            varchar(10),
    fyh_creacion      DATETIME NULL,
    fyh_actualizacion DATETIME NULL
)ENGINE=InnoDB;

INSERT INTO materias(nombre,estado,fyh_creacion) VALUES('LENGUA','1','2024-04-30 12:15:10');