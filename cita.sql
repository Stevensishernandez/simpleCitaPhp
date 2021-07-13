CREATE DATABASE Citas;

use Citas;

CREATE TABLE cita(
    cit_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    cit_nombre varchar(255) NOT NULL,
    cit_descripcion varchar(255),
    cit_dateInicio datetime,
    cit_dateFinal datetime
);