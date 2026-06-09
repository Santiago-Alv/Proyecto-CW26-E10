

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
    nombre_profesor VARCHAR(60) NOT NULL
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

