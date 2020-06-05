CREATE DATABASE emprega_manaus;
USE emprega_manaus;

CREATE TABLE usuario (
  nome varchar(100) NOT NULL unique key,
  email varchar(100) NOT NULL unique key,
  senha varchar(100) NOT NULL unique key,
  primary key (email)
);

create table empresa(
	idEmpresa bigint AUTO_INCREMENT,
	cnpj varchar(12) not null,
	nomeEmpresa varchar(50) not null,
    endereco varchar(30) not null,
    dataAbertura date,
    razaoSocial varchar(60),
    ramoAtividade varchar(60),
    situacaoFuncionamento varchar(60),
    celular varchar(12),
    emailUsuario varchar(100),
    PRIMARY KEY (idEmpresa)
);

create table vaga(
	codigo bigint unsigned zerofill not null AUTO_INCREMENT,
    idEmpresa bigint not null,
	nomeAnuncio varchar(50) not null,
    tipoOferta varchar(12) not null,
    bairro varchar(40),
    descricao varchar(900),
    emailContato varchar(60),
    PRIMARY KEY (codigo),
    FOREIGN KEY (idEmpresa) REFERENCES empresa(idEmpresa)
);