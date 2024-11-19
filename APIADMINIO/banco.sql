CREATE DATABASE adminbd;

USE adminbd;

CREATE TABLE adminbd.enderecos(
    endereco_id int(10) AUTO_INCREMENT PRIMARY KEY,
    rua varchar(300) not null,
    bairro varchar(100) not null,
    numero varchar(10) not null,
    complemento varchar(400)
);

CREATE TABLE adminbd.contatos(
    contato_id int(10) AUTO_INCREMENT PRIMARY KEY,
    telefone varchar(100) not null,
    email varchar(200) not null
);

CREATE TABLE adminbd.condominioo(
    condominioo_id int (10) AUTO_INCREMENT PRIMARY KEY,
    nomecond varchar(100) not null,
    condominioo_endereco_id int(10) not null,
    condominioo_contato_id int(10) not null,
    FOREIGN KEY (condominioo_endereco_id) references enderecos(endereco_id),    
    FOREIGN KEY (condominioo_contato_id) references contatos(contato_id)
);


CREATE TABLE adminbd.condominos (
    condomino_id int (10) AUTO_INCREMENT PRIMARY KEY,
    condnome varchar(100) not null,
    tipo_condomino varchar(50) not null,
    condominos_condominioo_id int(10) not null,
    conjunto varchar(100) not null,
    bloco varchar(20) not null,
    andar varchar(20) not null,
    apartamento varchar(10) not null,
    email_cond varchar (100) not null,
    senha_cond char(20) not null,
    FOREIGN KEY (condominos_condominioo_id) REFERENCES condominioo(condominioo_id)
);

CREATE TABLE adminbd.sindicos (
    sindico_id int (10) AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100) not null,
    tipo_sindico varchar(50),
    sindico_condominioo_id int(10) not null,
    email_sin varchar (100) not null,
    senha_sin varchar(20) not null,
    FOREIGN KEY (sindico_condominioo_id) REFERENCES condominioo(condominioo_id)
);



CREATE TABLE adminbd.comunicados (
    comunicado_id int (10) AUTO_INCREMENT PRIMARY KEY,
    assunto varchar(400),
    conteudo varchar(1500),
    status varchar(100),
    cont_sinalizacoes int,
    hora_enviado time DEFAULT current_timestamp,
    data_enviado date DEFAULT current_timestamp,
    comunicados_sindico_id int(10) not null,
    FOREIGN KEY (comunicados_sindico_id) REFERENCES sindicos(sindico_id)
    
);

CREATE TABLE adminbd.pautas(
    pauta_id int (10) AUTO_INCREMENT PRIMARY KEY,
    assunto varchar (100) not null,
    conteudo varchar (3000) not null,
    status varchar(100),
    pautas_sindico_id int(10)not null,
    FOREIGN KEY (pautas_sindico_id) REFERENCES sindicos(sindico_id)
);


CREATE TABLE adminbd.votacao(
    votacao_id int(10) AUTO_INCREMENT PRIMARY KEY,
    votacao_pauta_id int(10) not null,
    cont_votosim int,
    cont_votonao int,
    FOREIGN KEY (votacao_pauta_id) REFERENCES pautas(pauta_id)
);




INSERT INTO adminbd.enderecos (rua,bairro,numero,complemento) VALUES
('Rua Japurá', 'Dom Pedro','274','Ao lado do Carrefour');

INSERT INTO adminbd.contatos (telefone,email) VALUES
('(92)3624-7347','andira@gmail.com');

INSERT INTO adminbd.condominioo (nomecond,condominioo_endereco_id,condominioo_contato_id) VALUES
('Andira',1, 1);

INSERT INTO adminbd.sindicos (nome,tipo_sindico,email_sin,senha_sin,sindico_condominioo_id) VALUES
('Nicklas Bismark', 'pessoa fisica condômina','nick@gmail.com','123478', 1),
('Alessandra Teles', 'pessoa fisica condômina','ale@.com','123478', 1);

INSERT INTO adminbd.condominos (condnome, tipo_condomino,conjunto,bloco,andar,apartamento,email_cond,senha_cond,condominos_condominioo_id) VALUES
('Nicklas Bismark', 'pessoa fisica condômina','conjunto B','bloco B','2 andar','123','nicklas@gmail.com','123478', 1),
('Alessandra Teles', 'pessoa fisica condômina','conjunto B','bloco B','2 andar','124','alessandra@gmail.com','123478', 1);




select* from condominioo;
select* from enderecos;
select* from contatos;
select* from condominos;
select* from sindicos;
select* from pautas;
select* from comunicados;
select* from votacao;







UPDATE comunicados SET cont_sinalizacoes = cont_sinalizacoes + 1 where comunicado_id = 9;





select pauta_id, assunto, conteudo, status, pautas_sindico_id,cont_votosim, cont_votonao from pautas inner join votacao on pautas.pauta_id = votacao.votacao_pauta_id;

SELECT cont_votosim, cont_votonao from votacao where votacao_pauta_id = 6;

SELECT cont_votosim, cont_votonao from votacao;







drop database adminbd;

drop table condominioo;
drop table enderecos;
drop table contatos;
drop table condominos;
drop table sindicos;
drop table pautas;
drop table comunicados;
drop table votacao;
drop table adminbd.votos;


DELETE FROM comunicados where comunicado_id = 2;
DELETE FROM pautas where pauta_id = 4; 
DELETE FROM votacao where votacao_id = 4 and votacao_pauta_id = 4; 





