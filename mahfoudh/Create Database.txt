CREATE DATABASE school;

USE school;

CREATE TABLE students (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100),
	email VARCHAR(100),
	group_number VARCHAR(50),
	mobile VARCHAR(15),
	parent_mobile VARCHAR(15),
	image VARCHAR(255)
);