CREATE DATABASE AppAlertas;
USE AppAlertas;

CREATE TABLE estacion(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `latitud` varchar(250) NOT NULL,
  `longitud` varchar(250) NOT NULL,
  `icono` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE usuario(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `usuario` varchar(250) NOT NULL,
  `contrasena` varchar(250) NOT NULL,
  `hash` varchar(500) NOT NULL,
  `fecha_registro` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE ciudadano(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `dni` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `num_telefono` varchar(250) NOT NULL,
  `fkusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE serenasgo(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `numero_serie` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `fkestacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE alerta(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `latitud` varchar(250) NOT NULL,
  `longitud` varchar(250) NOT NULL,
  `fecha` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `alerta` varchar(250) NOT NULL,
  `registrada_por` int(11) NOT NULL,
  `atendida_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE serenasgo
ADD CONSTRAINT fksusuario
FOREIGN KEY (fkusuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE serenasgo
ADD CONSTRAINT fkestacion
FOREIGN KEY (fkestacion) REFERENCES estacion(id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE alerta
ADD CONSTRAINT registrada_por
FOREIGN KEY (registrada_por) REFERENCES ciudadano(id) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE ciudadano
ADD CONSTRAINT fkcusuario
FOREIGN KEY (fkusuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE;
