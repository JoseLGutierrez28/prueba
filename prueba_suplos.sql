CREATE TABLE procesos (
    id INT(10) AUTO_INCREMENT,
    objeto VARCHAR(100) NOT NULL,
    descripcion VARCHAR(100) NOT NULL,
    moneda VARCHAR(5) NOT NULL,
    presupuesto VARCHAR(10) NOT NULL,
    actividad VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE cronograma (
    id INT(10) AUTO_INCREMENT,
    fechaInicio VARCHAR(15) NOT NULL,
    horaInicio VARCHAR(15) NOT NULL,
    fechaCierre VARCHAR(15) NOT NULL,
    horaCierre VARCHAR(15) NOT NULL,
    estado VARCHAR(15) NOT NULL,
    PRIMARY KEY (id)
);