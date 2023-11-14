
DROP DATABASE IF EXISTS presenceManagement;
create database presenceManagement CHARACTER SET 'utf8';

-- mysql> ALTER USER 'root'@'localhost' IDENTIFIED BY 'Password1/';

-- CREATE USER 'manageUser'@'localhost' IDENTIFIED BY 'managerUser1/';


GRANT ALL PRIVILEGES ON presenceManagement .* TO 'manageUser'@'localhost';
FLUSH PRIVILEGES;

USE presenceManagement;

CREATE TABLE users(
    usersId int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(100),
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE = INNODB;
DESCRIBE users;
INSERT INTO users(usersId, email, password)
VALUES (1, "demo", "passe");
SELECT *
FROM users;
CREATE TABLE choriste(
    choristeId int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    email VARCHAR(40),
    sexe VARCHAR(30),
    addresse VARCHAR(20),
    phone VARCHAR(20),
    company VARCHAR(20),
    image VARCHAR(100)
) ENGINE = INNODB;
DESCRIBE choriste;
INSERT INTO choriste
VALUES (
        1,
        "demo",
        "demo",
        "demo@gmail.com",
        "unknow",
        "unknow",
        "unknow",
        "unknow",
        "unknow"
    );
SELECT *
FROM choriste;
CREATE TABLE presence (
    presesenceId INT(11) NOT NULL AUTO_INCREMENT,
    choristeId INT(11) NOT NULL,
    choristeName VARCHAR(59),
    presentAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(presesenceId)
) ENGINE = INNODB;
ALTER TABLE presence
ADD CONSTRAINT fk_users_presence FOREIGN KEY (choristeId) REFERENCES choriste(choristeId)
ON DELETE CASCADE;

DESCRIBE presence;

INSERT INTO presence (presesenceId,choristeId,choristeName)
VALUES (1, 1,"demo");
SELECT *
FROM presence;
SHOW TABLES;

