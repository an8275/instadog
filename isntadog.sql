

--
-- Base de données :  `isntadog`
--

-- --------------------------------------------------------


CREATE DATABASE `InstaDog`


CREATE USER 'adminInstaDog'@'localhost' IDENTIFIED WITH 'mysql_native_password' AS 'Inst@D0g';

GRANT ALL PRIVILEGES ON *.* TO 'adminInstaDog'@'localhost';



use `InstaDog`;

create table user(
    id int(10) PRIMARY KEY AUTO_INCREMENT,
    pseudo varchar(32),
    email varchar(32),
    dateDerniereConnexion TIMESTAMP,
    motDePass varchar(255)
    );



create table chien(
    id int(10) PRIMARY KEY AUTO_INCREMENT,
    nom text(32),
    surnom varchar(16),
    sex varchar(10),
    age int(2),
    race text(32),
    photo varchar(128),
    user_id int(10),
    FOREIGN KEY (user_id) REFERENCES user(id)
    );



create TABLE article(
    id int(10) PRIMARY KEY AUTO_INCREMENT,
    img varchar(128), contenu varchar(256),
    dateArticle timestamp,
    chien_id int(10),
    FOREIGN KEY (chien_id) REFERENCES chien(id)
    );


create table commentaire(
    id int(10) PRIMARY KEY AUTO_INCREMENT,
    contenu varchar(256),
    date timestamp,
    user_id int(10),
    article_id int(10),
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (article_id) REFERENCES article(id)
    );







