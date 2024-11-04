create database techacademy;
use techacademy;

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
    email varchar(255) UNIQUE,
    senha varbinary(100),
    disciplina_id INT,
    FOREIGN KEY (disciplina_id) REFERENCES Disciplinas(id)
);

-- Tabela Notas
CREATE TABLE Notas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    disciplina_id INT,
    professor_id INT,
    nota1 DECIMAL(4, 2),
    nota2 DECIMAL(4, 2),
    nota3 DECIMAL(4, 2),
    nota4 DECIMAL(4, 2),
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id_aluno),
    FOREIGN KEY (disciplina_id) REFERENCES Disciplinas(id),
    FOREIGN KEY (professor_id) REFERENCES Professores(id)
);

-- Tabela Boletim
CREATE TABLE Boletim (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    ano_letivo INT,
    medial DECIMAL,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id_aluno)
);

-- Tabela Acessos
CREATE TABLE Acessos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    aluno_id INT,
    data_login DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (aluno_id) REFERENCES Alunos(id_aluno)
);

-- Inserindo dados na tabela Alunos
INSERT INTO Alunos (nome, sobrenome, email, senha, data_nascimento, turma, ano_letivo) VALUES 
('João', 'Silva', 'joao.silva@email.com', 'senha123', '2006-04-15', '8A', 2024),
('Maria', 'Oliveira', 'maria.oliveira@email.com', 'senha456', '2005-09-23', '9B', 2024),
('Carlos', 'Santos', 'carlos.santos@email.com', 'senha789', '2007-12-05', '7A', 2024),
('Ana', 'Costa', 'ana.costa@email.com', 'senha321', '2006-06-18', '8A', 2024),
('Beatriz', 'Lima', 'beatriz.lima@email.com', 'senha654', '2005-11-09', '9B', 2024);

-- Inserindo dados na tabela Disciplinas
INSERT INTO Disciplinas (nome_disciplina) VALUES 
('Matemática'),
('Português'),
('Ciências'),
('História'),
('Geografia');

-- Inserindo dados na tabela Professores
INSERT INTO Professores (nome, disciplina_id) VALUES 
('Paulo Mendes', 1),  -- Matemática
('Clara Sousa', 2),    -- Português
('Roberto Pereira', 3),-- Ciências
('Fernanda Lima', 4),  -- História
('Juliana Nunes', 5);  -- Geografia

-- Inserindo dados na tabela Notas
INSERT INTO Notas (aluno_id, disciplina_id, professor_id, nota1, nota2, nota3, nota4) VALUES 
(1, 1, 1, 8.5, 9.0, 7.5, 8.0),  -- Aluno João Silva em Matemática com Paulo Mendes
(1, 2, 2, 7.0, 7.5, 6.5, 8.0),  -- Aluno João Silva em Português com Clara Sousa
(2, 1, 1, 6.0, 5.5, 7.0, 6.5),  -- Aluno Maria Oliveira em Matemática com Paulo Mendes
(2, 3, 3, 9.0, 8.5, 8.0, 9.5),  -- Aluno Maria Oliveira em Ciências com Roberto Pereira
(3, 4, 4, 7.5, 8.0, 8.0, 7.5);  -- Aluno Carlos Santos em História com Fernanda Lima

-- Inserindo dados na tabela Boletim
INSERT INTO Boletim (aluno_id, ano_letivo, medial) VALUES 
(1, 2024, 8.0),  -- Boletim de João Silva
(2, 2024, 7.5),  -- Boletim de Maria Oliveira
(3, 2024, 7.8),  -- Boletim de Carlos Santos
(4, 2024, 8.1),  -- Boletim de Ana Costa
(5, 2024, 8.4);  -- Boletim de Beatriz Lima

-- Inserindo dados na tabela Acessos
INSERT INTO Acessos (aluno_id) VALUES 
(1),  -- Acesso do aluno João Silva
(2),  -- Acesso do aluno Maria Oliveira
(3),  -- Acesso do aluno Carlos Santos
(4),  -- Acesso do aluno Ana Costa
(5);  -- Acesso do aluno Beatriz Lima




select * from alunos;
select aluno_id as Codigo_Aluno, data_login as Dia_e_Hora from acessos;