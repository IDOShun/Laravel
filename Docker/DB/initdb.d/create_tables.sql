DROP SCHEMA IF EXISTS laravel;
CREATE SCHEMA laravel;
USE laravel;


DROP TABLE IF EXISTS Roles;
CREATE TABLE Roles
(
    id      INT(10) PRIMARY KEY AUTO_INCREMENT,
    role    VARCHAR(50) NOT NULL UNIQUE
);

DROP TABLE IF EXISTS Users;
CREATE TABLE Users
(
    id          INT(10) PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(30) NOT NULL,
    email       VARCHAR(50) NOT NULL UNIQUE,
    password    VARCHAR(50) NOT NULL,
    role        INT(10) NOT NULL,
    CRUD        INT(3)  NOT NULL DEFAULT 0,
    created_at  DATETIME NOT NULL,
    FOREIGN KEY role REFERENCES Role(id)
);

DROP TABLE IF EXISTS Products;
CREATE TABLE Products
(
    id          INT(10) PRIMARY KEY AUTO_INCREMENT,
    name        VARCHAR(50) NOT NULL,
    description VARCHAR(200),
    imagePATH   VARCHAR(100) UNIQUE default 'defaultImg.jpg',
    SKU         CHAR(20) UNIQUE NOT NULL,
    created_at    DATETIME NOT NULL
);