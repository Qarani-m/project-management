create database PROJECT;
use PROJECT;
 create table student_details(
    id int(10) auto_increment,
    name varchar(255) not null unique,
    registration varchar(12) not null unique,
    email varchar(255) not null unique,
    password varchar(255) not null unique,
    primary key(id)
    );
