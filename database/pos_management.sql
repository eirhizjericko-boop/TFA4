CREATE DATABASE IF NOT EXISTS pos_management
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_general_ci;

USE pos_management;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS customers;

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    avatar VARCHAR(255),
    created_at DATETIME NOT NULL
);

INSERT INTO customers (full_name, email, created_at) VALUES
('Maria Santos', 'maria@example.com', '2026-01-15 09:00:00'),
('Juan Dela Cruz', 'juan@example.com', '2026-01-16 10:30:00');

INSERT INTO users (username, full_name, email, avatar, created_at) VALUES
('admin', 'System Administrator', 'admin@example.com', NULL, '2026-01-15 08:00:00'),
('cashier1', 'Ana Reyes', 'ana@example.com', NULL, '2026-01-16 08:30:00');
