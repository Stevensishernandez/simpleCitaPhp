CREATE DATABASE Citas;

use Citas;

CREATE TABLE cita(
    cit_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cit_nombre varchar(255) NOT NULL,
    cit_descripcion varchar(255),
    cit_dateInicio datetime,
    cit_dateFinal datetime
);

--DML

INSERT INTO cita(cit_nombre, cit_descripcion, cit_dateInicio, cit_dateFinal ) 
VALUES ('Copa America', 'Final', '21/07/05 20:02:00', '21/07/07 08:02:00' ),
        ('Copa EuroCopa', 'Final', '21/07/01 20:02:00', '21/07/01 08:02:00' ),
        ('Juega la sele', 'Inicio', '21/07/15 20:02:00', '21/07/022 08:02:00' );