DROP DATABASE IF EXISTS LORY;
CREATE DATABASE LORY;
USE LORY;
CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY UNIQUE NOT NULL,
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL UNIQUE,
senha VARCHAR(100) NOT NULL
);
CREATE TABLE treinos (
id INT AUTO_INCREMENT PRIMARY KEY UNIQUE NOT NULL,
nome VARCHAR(100) NOT NULL,
nivel VARCHAR(20),
dificuldade INT,
musculoTrabalhado VARCHAR(50),
descricao TEXT,
video VARCHAR(255)
);

INSERT INTO treinos (nome, nivel, dificuldade, musculoTrabalhado, descricao, video) VALUES
('Supino Reto', 'Iniciante', 3, 'Peito', 'Exercício básico para fortalecer o peito.', 'https://youtube.com/exemplo_supino'),
('Agachamento Livre', 'Intermediário', 4, 'Perna', 'Exercício para pernas e glúteos.', 'https://youtube.com/exemplo_agachamento'),
('Remada Curvada', 'Avançado', 5, 'Costas', 'Fortalece costas e bíceps.', 'https://youtube.com/exemplo_remada'),
('Rosca Direta', 'Iniciante', 2, 'Bíceps', 'Exercício para bíceps simples.', 'https://youtube.com/exemplo_rosca'),
('Elevação Lateral', 'Intermediário', 3, 'Ombros', 'Fortalece ombros e deltóides.', 'https://youtube.com/exemplo_elevacao');


SELECT * FROM usuarios;
SELECT * FROM treinos;