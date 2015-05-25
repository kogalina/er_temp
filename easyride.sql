CREATE SCHEMA IF NOT EXISTS easyride_db DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE easyride_db;

-- Таблица автомобилей
CREATE TABLE er_cars(
regnumber VARCHAR(20) NOT NULL,
user_id VARCHAR(100) NOT NULL,
brand VARCHAR(50),
model VARCHAR(50),
color VARCHAR(100),
seats INT UNSIGNED NOT NULL,
fuelrate DECIMAL UNSIGNED,
PRIMARY KEY(regnumber)
);

-- Таблица прав доступа
CREATE TABLE IF NOT EXISTS er_access (
  id CHAR(2) NOT NULL,
  descr VARCHAR(255) NOT NULL,
  INDEX (id ASC)
);

-- Таблица пользователей
CREATE TABLE er_users(
email VARCHAR(100) NOT NULL,
us_password VARCHAR(100) NOT NULL,
us_name VARCHAR(100) NOT NULL,
surname VARCHAR(100),
phone VARCHAR(200),
birthday DATE,
gendor CHAR(1),
rate INT UNSIGNED,
photo VARCHAR(255),
cr_date DATETIME NOT NULL,
access VARCHAR(100) NOT NULL,
PRIMARY KEY(email),
UNIQUE INDEX(phone),
CONSTRAINT access_key
    FOREIGN KEY (access)
    REFERENCES er_access (id)   
);

-- Таблица маршрутов
CREATE TABLE IF NOT EXISTS er_roadrout (
  id VARCHAR(15) NOT NULL,
  driver_id VARCHAR(100) NOT NULL,
  start VARCHAR(255) NOT NULL,
  finish VARCHAR(255) NOT NULL,
  terms TEXT,
  auto_id VARCHAR(20) NOT NULL,
  free_seats INT UNSIGNED,
  start_date DATETIME,
  time_trip TIME,
  status VARCHAR(10) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT driverid_key
    FOREIGN KEY (driver_id)
    REFERENCES er_users (email),
  CONSTRAINT car_key
    FOREIGN KEY (auto_id)
    REFERENCES er_cars (regnumber)
);

-- Таблица пассажиров
CREATE TABLE IF NOT EXISTS er_passengers (
  rdrout_id VARCHAR(15) NOT NULL,
  user_id VARCHAR(100) NOT NULL,
  UNIQUE INDEX (user_id ASC),
  CONSTRAINT rout_pass_key
    FOREIGN KEY (rdrout_id)
    REFERENCES er_roadrout (id),
  CONSTRAINT user_key
    FOREIGN KEY (user_id)
    REFERENCES er_users (email)
);

-- Таблица промежуточных пунктов следования
CREATE TABLE IF NOT EXISTS er_routpoints (
  roadrout_id VARCHAR(15) NOT NULL,
  point VARCHAR(255) NULL,
  pointqueue INT NOT NULL,
  INDEX (roadrout_id ASC),
  CONSTRAINT rout_key
    FOREIGN KEY (roadrout_id)
    REFERENCES er_roadrout (id)
);

-- Заполнение таблиц данными
START TRANSACTION;

INSERT INTO er_access(id, descr) VALUES ('am','администратор');
INSERT INTO er_access(id, descr) VALUES ('dr','водитель');
INSERT INTO er_access(id, descr) VALUES ('ps','пассажир');

INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('ivan@i.ua','qwerty','Иван','Петров','+380562334458','1981-02-11','m','1','','2015-02-01 13:10:01','ps');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('kola@i.ua','asdfg','Николай','Басков','+380562445566','1971-07-18','m','10','','2015-01-01 00:00:05','dr');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('john@i.ua','zxcv','Джон','Траволта','+380562556677','1985-10-07','m','15','','2015-03-20 21:32:05','dr');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('alex@i.ua','1234','Алексей','Гагарин','+380562667788','1964-06-21','m','20','','2015-02-23 16:34:17','dr');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('givi@i.ua','ghjkl','Гиви','Бендукидзе','+380562778899','1978-02-13','m','30','','2015-02-03 15:32:12','am');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('den@i.ua','ffvbn','Денис','Простой','+380562889911','1989-11-12','m','18','','2015-01-23 21:34:06','ps');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('mark@i.ua','kmtyg','Марк','Твен','+380562991122','1991-05-11','m','32','','2015-02-07 14:07:18','dr');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('elena@i.ua','edcvbh','Елена','Сотник','+380562112233','1982-12-26','w','1','','2015-03-30 20:33:10','ps');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('olga@i.ua','fgdvd','Ольга','Денисова','+380562223344','1979-03-02','w','1','','2015-03-29 18:32:12','ps');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('piter@i.ua','t1h4u5','Петр','Мазепа','+380562334455','1992-09-13','m','1','','2015-02-21 15:48:02','dr');
INSERT INTO er_users(email, us_password, us_name, surname, phone, birthday, gendor, rate, photo, cr_date, access)
    VALUES ('georg@i.ua','n_llkni','Григорий','Лепс','+380562441122','1987-06-03','m','1','','2015-03-17 22:18:18','ps');

INSERT INTO er_cars(regnumber, user_id, brand, model, color, seats, fuelrate) VALUES ('AE5488AD','kola@i.ua','reno','megane','black',2,8);
INSERT INTO er_cars(regnumber, user_id, brand, model, color, seats, fuelrate) VALUES ('AE5487EE','john@i.ua','mersedes','600','blue',1,12);
INSERT INTO er_cars(regnumber, user_id, brand, model, color, seats, fuelrate) VALUES ('AE6488II','alex@i.ua','opel','kadet','red',4,6);
INSERT INTO er_cars(regnumber, user_id, brand, model, color, seats, fuelrate) VALUES ('AE1418AK','mark@i.ua','zaz','tavriya','gray',1,5);
INSERT INTO er_cars(regnumber, user_id, brand, model, color, seats, fuelrate) VALUES ('AE6318KL','piter@i.ua','BMW','x5','black',4,13);
INSERT INTO er_cars(regnumber, user_id, brand, model, color, seats, fuelrate) VALUES ('AE6318KK','piter@i.ua','Porshe','Cayenne','black',4,17);

INSERT INTO er_roadrout(id, driver_id, `start`, finish, terms, auto_id, free_seats, start_date, time_trip, `status`) 
    VALUES ('20150101','kola@i.ua','Москва','Киев','в салоне не курят','AE5488AD','2','2015-02-11 04:00:00','12:00:00','opened');
INSERT INTO er_roadrout(id, driver_id, `start`, finish, terms, auto_id, free_seats, start_date, time_trip, `status`) 
    VALUES ('20150320','john@i.ua','Chikago','Dallas','no smoking, no pets','AE5487EE','1','2015-05-10 13:00:00','','opened');
INSERT INTO er_roadrout(id, driver_id, `start`, finish, terms, auto_id, free_seats, start_date, time_trip, `status`) 
    VALUES ('20150223','alex@i.ua','Кривой рог','Львов','в салоне не курят, без животных','AE6488II','3','2015-03-02 07:00:00','10:00:00','opened');
INSERT INTO er_roadrout(id, driver_id, `start`, finish, terms, auto_id, free_seats, start_date, time_trip, `status`) 
    VALUES ('20150207','mark@i.ua','Кременчуг','Днепропетровск','без детей, без животных','AE1418AK','4','2015-02-13 07:00:00','2:00:00','opened');
INSERT INTO er_roadrout(id, driver_id, `start`, finish, terms, auto_id, free_seats, start_date, time_trip, `status`) 
    VALUES ('20150221','piter@i.ua','Полтава','Санкт-Петербург','','AE6318KL','0','2015-05-28 03:00:00','16:00:00','closed');
