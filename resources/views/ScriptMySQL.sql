--TABLA ROL--
CREATE TABLE rol (
  idRol INT(11) PRIMARY KEY,
  rol VARCHAR(10)
);
--TABLA USUARIO--
CREATE TABLE usuario (
  idUsuario INT(11) PRIMARY KEY,
  idRol INT(11),
  username VARCHAR(100),
  password VARCHAR(100),
  FOREIGN KEY (idRol) REFERENCES rol(idRol)
);
--TABLA CATEGORIA--
CREATE TABLE categoria (
  idCategoria INT(11) PRIMARY KEY,
  idUsuario INT(11),
  nombreCategoria VARCHAR(100),
  FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);
--TABLA TIPO MUEBLE--
CREATE TABLE tipomueble (
  idTipoMueble INT(11) PRIMARY KEY,
  nombreMueble VARCHAR(100)
);
--TABLA MARCA--
CREATE TABLE marca (
  idMarca INT(11) PRIMARY KEY,
  idProveedor INT(11),
  nombreMarca VARCHAR(50),
  FOREIGN KEY (idProveedor) REFERENCES proveedor(idProveedor)
);
--TABLA PROVEEDOR--
CREATE TABLE proveedor (
  idProveedor INT(11) PRIMARY KEY,
  direccion VARCHAR(100),
  nombreProveedor VARCHAR(100),
  telefono VARCHAR(100)
);
--TABLA MUEBLE--
CREATE TABLE mueble (
  idMueble INT(11) PRIMARY KEY,
  idCategoria INT(11),
  idMarca INT(11),
  idTipoMueble INT(11),
  precio FLOAT(4, 2),
  FOREIGN KEY (idCategoria) REFERENCES categoria(idCategoria),
  FOREIGN KEY (idMarca) REFERENCES marca(idMarca),
  FOREIGN KEY (idTipoMueble) REFERENCES tipomueble(idTipoMueble)
);
--TABLA BODEGA--
CREATE TABLE bodega (
  idBodega INT(11) PRIMARY KEY,
  idMueble INT(11),
  cantidadMuebles INT(11),
  FOREIGN KEY (idMueble) REFERENCES mueble(idMueble)
);
--TABLA PAGO--
CREATE TABLE pago (
  idPago INT(11) PRIMARY KEY,
  idBodega INT(11),
  tipoPago VARCHAR(25),
  fechaPago DATETIME,
  FOREIGN KEY (idBodega) REFERENCES bodega(idBodega)
);