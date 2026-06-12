CREATE TABLE modulo(
    id_modulo INT PRIMARY KEY AUTO_INCREMENT,
    nombre_modulo VARCHAR(30) NOT NULL,
    modulo_activo INT(1) NOT NULL DEFAULT 0
);

INSERT INTO modulo (nombre_modulo, modulo_activo) VALUES 
("SISTEMAS OPERATIVOS", 0), ("PROGRAMACIÓN ESTRUCTURADA", 0), 
("INTRODUCCIÓN A LA COMPUTACIÓN", 0);

CREATE TABLE profesor(
    id_profesor INT PRIMARY KEY AUTO_INCREMENT,
    nombre_profesor VARCHAR(100) NOT NULL,
    apell_pat_prof VARCHAR(30) NOT NULL,
    apell_mat_prof VARCHAR(30),
    numero_trabajador INT UNIQUE KEY NOT NULL,
    correo_institucional VARCHAR(100) NOT NULL,
    contraseña VARCHAR(260)
);

INSERT INTO profesor (nombre_profesor) VALUES 
("ANGIE"), ("CARLOS ALF");


-- Definición de la tabla grupo

CREATE TABLE grupo(
    id_grupo INT PRIMARY KEY AUTO_INCREMENT,
    nombre_grupo CHAR(3) NOT NULL,
    id_profesor INT NOT NULL,
    modulo_activo INT NOT NULL,
    FOREIGN KEY (id_profesor) REFERENCES profesor(id_profesor),
    FOREIGN KEY (modulo_activo) REFERENCES modulo(id_modulo)
); 

INSERT INTO grupo (nombre_grupo, id_profesor, modulo_activo) VALUES 
("61B", 1, 3), ("61D", 2, 3);

-- Definición de la tabla alumno
CREATE TABLE alumno(
    id_alumno INT PRIMARY KEY AUTO_INCREMENT,
    nocta INT NOT NULL, 
    nombre VARCHAR(100) NOT NULL,
    apell_pat_alum VARCHAR(100) NOT NULL,
    apell_mat_alum VARCHAR(100),
    asistencia INT,
    id_grupo INT NOT NULL,
    FOREIGN KEY (id_grupo) REFERENCES grupo(id_grupo),
    ontraseña VARCHAR(260)
);
INSERT INTO alumno(nocta, nombre, asistencia, id_grupo) VALUES 
(324487285, "Juanito Juanito", 10, 1);

-- Definición de la tabla calif_mod (calificacion de modulo)
CREATE TABLE calif_mod(
    id_calif INT PRIMARY KEY AUTO_INCREMENT,
    id_alumno INT NOT NULL,
    id_modulo INT NOT NULL,
    calificacion INT,
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno),
    FOREIGN KEY (id_modulo) REFERENCES modulo(id_modulo)
);
INSERT INTO calif_mod(id_alumno, id_modulo, calificacion) VALUES 
(1, 1, 10);

-- Definición de la tabla asistencia
CREATE TABLE asistencia(
    id_asistencia INT PRIMARY KEY AUTO_INCREMENT,
    id_alumno INT NOT NULL,
    id_modulo INT NOT NULL,
    estatus CHAR(1),
    fecha DATE NOT NULL,
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno),
    FOREIGN KEY (id_modulo) REFERENCES modulo(id_modulo)
);
INSERT INTO asistencia(id_alumno, id_modulo, estatus) VALUES 
(1, 1, "J");

-- Definición de la tabla estado de animo
CREATE TABLE estadodeanimo(
    id_animo INT PRIMARY KEY AUTO_INCREMENT,
    id_alumno INT NOT NULL,
    fecha DATE NOT NULL,
    emocion VARCHAR(10) NOT NULL,
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno),
    FOREIGN KEY (id_modulo) REFERENCES modulo(id_modulo)
);
INSERT INTO estadodeanimo(id_alumno, emocion) VALUES 
(1,"Feliz");

-- Definición de la tabla duda
CREATE TABLE duda(
    id_duda INT PRIMARY KEY AUTO_INCREMENT,
    estado_duda CHAR(2) NOT NULL,
    duda_text VARCHAR(2000) NOT NULL,
    respuesta VARCHAR(2000)  NOT NULL,
    id_alumno INT NOT NULL,
    id_grupo INT NOT NULL,
    id_profesor INT NOT NULL,
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno),
    FOREIGN KEY (id_grupo) REFERENCES grupo(id_grupo),
    FOREIGN KEY (id_profesor) REFERENCES profesor(id_profesor)
);
INSERT INTO duda(id_alumno,id_grupo,id_profesor,estado_duda, duda_text, respuesta) VALUES 
(1, 1, 1, "M","Que es git", "Es un controlador de versiones");


--Tabla que relaciona el formulario inicial con alumno

CREATE TABLE formulario(
    id_formulario INT PRIMARY KEY AUTO_INCREMENT,
    pregunta_1 VARCHAR(50) NOT NULL,
    pregunta_2 CHAR(2) NOT NULL,
    pregunta_3 VARCHAR(500) NOT NULL,
    id_alumno INT NOT NULL
    FOREIGN KEY (id_alumno) REFERENCES alumno(id_alumno)
);

CREATE TABLE administrador(
    id_administrador INT PRIMARY KEY AUTO_INCREMENT,
    nombre_administrador VARCHAR(100),
    apell_pat_admin VARCHAR(30) NOT NULL,
    apell_mat_admin VARCHAR(30),
    numero_trabajador VARCHAR(100),
    correo VARCHAR(150),
    contraseña VARCHAR(260)
);

