drop database if exists inchoo;
create database inchoo character set utf8mb4;
use inchoo;

create table User(
    id int not null auto_increment,
    username varchar(255) not null,
    email varchar(255) not null,
    user_password char(60) not null,
    PRIMARY KEY (id),
    UNIQUE (email)
);




