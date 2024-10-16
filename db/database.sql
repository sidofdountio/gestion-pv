
#######################################################
###                                                 ###
### Author: Dountio                                 ###
### Since: 26-09-2024                               ###
### version: v1.0                                   ###
###                                                 ###  
#######################################################

/**
*  -----------How to use-------------
* Le fichier peut etre executer en utilisant la commande $ source emplacement/fichier/school_db.sql
* On peut egalement copier le script a apartir de la creation des table si une base de donnee existe dejas.
* -------------Info---------------
* Level egale Niveau par exemple niveau 1, 2
* Cyle egale au cyle ex BTS, Ingenieur, Lincense
* option egale a la filliere ex. GSI, CGE
* option. cyle et niveau pourrons etres des tables plus tard.
*/

CREATE DATABASE IF NOT EXISTS appli_pv;

SET NAMES 'UTF8MB4';

USE appli_pv;

DROP TABLE IF EXISTs users;

CREATE TABLE users(
    usersId int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(100),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    image_url       VARCHAR(200) DEFAULT 'https://cdn-icons-png.flaticon.com/512/149/149071.png',
    non_locked      BOOLEAN DEFAULT TRUE,
    CONSTRAINT UQ_Users_Email UNIQUE (email)
) ENGINE = INNODB;

INSERT INTO users(usersId, email, password)
VALUES (1, "admin@gmail.com", "password");


DROP TABLE IF EXISTS Roles;

CREATE TABLE Roles
(
    id              BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    role_name       VARCHAR(50) NOT NULL ,
    user_id         BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY fk_Roles_Users (user_id) REFERENCES Users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT UQ_Roles_Role_name UNIQUE (role_name)
);

DROP TABLE IF EXISTS Student;

CREATE TABLE Student
(
    id              BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name      VARCHAR(50) NOT NULL ,
    last_name       VARCHAR(50) NOT NULL,
    level           VARCHAR(50) NOT NULL,
    _option          VARCHAR(50) NOT NULL,
    cycle           VARCHAR(50) NOT NULL,
    email           VARCHAR(100) NOT NULL,
    gender          VARCHAR(50) NOT NULL CHECK( gender IN ('Male', 'Female')),
    image_url       VARCHAR(200) DEFAULT 'https://cdn-icons-png.flaticon.com/512/149/149071.png',
    created_date    DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT UQ_student_Email UNIQUE (email)
);


SHOW TABLES;

