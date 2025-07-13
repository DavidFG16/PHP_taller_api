CREATE DATABASE IF NOT EXISTS taller_api;
USE taller_api;


CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);


CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE RESTRICT
);


CREATE TABLE promociones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion TEXT NOT NULL,
    descuento DECIMAL(5, 2) NOT NULL CHECK (descuento >= 0 AND descuento <= 100),
    producto_id INT NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE
);


INSERT INTO categorias (nombre) VALUES
('Electrónica'),
('Ropa'),
('Hogar');


INSERT INTO productos (nombre, precio, categoria_id) VALUES
('Smartphone', 299.99, 1),
('Camiseta', 19.99, 2),
('Sofá', 499.99, 3),
('Laptop', 799.99, 1),
('Lámpara', 39.99, 3);


INSERT INTO promociones (descripcion, descuento, producto_id) VALUES
('Descuento de verano', 20.00, 1),
('Oferta especial', 15.00, 4);