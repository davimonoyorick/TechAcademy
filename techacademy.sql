-- Criação do Banco de Dados
CREATE DATABASE techacademy;
USE techacademy;

-- Tabela Alunos
CREATE TABLE Alunos (
    id_aluno INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    sobrenome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARBINARY(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    turma VARCHAR(10) NOT NULL,
    ano_letivo INT NOT NULL
);

-- Tabela Disciplinas
CREATE TABLE Disciplinas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_disciplina VARCHAR(50) NOT NULL
);

-- Tabela Professores
CREATE TABLE Professores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(255) UNIQUE,
    senha VARBINARY(100),
    disciplina_id INT,
    FOREIGN KEY (disciplina_id) REFERENCES Disciplinas(id)
);

-- Tabela Notas
CREATE TABLE Notas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    disciplina_id INT,
    professor_id INT,
    nota1 DECIMAL(4, 2) DEFAULT 1,
    nota2 DECIMAL(4, 2) DEFAULT 1,
    nota3 DECIMAL(4, 2) DEFAULT 1,
    nota4 DECIMAL(4, 2) DEFAULT 1,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id_aluno),
    FOREIGN KEY (disciplina_id) REFERENCES Disciplinas(id),
    FOREIGN KEY (professor_id) REFERENCES Professores(id)
);

-- Tabela Boletim


-- Tabela Aluno_disciplina: Alunos matriculados em todas as disciplinas
CREATE TABLE Aluno_disciplina (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    disciplina_id INT,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id_aluno),
    FOREIGN KEY (disciplina_id) REFERENCES Disciplinas(id),
    UNIQUE (aluno_id, disciplina_id) -- Garante que um aluno não seja matriculado duas vezes na mesma disciplina
);

-- Tabela Acessos
CREATE TABLE Acessos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    data_login DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id_aluno)
);

-- Inserções de dados

-- Inserções na tabela Alunos
INSERT INTO Alunos (nome, sobrenome, email, senha, data_nascimento, turma, ano_letivo) VALUES
('João', 'Silva', 'joao.silva@email.com', 'senha123', '2005-04-10', 'A', 2024),
('Maria', 'Oliveira', 'maria.oliveira@email.com', 'senha123', '2006-07-15', 'B', 2024),
('Carlos', 'Santos', 'carlos.santos@email.com', 'senha123', '2005-02-25', 'C', 2024),
('Ana', 'Lima', 'ana.lima@email.com', 'senha123', '2006-08-05', 'A', 2024),
('Beatriz', 'Melo', 'beatriz.melo@email.com', 'senha123', '2005-12-12', 'B', 2024),
('Pedro', 'Ribeiro', 'pedro.ribeiro@email.com', 'senha123', '2006-11-01', 'C', 2024),
('Lucas', 'Almeida', 'lucas.almeida@email.com', 'senha123', '2005-10-20', 'A', 2024),
('Julia', 'Fernandes', 'julia.fernandes@email.com', 'senha123', '2006-03-30', 'B', 2024),
('Fernanda', 'Costa', 'fernanda.costa@email.com', 'senha123', '2005-09-21', 'C', 2024),
('Gabriel', 'Pereira', 'gabriel.pereira@email.com', 'senha123', '2006-05-18', 'A', 2024);

-- Inserções na tabela Disciplinas
INSERT INTO Disciplinas (nome_disciplina) VALUES
('Matemática'), ('Português'), ('História'), ('Geografia'), ('Física'),
('Química'), ('Biologia'), ('Inglês'), ('Educação Física'), ('Artes');

-- Inserções na tabela Professores
INSERT INTO Professores (nome, email, senha, disciplina_id) VALUES
('Marcos Silva', 'marcos.silva@email.com', 'senha123', 1),
('Roberta Costa', 'roberta.costa@email.com', 'senha123', 2),
('Paulo Santos', 'paulo.santos@email.com', 'senha123', 3),
('Fernanda Souza', 'fernanda.souza@email.com', 'senha123', 4),
('Carlos Almeida', 'carlos.almeida@email.com', 'senha123', 5),
('Beatriz Melo', 'beatriz.melo@email.com', 'senha123', 6),
('Juliana Rocha', 'juliana.rocha@email.com', 'senha123', 7),
('Lucas Ferreira', 'lucas.ferreira@email.com', 'senha123', 8),
('Ana Martins', 'ana.martins@email.com', 'senha123', 9),
('Gabriel Oliveira', 'gabriel.oliveira@email.com', 'senha123', 10);

-- Inserindo cada aluno em todas as disciplinas automaticamente na tabela Aluno_disciplina
INSERT INTO Aluno_disciplina (aluno_id, disciplina_id)
SELECT a.id_aluno, d.id
FROM Alunos a, Disciplinas d;

select * from aluno_disciplina;

-- Inserções na tabela Notas (exemplo de notas para cada aluno em cada disciplina)
INSERT INTO Notas (aluno_id, disciplina_id, professor_id, nota1, nota2, nota3, nota4) VALUES
(1, 1, 1, 8.5, 7.0, 9.0, 8.0),
(2, 2, 2, 7.0, 8.0, 6.5, 7.5),
(3, 3, 3, 6.5, 7.0, 7.5, 6.0),
(4, 4, 4, 9.0, 8.5, 9.5, 8.0),
(5, 5, 5, 7.5, 6.5, 7.0, 8.5),
(6, 6, 6, 8.0, 8.0, 7.5, 7.0),
(7, 7, 7, 7.0, 7.5, 8.5, 7.5),
(8, 8, 8, 8.5, 9.0, 8.0, 9.0),
(9, 9, 9, 6.0, 7.5, 7.0, 6.5),
(10, 10, 10, 8.0, 8.5, 9.0, 9.5);

ALTER TABLE Notas ADD UNIQUE KEY (aluno_id);










SELECT 
    a.id_aluno,
    a.nome AS nome_aluno,
    d.id AS id_disciplina,
    d.nome_disciplina,
    p.nome AS professor,
    COALESCE(n.nota1, 0) AS nota1,
    COALESCE(n.nota2, 0) AS nota2,
    COALESCE(n.nota3, 0) AS nota3,
    COALESCE(n.nota4, 0) AS nota4
FROM 
    Aluno_disciplina ad
JOIN 
    Alunos a ON ad.aluno_id = a.id_aluno
JOIN 
    Disciplinas d ON ad.disciplina_id = d.id
LEFT JOIN 
    Notas n ON n.aluno_id = a.id_aluno AND n.disciplina_id = d.id
LEFT JOIN 
    Professores p ON p.id = n.professor_id
ORDER BY 
    a.id_aluno, d.id;

    







