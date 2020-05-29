CREATE DATABASE ejuri CHARSET=utf8;
USE ejuri;

CREATE TABLE advogado (
    oab BIGINT(10) PRIMARY KEY,
    nome VARCHAR(70) NOT NULL,
    senha VARCHAR(5) NOT NULL
) CHARSET=utf8;

CREATE TABLE juiz (
    cod BIGINT(10) PRIMARY KEY,
    nome VARCHAR(70) NOT NULL,
    comarca VARCHAR(100) NOT NULL,
    senha VARCHAR(5) NOT NULL
) CHARSET=utf8;

CREATE TABLE cliente (
    cpf VARCHAR(15) PRIMARY KEY,
    nome VARCHAR(70) NOT NULL,
    nascimento DATE NOT NULL,
    sexo CHAR NOT NULL,
    estadoCivil CHAR NOT NULL,
    endereco VARCHAR(150) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT 1
) CHARSET=utf8;

CREATE TABLE processo (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    assunto VARCHAR(100) NOT NULL,
    descricao VARCHAR(500) NOT NULL,
    tipoAcao VARCHAR(20) NOT NULL,
    valorHora FLOAT NOT NULL,
    situacao VARCHAR(20) NOT NULL DEFAULT "pendente",
    cpfCliente VARCHAR(15) NOT NULL,
    oabAdvogado BIGINT(10) NOT NULL,
    codJuiz BIGINT(10) NOT NULL
) CHARSET=utf8;

INSERT INTO cliente(cpf,nome,nascimento,sexo,estadoCivil,endereco) VALUES ("040.432.999-80","mateus schwede","1999-04-11",'m','s',"rua ermindo mayrer, 319. feliz - rs");
INSERT INTO advogado(oab,nome,senha) VALUES (03045090,"rogerio silva","111");
INSERT INTO juiz(cod,nome,comarca,senha) VALUES (0903334,"irivaldo santino","feliz","333");
INSERT INTO processo(assunto,descricao,tipoAcao,valorHora,cpfCliente,oabAdvogado,codJuiz) VALUES ("spc","cliente com o nome no spc","constitutivo",120.90,"040.432.999-80",03045090,0903334);