DROP TABLE IF EXISTS working_hours, users, locatarios, imobiliarias;

-- Criação da tabela de usuários
CREATE TABLE users (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    role ENUM('admin', 'locatario', 'imobiliaria') NOT NULL
);

-- Criação da tabela de horas trabalhadas
CREATE TABLE working_hours (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6),
    work_date DATE NOT NULL,
    time1 TIME,
    time2 TIME,
    time3 TIME,
    time4 TIME,
    worked_time INT,

    -- Relacionamento com a tabela de usuários
    FOREIGN KEY (user_id) REFERENCES users(id),

    -- Garantir que não haja duplicidade de registros para o mesmo usuário e data
    CONSTRAINT cons_user_day UNIQUE (user_id, work_date)
);

-- Criação da tabela de locatários
CREATE TABLE locatarios (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL
);

-- Criação da tabela de imobiliárias
CREATE TABLE imobiliarias (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    estado VARCHAR(2) NOT NULL,
    responsavel VARCHAR(100) NOT NULL
);

-- Inserindo 10 usuários fictícios
INSERT INTO users (name, password, email, start_date, role)
VALUES
('Admin', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'admin@gmail.com', '2000-01-01', 'admin'),
('Ana', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'ana@gmail.com', '2000-01-01', 'admin'),
('Maria', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'maria@gmail.com', '2000-01-01', 'locatario'),
('João', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'joao@gmail.com', '2000-01-01', 'locatario'),
('Pedro', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'pedro@gmail.com', '2000-01-01', 'locatario'),
('Julia', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'julia@gmail.com', '2000-01-01', 'locatario'),
('Lucas', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'lucas@gmail.com', '2000-01-01', 'locatario'),
('Fernanda', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'fernanda@gmail.com', '2000-01-01', 'locatario'),
('Carlos', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'carlos@gmail.com', '2000-01-01', 'imobiliaria'),
('Ricardo', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'ricardo@gmail.com', '2000-01-01', 'imobiliaria');

-- Inserindo 10 horas de trabalho fictícias
INSERT INTO working_hours (user_id, work_date, time1, time2, time3, time4, worked_time)
VALUES
(1, '2024-11-01', '09:00:00', '10:00:00', '13:00:00', '18:00:00', 8),
(2, '2024-11-01', '08:30:00', '12:30:00', '14:00:00', '17:30:00', 8),
(3, '2024-11-02', '09:00:00', '11:00:00', '13:00:00', '15:00:00', 6),
(4, '2024-11-03', '08:00:00', '10:00:00', '11:30:00', '14:00:00', 6),
(5, '2024-11-04', '09:30:00', '11:00:00', '12:30:00', '16:00:00', 7),
(6, '2024-11-05', '08:30:00', '11:30:00', '14:00:00', '18:00:00', 8),
(7, '2024-11-06', '10:00:00', '12:00:00', '14:00:00', '17:00:00', 7),
(8, '2024-11-07', '09:00:00', '12:00:00', '13:00:00', '18:00:00', 8),
(9, '2024-11-08', '08:30:00', '11:00:00', '13:30:00', '16:30:00', 7),
(10, '2024-11-09', '09:00:00', '12:00:00', '13:00:00', '18:00:00', 8);

-- Inserindo 10 locatários fictícios
INSERT INTO locatarios (nome, endereco, email, telefone)
VALUES
('João da Silva', 'Rua A, 123, Bairro X', 'joao@gmail.com', '1111-1111'),
('Maria Oliveira', 'Rua B, 456, Bairro Y', 'maria@gmail.com', '2222-2222'),
('Carlos Santos', 'Rua C, 789, Bairro Z', 'carlos@gmail.com', '3333-3333'),
('Ana Costa', 'Avenida D, 101, Bairro W', 'ana@gmail.com', '4444-4444'),
('Pedro Lima', 'Travessa E, 202, Bairro V', 'pedro@gmail.com', '5555-5555'),
('Luciana Alves', 'Rua F, 303, Bairro U', 'luciana@gmail.com', '6666-6666'),
('Felipe Martins', 'Rua G, 404, Bairro T', 'felipe@gmail.com', '7777-7777'),
('Roberta Souza', 'Rua H, 505, Bairro S', 'roberta@gmail.com', '8888-8888'),
('Thiago Silva', 'Rua I, 606, Bairro R', 'thiago@gmail.com', '9999-9999'),
('Cláudia Lima', 'Rua J, 707, Bairro Q', 'claudia@gmail.com', '1010-1010');

-- Inserindo 10 imobiliárias fictícias
INSERT INTO imobiliarias (nome, telefone, email, cidade, estado, responsavel)
VALUES
('Imobiliária ABC', '6666-6666', 'abc@imobiliaria.com', 'São Paulo', 'SP', 'José Ferreira'),
('Imobiliária XYZ', '7777-7777', 'xyz@imobiliaria.com', 'Rio de Janeiro', 'RJ', 'Carla Mendes'),
('Imobiliária LMN', '8888-8888', 'lmn@imobiliaria.com', 'Belo Horizonte', 'MG', 'Fernando Souza'),
('Imobiliária OPQ', '9999-9999', 'opq@imobiliaria.com', 'Curitiba', 'PR', 'Mariana Rocha'),
('Imobiliária DEF', '1010-1010', 'def@imobiliaria.com', 'Porto Alegre', 'RS', 'Ricardo Alves'),
('Imobiliária GHI', '1212-1212', 'ghi@imobiliaria.com', 'Florianópolis', 'SC', 'Larissa Costa'),
('Imobiliária JKL', '1313-1313', 'jkl@imobiliaria.com', 'Salvador', 'BA', 'Eduardo Pereira'),
('Imobiliária MNO', '1414-1414', 'mno@imobiliaria.com', 'Fortaleza', 'CE', 'Gabriela Lima'),
('Imobiliária PQR', '1515-1515', 'pqr@imobiliaria.com', 'Recife', 'PE', 'Amanda Martins'),
('Imobiliária STU', '1616-1616', 'stu@imobiliaria.com', 'Manaus', 'AM', 'Vinícius Oliveira');
