create database serie_login;

create table user(
    id int(10) auto_increment primary key,
    email varchar(300) not null,
    password varchar(120) not null,
    name varchar(500) not null
);

insert into serie_login(id, email, password, name) values
(1, 'alessandrateles@gmail.com', '123456','Alessandra Teles'),
(2, 'maria@gmail.com', '123456','Maria');