INSERT INTO er_roadrout(id, driver_id, `start`, finish, terms, auto_id, free_seats, start_date, time_trip, `status`) 
    VALUES ('20150717','piter@i.ua','Санкт-Петербург','Полтава','','AE6318KK','2','2015-07-17 03:00:00','16:00:00','opened');

INSERT INTO er_passengers(rdrout_id, user_id) VALUES ('20150101','ivan@i.ua');
INSERT INTO er_passengers(rdrout_id, user_id) VALUES ('20150320','den@i.ua');
INSERT INTO er_passengers(rdrout_id, user_id) VALUES ('20150320','elena@i.ua');
INSERT INTO er_passengers(rdrout_id, user_id) VALUES ('20150221','olga@i.ua');
INSERT INTO er_passengers(rdrout_id, user_id) VALUES ('20150221','georg@i.ua');
INSERT INTO er_passengers(rdrout_id, user_id) VALUES ('20150717','kola@i.ua');
INSERT INTO er_passengers(rdrout_id, user_id) VALUES ('20150717','john@i.ua');

INSERT INTO er_routpoints(roadrout_id, point, pointqueue) VALUES ('20150101','Минск','1');
INSERT INTO er_routpoints(roadrout_id, point, pointqueue) VALUES ('20150221','Москва','1');
INSERT INTO er_routpoints(roadrout_id, point, pointqueue) VALUES ('20150221','Воронеж','2');
INSERT INTO er_routpoints(roadrout_id, point, pointqueue) VALUES ('20150221','Харьков','3');
INSERT INTO er_routpoints(roadrout_id, point, pointqueue) VALUES ('20150717','Москва','3');
INSERT INTO er_routpoints(roadrout_id, point, pointqueue) VALUES ('20150717','Воронеж','2');
INSERT INTO er_routpoints(roadrout_id, point, pointqueue) VALUES ('20150717','Харьков','1');

COMMIT;


-- Примеры запросов

SELECT rd.id, us.name, us.surname, cr.regnumber, cr.brand, cr.model, rd.`start`, rd.finish, GROUP_CONCAT(DISTINCT pt.`point` ORDER BY pt.pointqueue ASC SEPARATOR ', ') AS points, GROUP_CONCAT(DISTINCT usps.name ORDER BY usps.name ASC SEPARATOR ', ') AS passengers 
    FROM er_roadrout AS rd, er_users AS us, er_users AS usps, er_cars AS cr, er_routpoints AS pt, er_passengers AS ps
    WHERE rd.id='20150221' AND rd.driver_id=us.email AND rd.auto_id=cr.regnumber AND pt.roadrout_id=rd.id AND ps.rdrout_id=rd.id AND usps.email=ps.user_id;

SELECT rd.id, us.name, us.surname, cr.brand, cr.model, rd.`start`, rd.finish, GROUP_CONCAT(DISTINCT pt.`point` ORDER BY pt.pointqueue ASC SEPARATOR ', ') AS points
    FROM er_roadrout AS rd, er_users AS us, er_cars AS cr, er_routpoints AS pt
    WHERE us.name='Петр' AND rd.driver_id=us.email AND cr.regnumber=rd.auto_id AND rd.id=pt.roadrout_id
    GROUP BY rd.id;

SELECT us.name, us.surname, cr.brand, cr.model
    FROM er_users AS us, er_cars AS cr
    WHERE us.name='Петр' AND us.surname='Мазепа' AND us.access='dr' AND cr.user_id=us.email;

SELECT us.name, us.surname, cr.brand, cr.model
    FROM er_users AS us, er_cars AS cr
    WHERE us.phone='+380562556677' AND us.access='dr' AND cr.user_id=us.email;

SELECT rd.id, us.name, us.surname, cr.brand, cr.model, rd.`start`, rd.finish, rd.free_seats
    FROM er_roadrout AS rd, er_users AS us, er_cars AS cr
    WHERE rd.free_seats>'0' AND rd.driver_id=us.email AND cr.regnumber=rd.auto_id;

-- Пример обновления записи
UPDATE er_users SET `rate`= '5' WHERE er_users.email=georg@i.ua;

