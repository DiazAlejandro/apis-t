CREATE DATABASE IF NOT EXISTS base_apist;

USE base_apist;

-- -----------------------------------------------------
-- Tabla roels
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rol(
  id_rol INT PRIMARY KEY AUTO_INCREMENT,
  rol VARCHAR(45) NOT NULL
);

-- -----------------------------------------------------
-- Tabla usuarios
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS usuario(
  email VARCHAR(45) PRIMARY KEY,
  pass VARCHAR(40),
  rol_id INT,
  FOREIGN KEY (rol_id) REFERENCES rol(id_rol)
);

-- -----------------------------------------------------
-- Tabla tutor
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tutor(
  curp VARCHAR(18) PRIMARY KEY NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  apellido_p VARCHAR(45) NOT NULL,
  apellido_m VARCHAR(45) NOT NULL,
  parentesco VARCHAR(45) NOT NULL,
  telefono VARCHAR(10) NOT NULL UNIQUE,
  telefono_adicional VARCHAR(10),
  email VARCHAR(45) UNIQUE,
  FOREIGN KEY (email) REFERENCES usuario(email) ON DELETE CASCADE ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Tabla alumno
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS alumno(
  curp VARCHAR(18) PRIMARY KEY NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  apellido_p VARCHAR(45) NOT NULL,
  apellido_m VARCHAR(45) NOT NULL,
  fecha_nac DATE NOT NULL,
  sexo CHAR(1) NOT NULL,
  edad INT NOT NULL,
  telefono VARCHAR(10) NOT NULL UNIQUE,
  medio VARCHAR(45) NOT NULL,
  calle VARCHAR(45) NOT NULL,
  colonia VARCHAR(45) NOT NULL,
  municipio VARCHAR(45) NOT NULL,
  cp VARCHAR(5) NOT NULL,
  estatus VARCHAR(10) NOT NULL,
  tutor_curp VARCHAR(18),
  email VARCHAR(45) NOT NULL,
  FOREIGN KEY (tutor_curp) REFERENCES tutor(curp) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (email) REFERENCES usuario(email) ON DELETE CASCADE ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Tabla instructor
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS instructor(
  curp VARCHAR(18) PRIMARY KEY NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  apellido_p VARCHAR(45) NOT NULL,
  apellido_m VARCHAR(45) NOT NULL,
  telefono VARCHAR(10) NOT NULL,
  correo_electronico VARCHAR(45) NOT NULL
);

-- -----------------------------------------------------
-- Tabla curso
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS curso(
  clave VARCHAR(5) PRIMARY KEY NOT NULL,
  nombre VARCHAR(45) NOT NULL,
  duracion VARCHAR(30) NOT NULL,
  hora TIME NOT NULL,
  periodo_pago VARCHAR(45) NOT NULL,
  costo FLOAT NOT NULL,
  instructor_curp VARCHAR(18) NOT NULL,
  FOREIGN KEY (instructor_curp) REFERENCES instructor(curp) ON DELETE CASCADE ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Tabla inscripcion
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS inscripcion(
  folio VARCHAR(5) PRIMARY KEY NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  alumno_curp VARCHAR(18) NOT NULL,
  curso_clave VARCHAR(5) NOT NULL,
  cumplimiento VARCHAR(25),
  FOREIGN KEY (alumno_curp) REFERENCES alumno(curp) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (curso_clave) REFERENCES curso(clave) ON DELETE CASCADE ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Tabla pago
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS pago(
  folio VARCHAR(5) PRIMARY KEY NOT NULL,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  concepto FLOAT NOT NULL,
  efectivo FLOAT NOT NULL,
  alumno_curp VARCHAR(18) NOT NULL,
  folio_inscripcion VARCHAR(5) NOT NULL,
  FOREIGN KEY (alumno_curp) REFERENCES alumno(curp) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (folio_inscripcion) REFERENCES inscripcion(folio) ON DELETE CASCADE ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Tabla detalle_pago
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS detalle_pago(
  descripcion VARCHAR(45) NOT NULL,
  estado VARCHAR(45) NOT NULL,
  pago_folio VARCHAR(5) NOT NULL,
  inscripcion_folio VARCHAR(5) NOT NULL,
  FOREIGN KEY (pago_folio) REFERENCES pago(folio) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (inscripcion_folio) REFERENCES inscripcion(folio) ON DELETE CASCADE ON UPDATE CASCADE
);

-- -----------------------------------------------------
-- Tabla estado_salud
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estado_salud(
  seguro_med TINYINT NOT NULL,
  servicio VARCHAR(45) NOT NULL,
  num_seguridad VARCHAR(45),
  estado VARCHAR(45) NOT NULL,
  enfermedad VARCHAR(45) NOT NULL,
  covid TINYINT NOT NULL,
  alergias VARCHAR(45) NOT NULL,
  prescripcion VARCHAR(45),
  observaciones VARCHAR(45),
  alumno_curp VARCHAR(18) NOT NULL,
  FOREIGN KEY (alumno_curp) REFERENCES alumno(curp) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO
  rol (id_rol, rol)
VALUES
  (1, "administrador");

INSERT INTO
  rol (id_rol, rol)
VALUES
  (2, "recepcionista");

INSERT INTO
  rol (id_rol, rol)
VALUES
  (3, "alumno");

INSERT INTO
  usuario (email, pass, rol_id)
VALUES
  (
    "admin@hotmail.com",
    "6eeafaef013319822a1f30407a5353f778b59790",
    1
  );

INSERT INTO
  usuario (email, pass, rol_id)
VALUES
  (
    "recepcionista@hotmail.com",
    "6eeafaef013319822a1f30407a5353f778b59790",
    2
  );