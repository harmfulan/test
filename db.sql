CREATE TABLE IF NOT EXISTS users(
id INT PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255)  NOT NULL,
firstname VARCHAR(255) NOT NULL,
lastname VARCHAR(255),
date_registration DATE
);

CREATE TABLE IF NOT EXISTS infection (
id INT PRIMARY KEY AUTO_INCREMENT,
infections TEXT
);

CREATE TABLE IF NOT EXISTS classvirus (
id INT PRIMARY KEY AUTO_INCREMENT,
habitat TEXT,
algorithm TEXT,
date_create DATE,
id_user INT NOT NULL,
publication BOOLEAN,
CONSTRAINT FK_UserID FOREIGN KEY (id_user)
REFERENCES users (id) ON DELETE CASCADE
ON UPDATE RESTRICT
);

CREATE TABLE IF NOT EXISTS classvirus_infection(
id INT PRIMARY KEY AUTO_INCREMENT,
id_classvirus INT NOT NULL,
id_infection INT NOT NULL
COMMENT 'Таблица связи по способу заражения среды обитания и таблицы классвирус',
CONSTRAINT FK_ClassVirus FOREIGN KEY(id_classvirus)
REFERENCES classvirus(id) ON DELETE CASCADE
ON UPDATE RESTRICT,
CONSTRAINT FK_Infection FOREIGN KEY (id_infection)
REFERENCES infection(id) ON DELETE CASCADE
ON UPDATE RESTRICT
);

SELECT infection.infections, classvirus.habitat, classvirus.algorithm FROM infection
JOIN classvirus_infection ON infection.id=classvirus_infection.id_infection
JOIN classvirus ON classvirus_infection.id_classvirus=classvirus.id;

INSERT INTO users(name, firstname, lastname, date_registration) VALUES ("Петр"," Николаевич","Иванов",'2023-12-05');
INSERT INTO users(name, firstname, lastname, date_registration) VALUES ("Петр"," Николаевич","Иванов", "2023-05-05");

INSERT INTO classvirus( habitat, algorithm, date_create, publication, id_user ) VALUES ("Файловые","Паразитические", "2023-05-05", TRUE, 1);
INSERT INTO classvirus( habitat, algorithm, date_create, publication, id_user ) VALUES ("Загрузочные","Паразитические", "2023-05-05", TRUE, 1);
INSERT INTO classvirus( habitat, algorithm, date_create, publication, id_user ) VALUES ("Файлово-загрузочные","Невидимки", "2023-05-05", TRUE,1);
INSERT INTO classvirus( habitat, algorithm, date_create, publication, id_user ) VALUES ("Драйверные","Мутанты", "2023-05-05", TRUE,2);
INSERT INTO classvirus( habitat, algorithm, date_create, publication, id_user ) VALUES ("Макровирусы","Троянские", "2023-05-05", TRUE,2);

INSERT INTO infection( infections ) VALUES ("Резидентные");
INSERT INTO infection( infections ) VALUES ("Нерезидентные");

INSERT INTO classvirus_infection(id_infection, id_classvirus ) VALUES (1,1);
INSERT INTO classvirus_infection(id_infection, id_classvirus) VALUES (1,2);
INSERT INTO classvirus_infection(id_infection, id_classvirus ) VALUES (1,3);
INSERT INTO classvirus_infection(id_infection, id_classvirus ) VALUES (2,4);
INSERT INTO classvirus_infection(id_infection, id_classvirus) VALUES (2,5);




