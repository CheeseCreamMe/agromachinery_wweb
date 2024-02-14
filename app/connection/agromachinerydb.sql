CREATE DATABASE agomachinery;

USE agomachinery;

CREATE TABLE categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT
);

CREATE TABLE marca (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    imagen VARCHAR(255)
);

CREATE TABLE producto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(75) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    descripcion TEXT,
    precio_descuento DECIMAL(10, 2),
    imagen VARCHAR(255),
    inventario INT NOT NULL,
    categoria_id INT,
    marca_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id),
    FOREIGN KEY (marca_id) REFERENCES marca(id)
);
CREATE TABLE atributos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE productos_atributos (
    id INT AUTO_INCREMENT,
    producto_id INT NOT NULL,
    atributo_id INT NOT NULL,
    PRIMARY KEY (producto_id, atributo_id),
    FOREIGN KEY (producto_id) REFERENCES producto(id),
    FOREIGN KEY (atributo_id) REFERENCES atributos(id)
);

CREATE TABLE marca_categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    marca_id INT NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (marca_id) REFERENCES marca(id),
    FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);