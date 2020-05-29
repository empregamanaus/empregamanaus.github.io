CREATE DATABASE empregos;
USE empregos;

create table empresa(
	idEmpresa int AUTO_INCREMENT,
	cnpj varchar(12) not null unique key,
	nomeEmpresa varchar(50) not null unique key,
    endereco varchar(30) not null,
    dataAbertura date,
    razaoSocial varchar(60) unique key,
    ramoAtividade varchar(60),
    situacaoFuncionamento varchar(60),
    email varchar(40),
    celular varchar(12),
    PRIMARY KEY (idEmpresa)
);

create table vaga(
	codigo bigint unsigned zerofill not null,
    cnpjEmpresa varchar(12) not null,
	nomeAnuncio varchar(50) not null,
    tipoOferta varchar(12) not null,
    nrVagas varchar(30),
    bairro date,
    descricao varchar(900),
    anonima int,
    emailContato varchar(60),
    PRIMARY KEY (codigo),
    FOREIGN KEY (cnpjEmpresa) REFERENCES empresa(cnpj)
);

CREATE TABLE usuario (
  idUser int(11) NOT NULL,
  login varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  senha varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE usuario
  ADD PRIMARY KEY (login),
  ADD UNIQUE KEY email (email),
  ADD UNIQUE KEY senha (senha),
  ADD UNIQUE KEY idUser (idUser);