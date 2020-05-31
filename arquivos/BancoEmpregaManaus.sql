CREATE DATABASE empregos;
USE empregos;

create table empresa(
	idEmpresa int AUTO_INCREMENT,
	cnpj varchar(12) not null unique key,
	nomeEmpresa varchar(50) not null,
    endereco varchar(30) not null,
    dataAbertura date,
    razaoSocial varchar(60),
    ramoAtividade varchar(60),
    situacaoFuncionamento varchar(60),
    celular varchar(12),
    emailUsuario varchar(100)
    PRIMARY KEY (idEmpresa)
);

#falta colocar emailUsuario no formulário,

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
  login varchar(100) NOT NULL unique key,
  email varchar(100) NOT NULL unique key,
  senha varchar(100) NOT NULL unique key,
  primary key (email)
);
#O usuário vai precisar entrar ou com email ou com senha