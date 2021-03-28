CREATE DATABASE teams;

USE teams;

CREATE TABLE user (
    user_id int auto_increment,
    user_username varchar(50) NOT NULL,
    user_name varchar(20) NOT NULL,
    user_surname varchar(20) NOT NULL,
    user_image varchar(200),
    user_mail varchar (100) NOT NULL,
    user_password varchar(20) NOT NULL,
    user_team_id int,
    user_rights_id int,
    PRIMARY KEY (user_id),
    FOREIGN KEY (user_team_id) REFERENCES team (team_id),
    FOREIGN KEY (user_rights_id) REFERENCES rights (rights_id)
);

SELECT * FROM user;

INSERT INTO user (user_username, user_name, user_surname, user_mail, user_password, user_team_id, user_rights_id) VALUES
('karin.thuerschmid', 'Karin', 'Thürschmid', 'karin@firma.at', '123', 1, 3),
('gerti.huber', 'Gerti', 'Huber', 'gerti@firma.at', '123', 1, 2),
('michaela.frau', 'Michaela', 'Frau', 'michaela@firma.at', '123', 1, 1);

INSERT INTO user (user_username, user_name, user_surname, user_mail, user_password) VALUES
('karin.thuerschmid', 'Karin', 'Thürschmid', 'karin@firma.at', '123'),
('gerti.huber', 'Gerti', 'Huber', 'gerti@firma.at', '123'),
('michaela.frau', 'Michaela', 'Frau', 'michaela@firma.at', '123');

UPDATE `user` SET `user_team_id` = 10, `user_rights_id` = 3 WHERE `user`.`user_id` = 13;
UPDATE user SET user_team_id = 10, user_rights_id = 2 WHERE user_id = 14;
UPDATE user SET user_team_id = 6, user_rights_id = 1 WHERE user_id = 15;
UPDATE `user` SET `user_rights_id` = 3 WHERE `user_id` = 13;


CREATE TABLE team (
    team_id int auto_increment,
    team_name varchar(50),
    team_color varchar(20),
    PRIMARY KEY (team_id)
);

CREATE TABLE rights (
    rights_id int auto_increment,
    rights_name varchar(20) NOT NULL,
    PRIMARY KEY (rights_id)
);

SELECT * FROM rights;

INSERT INTO rights (rights_name) VALUES ('user'), ('teamlead'), ('admin');

SELECT * FROM team;

INSERT INTO team (team_name, team_color) VALUES
                        ('Sales', 'green'),
                        ('Marketing', 'red'),
                        ('Production', 'blue'),
                        ('Logistics', 'yellow'),
                        ('IT', 'purple');


SELECT user_username, user_name, user_surname, user_image, user_mail, user_password, user_team_id, user_rights_id FROM user WHERE
user_username ='karin.thuerschmid' AND user_password = '123';

SELECT user_name, user_surname, user_username, user_mail, team.team_name, rights.rights_name FROM user
JOIN team ON user.user_team_id = team.team_id
JOIN rights ON rights.rights_id = user.user_rights_id WHERE user_username = 'karin.thuerschmid';

SELECT team.team_name, rights.rights_name FROM user
JOIN team ON user.user_team_id = team.team_id
JOIN rights ON rights.rights_id = user.user_rights_id WHERE user_username = 'karin.thuerschmid';

SELECT * FROM team;

SELECT * FROM user;

ALTER TABLE team ADD team_nicname varchar(50);

UPDATE team SET team_nicname = 'Die Profis', team_color = 'yellow' WHERE team_id = 7;

SELECT team_id, team_name, team_color, team_nicname FROM team;

UPDATE user SET user_username = 'karin.thuerschmid', user_name = 'Karin', user_surname = 'Thürschmid1', user_mail = 'karin@firma.at', user_password = '123', user_team_id = 10, user_rights_id = 3 WHERE user_id = 13;

INSERT INTO user (user_username, user_name, user_surname, user_mail, user_password, user_team_id, user_rights_id) VALUES (
            '". $username ."', '". $name ."', '".$surname."', '".$mail."', '".$password."',' . $team.','.$rights. ');