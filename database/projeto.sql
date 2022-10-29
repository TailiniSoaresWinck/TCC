CREATE DATABASE projeto;

use projeto;
CREATE TABLE administrador(
	id int not null auto_increment primary key,
    nome varchar(100),
    email varchar(100),
    senha varchar(50),
    cod_acesso char(8) not null
);
CREATE TABLE cod_acesso(
	id int not null auto_increment primary key,
    codigo char(8) not null 
);
CREATE TABLE curso(
	id int not null auto_increment primary key,
    nome varchar(20)
);

CREATE TABLE matricula(
	id int not null auto_increment primary key,
    codmatricula char(20)
);

CREATE TABLE aluno(
	id int auto_increment not null primary key,
    nome varchar(100),
    email varchar(100),
    senha varchar(50),
    codmatricula char(20)
);

CREATE TABLE empresa(
	id int not null auto_increment primary key,
    nome varchar(50),
    email varchar(100),
    cnpj char(14),
    senha varchar(50)
);

CREATE TABLE experiencia(
	id int not null auto_increment primary key,
    empresa varchar(50),
    cargo varchar(50),
    admissao date,
    demissao date,
    aluno_id int not null, 
    foreign key(aluno_id) references aluno(id)
);

CREATE TABLE formacao(
	id int not null auto_increment primary key,
    instituicao varchar(50),
    nivel varchar(20),
    inicio date,
    fim date,
    curso_id int not null,
    foreign key(curso_id) references curso(id),
     aluno_id int not null, 
    foreign key(aluno_id) references aluno(id)
);

CREATE TABLE curso_complementar(
	id int not null auto_increment primary key,
    curso varchar(50),
    duracao int,
    data date,
	aluno_id int not null, 
    foreign key(aluno_id) references aluno(id)
);


CREATE TABLE curriculo(
	id int not null auto_increment primary key,
    area_profissional varchar(20),
    objetivo tinytext,
    aluno_id int not null,
    experiencia_id int not null,
    formacao_id int not null,
    curso_complementar_id int not null,
    foreign key(aluno_id) references aluno(id),
    foreign key(experiencia_id) references experiencia(id),
    foreign key(formacao_id) references formacao(id),
    foreign key(curso_complementar_id) references curso_complementar(id)
);


CREATE TABLE vaga(
	id int not null auto_increment primary key,
    titulo varchar(20),
    cargo varchar(50),
    descricao tinytext,
    beneficio tinytext,
    exigencia tinytext,
    finalizado boolean,
    empresa_id int not null,
    foreign key(empresa_id) references empresa(id)
);


CREATE TABLE historico_vaga(
	id int not null auto_increment primary key,
    curriculo_id int not null,
    aluno_id int not null,
    vaga_id int not null,
    foreign key(vaga_id) references vaga(id),
    foreign key(aluno_id) references aluno(id),
    foreign key(curriculo_id) references curriculo(id)
);

CREATE TABLE recuperar_senha(
	id int not null auto_increment primary key,
    email varchar(100),
    rash varchar(100),
    status int
);
INSERT INTO cod_acesso(codigo) VALUES (
	'12345678'
);

INSERT INTO curso(nome) VALUES (
	"Informática"
);
INSERT INTO curso(nome) VALUES (
	"Eletrônica"
);
INSERT INTO curso(nome) VALUES (
	"Eletrotécnica"
);
INSERT INTO curso(nome) VALUES (
	"Mecânica"
);
INSERT INTO curso(nome) VALUES (
	"Química"
);
INSERT INTO curso(nome) VALUES (
	"Móveis"
);
INSERT INTO curso(nome) VALUES (
	"Meio Ambiente"
);
INSERT INTO curso(nome) VALUES (
	"Design de Móveis"
);