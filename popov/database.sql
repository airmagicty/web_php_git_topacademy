CREATE DATABASE Enterprise;
USE Enterprise;

CREATE TABLE Employees (
    login VARCHAR(50) NOT NULL PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    position_id INT NOT NULL,
    FOREIGN KEY (position_id) REFERENCES Positions(id)
);

CREATE TABLE Positions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL
);

-- Добавляем должности
INSERT INTO Positions (title, salary) VALUES ('Manager', 5000.00), ('Developer', 4000.00);

-- Добавляем сотрудников
INSERT INTO Employees (login, password, position_id) VALUES 
('john', 'pass123', 1), 
('alice', 'pass456', 2),
('bob', 'pass789', 1);
