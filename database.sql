CREATE DATABASE lab_mvc;
USE lab_mvc;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100)
);

INSERT INTO students (name, email) VALUES
('Tuan Awh', 'a@gmail.com'),
('Awh', 'awh@gmail.com'),
('Nguyen Dinh Tuan A', 'hahh@gmail.com'),
('Tun Awh', 'jhdhd@gmail.com');
