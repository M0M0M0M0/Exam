CREATE DATABASE student_manager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE student_manager;

CREATE TABLE students (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL,
  phone VARCHAR(20),
  address VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
