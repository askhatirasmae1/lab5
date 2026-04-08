DROP DATABASE IF EXISTS gestion_etudiants_pdo;
CREATE DATABASE gestion_etudiants_pdo CHARACTER SET utf8mb4;
USE gestion_etudiants_pdo;

CREATE TABLE filiere (
  id INT AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(16) NOT NULL UNIQUE,
  libelle VARCHAR(100) NOT NULL
);

CREATE TABLE etudiant (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cne VARCHAR(20) NOT NULL UNIQUE,
  nom VARCHAR(80) NOT NULL,
  prenom VARCHAR(80) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  filiere_id INT NOT NULL,
  FOREIGN KEY (filiere_id) REFERENCES filiere(id)
);

INSERT INTO filiere(code, libelle) VALUES
('INFO', 'Informatique'),
('MATH', 'Mathématiques');

INSERT INTO etudiant(cne, nom, prenom, email, filiere_id) VALUES
('CNE0001', 'Durand', 'Alice', 'alice@example.com', 1);