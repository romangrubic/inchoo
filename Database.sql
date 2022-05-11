drop database if exists inchoo;
create database inchoo character set utf8mb4;
use inchoo;

create table User(
    id int not null auto_increment,
    username varchar(255) not null,
    email varchar(255) not null,
    password char(60) not null,
    PRIMARY KEY (id),
    UNIQUE (email)
);

create table Photo(
    id int not null auto_increment,
    name varchar(255) not null,
    address varchar(255),
    user_id int not null,
    created_at datetime not null,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) references User(id) on delete cascade
);



