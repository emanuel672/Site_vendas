create database banco;
use banco;

create table login(id int auto_increment primary key, 
                    Email varchar(50) not null, 
                    senha varchar(200) not null);

create table contato(id int auto_increment primary key, 
                    nome varchar(50) not null, 
                    numero int not null, 
                    mensagem varchar(500) not null);