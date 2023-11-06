CREATE TABLE funcionario(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    codigo VARCHAR(45),
    nome VARCHAR(45),
    salario VARCHAR(45),
    data_nascimento VARCHAR(45),
    cpf VARCHAR(45),
    senha VARCHAR(45),
    funcao INT

) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;


INSERT INTO funcionario(id, codigo, nome, salario, data_nascimento, cpf, senha, funcao) VALUES
(1, '111', 'girlmar', 4000, '1990-01-01', '123.123.123-12', '123', 1),
(2, '222', 'sophia', 3000, '2000-01-01', '234.234.234.23', '123', 1),
(3, '333', 'samuel', 2000, '1995-01-01', '456.456.456.45', '123', 2),
(4, '444', 'amanda', 4000, '1997-01-01,', '789.789.789-78', '123', 1);


CREATE TABLE funcao(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(45),
    obs TEXT
)ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;


INSERT INTO funcao(id, descricao, obs) VALUES
(1, 'Programador Junior', 'Uma espécie ainda em desenvolvimento, pode acatar erros e falhas surreais'),
(2, 'Analista Pleno', 'Sabe muito'),
(3, 'Testador', 'Surrealista procurador de falhas e bugs, sempre acha alguma coisa totalmente inesperada'),
(4, 'Gerente', 'Independente do conhecimento, está acima de todos');


CREATE TABLE usuario(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    codigo VARCHAR(45),
    nome VARCHAR (45),
    cpf VARCHAR (45),
    senha VARCHAR(45)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;


INSERT INTO usuario (id, codigo, nome, cpf, senha) VALUES (1, '123', 'adm', '123.123.123.12', '123');


CREATE TABLE agenda (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    data DATE,
    hora_inicio TIME,
    hora_fim TIME,
    horas TIME,
    curso VARCHAR(255),
    codigo VARCHAR(45),
    obs TEXT,
    funcionario INT
);