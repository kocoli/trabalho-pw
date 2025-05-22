CREATE DATABASE IF NOT EXISTS db_otakustore;
USE db_otakustore;

-- Tipos de usuário
CREATE TABLE user_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

-- Usuários
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_type INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(191) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    photo VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(20),
    FOREIGN KEY (id_type) REFERENCES user_types(id)
);

-- Fornecedores
CREATE TABLE suppliers (
    id INT PRIMARY KEY,
    company_name VARCHAR(255),
    cnpj VARCHAR(20),
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);

-- Clientes
CREATE TABLE customers (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES users(id) ON DELETE CASCADE
);

-- Categorias de produtos
CREATE TABLE product_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Produtos
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_category INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_category) REFERENCES product_categories(id)
);

-- Estoque
CREATE TABLE stock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Vendas
CREATE TABLE sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    date DATETIME NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Pagamentos
CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10,2) NOT NULL,
    method VARCHAR(50) NOT NULL,
    status VARCHAR(50) NOT NULL,
    date DATETIME NOT NULL
);

-- Pedidos
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- INSERTS

-- Tipos de usuário
INSERT INTO user_types (name) VALUES
('Fornecedor'),
('Cliente'),
('Administrador'),
('Outro');

-- Usuários
INSERT INTO users (id_type, name, email, password, photo, address, phone) VALUES
(1, 'João Silva', 'joao@email.com', 'hashsenha', 'joao.jpg', 'Rua A, 123', '11999999999'),
(2, 'Maria Santos', 'maria@email.com', 'hashsenha', 'maria.jpg', 'Av B, 456', '11988888888'),
(2, 'Carlos Dromondy', 'sasukeehocara@gmail.com', 'hashsenha', 'sasuke.png', 'Aldeia f, 415', '11977777777'),
(2, 'Juca Tal', 'juca@email.com', 'hashsenha', 'juca.jpg', 'Av c, 641', '11966666666');

-- Fornecedor (João)
INSERT INTO suppliers (id, company_name, cnpj) VALUES
(1, 'Miticas', '12.345.678/0001-90');

-- Clientes (todos os usuários)
INSERT INTO customers (id) VALUES
(1), (2), (3), (4);

-- Categorias de produto
INSERT INTO product_categories (name) VALUES
('Roupas'),
('Colecionáveis'),
('Mangás'),
('Lucky Bags'),
('Papelaria'),
('Produtos importados'),
('Produtos temáticos'),
('Jogos/Brinquedos');

-- Produtos (ajustado com valores válidos para DECIMAL(10,2))
INSERT INTO products (id_category, name, price) VALUES
(1, 'Camiseta Naruto', 24.50),
(2, 'Bonequinho de Zoro', 100.00),
(3, 'Black Clover', 20.00),
(4, 'Surprise One Piece', 19.80),
(5, 'Caneta da Yuri(ddlc)', 500.00),
(6, '餅', 9999999.99),
(7, 'Vestido debutante do Vegeta', 9999999.99), -- valor reduzido para caber no tipo DECIMAL(10,2)
(8, 'Saiko no Sutoka', 234.00);

-- Estoque
INSERT INTO stock (product_id, quantity, unit_price) VALUES
(1, 100, 5.50),
(2, 50, 12.00),
(3, 20, 20.00);

-- Vendas
INSERT INTO sales (product_id, quantity, price, date) VALUES
(1, 10, 55.00, '2025-05-20 10:30:00'),
(3, 2, 40.00, '2025-05-20 11:00:00');

-- Pagamentos
INSERT INTO payments (amount, method, status, date) VALUES
(55.00, 'Cartão de Crédito', 'Pago', '2025-05-20 10:31:00'),
(40.00, 'Boleto', 'Pendente', '2025-05-20 11:05:00');

-- Pedidos
INSERT INTO orders (customer_id, product_id, quantity, total_price) VALUES
(2, 1, 10, 55.00),
(3, 3, 10, 200.00),
(1, 1, 10, 245.00),
(4, 3, 10, 200.00),
(3, 1, 5, 122.50),
(2, 6, 1, 9999999.99);
