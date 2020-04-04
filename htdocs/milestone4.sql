DROP TABLE IF EXISTS feeds;
DROP TABLE IF EXISTS eats;
DROP TABLE IF EXISTS animallivesin;
DROP TABLE IF EXISTS enclosure;
DROP TABLE IF EXISTS attends;
DROP TABLE IF EXISTS plans;
DROP TABLE IF EXISTS animalcaretaker;
DROP TABLE IF EXISTS outdoorworker;
DROP TABLE IF EXISTS officeworker;
DROP TABLE IF EXISTS eventcoordinator;
DROP TABLE IF EXISTS hr;
DROP TABLE IF EXISTS ticketclerk;
DROP TABLE IF EXISTS sells;
DROP TABLE IF EXISTS volunteer;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS employee;
DROP TABLE IF EXISTS typehost;
DROP TABLE IF EXISTS enclosure;
DROP TABLE IF EXISTS species;
DROP TABLE IF EXISTS eventtypebudget;
DROP TABLE IF EXISTS visitorhascontactinformation;
DROP TABLE IF EXISTS purchaseentry;
DROP TABLE IF EXISTS fooditem;
DROP TABLE IF EXISTS visitor;

CREATE TABLE enclosure(
    enclosure_id CHAR(20),
    maintenance_date DATE NOT NULL,
    PRIMARY KEY (enclosure_id));

CREATE TABLE visitor(
    visitor_id INTEGER,
    demographic char(20),
    PRIMARY KEY (visitor_id));

CREATE TABLE typehost(
    type char(20),
    host char(40),
    PRIMARY KEY (type)
  );

CREATE TABLE employee(
   employee_number INTEGER,
   name char(40),
   dob DATE,
   sin INTEGER UNIQUE NOT NULL,
   director_number INTEGER,
   department_number INTEGER,
   PRIMARY KEY (employee_number));

 CREATE TABLE eventtypebudget(
    event_type char(20),
    events_budget INTEGER,
    PRIMARY KEY (event_type));

 CREATE TABLE species(
    species char(20),
    diet char(20) NOT NULL,
    PRIMARY KEY (species));

 CREATE TABLE visitorhascontactinformation(
      visitor_id  INTEGER,
      name char(30),
      dob DATE,
      address char(40),
      email char(40),
      phone_number char(12),
      PRIMARY KEY (visitor_id),
      FOREIGN KEY (visitor_id) references visitor(visitor_id) ON DELETE CASCADE);

  CREATE TABLE events(
      event_id INTEGER,
      name_of_event char(30),
      time char(20),
      event_date DATE NOT NULL,
      location char(20),
      number_of_invitees INTEGER,
      type char(20),
      PRIMARY KEY (event_id),
      FOREIGN KEY (type) references typehost(type) ON DELETE CASCADE);

CREATE TABLE attends(
    visitor_id INTEGER,
    event_id INTEGER,
    PRIMARY KEY (visitor_id, event_id),
    FOREIGN KEY (visitor_id) references visitor(visitor_id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) references events(event_id) ON DELETE CASCADE);

CREATE TABLE fooditem(
  food_item_id char(20),
  food_quantity INTEGER,
  food_expiry_date DATE,
  PRIMARY KEY (food_item_id));

  CREATE TABLE purchaseentry(
    entry_number INTEGER,
    price INTEGER,
    purchase_date DATE,
    purchase_time char(20),
    visitor_id INTEGER NOT NULL,
    PRIMARY KEY (entry_number),
    FOREIGN KEY (visitor_id) references visitor(visitor_id) ON DELETE CASCADE);

CREATE TABLE outdoorworker(
    employee_number INTEGER,
    outdoor_gear char(20),
    PRIMARY KEY (employee_number),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE);

CREATE TABLE officeworker(
    employee_number INTEGER,
    desk_number INTEGER,
    PRIMARY KEY (employee_number),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE);

CREATE TABLE eventcoordinator(
    employee_number INTEGER,
    event_type char(20),
    PRIMARY KEY (employee_number),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE,
    FOREIGN KEY (event_type) references eventtypebudget(event_type) ON DELETE CASCADE);

CREATE TABLE plans(
    employee_number  INTEGER,
    event_id INTEGER,
    PRIMARY KEY (employee_number, event_id),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE,
    FOREIGN KEY (event_id) references events(event_id) ON DELETE CASCADE);

CREATE TABLE hr(
    employee_number INTEGER,
    payroll_login char(20),
    PRIMARY KEY (employee_number),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE);

CREATE TABLE ticketclerk(
    employee_number INTEGER,
    clerk_id INTEGER,
    PRIMARY KEY (employee_number),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE);

CREATE TABLE sells(
    employee_number INTEGER,
    entry_number INTEGER,
    cash_register_id INTEGER NOT NULL,
    PRIMARY KEY (employee_number, entry_number),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE,
    FOREIGN KEY (entry_number) references purchaseentry(entry_number) ON DELETE CASCADE);

CREATE TABLE animalcaretaker(
    employee_number INTEGER,
    caretaker_id INTEGER,
    assigned_species char(20),
    PRIMARY KEY (employee_number),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE);

CREATE TABLE volunteer(
    employee_number INTEGER,
    access_level char(20),
    PRIMARY KEY (employee_number),
    FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE);

CREATE TABLE animallivesin(
    animal_id char(20),
    enclosure_id char(20) NOT NULL,
    species char(20),
    PRIMARY KEY (animal_id),
    FOREIGN KEY (enclosure_id) references enclosure(enclosure_id) ON DELETE CASCADE,
    FOREIGN KEY (species) references species(species) ON DELETE CASCADE);

  CREATE TABLE feeds(
      employee_number INTEGER,
      animal_id Char(20),
      date_of_feeding DATE,
      time INTEGER,
      food_item_id char(20),
      food_quantity INTEGER,
      PRIMARY KEY (employee_number, animal_id),
      FOREIGN KEY (employee_number) references employee(employee_number) ON DELETE CASCADE,
      FOREIGN KEY (animal_id)       references animallivesin(animal_id) ON DELETE CASCADE,
      FOREIGN KEY (food_item_id)    references fooditem(food_item_id) ON DELETE CASCADE);

CREATE TABLE eats(
    animal_id char(20),
    food_item_id char(20),
    PRIMARY KEY (animal_id, food_item_id),
    FOREIGN KEY (animal_id) references animallivesin(animal_id) ON DELETE CASCADE,
    FOREIGN KEY (food_item_id) references fooditem(food_item_id) ON DELETE CASCADE);

  INSERT INTO enclosure(enclosure_id, maintenance_date)
  VALUES ('Lizard enclosure', STR_TO_DATE('2020-12-1', '%Y-%m-%d'));
  INSERT INTO enclosure(enclosure_id, maintenance_date)
  VALUES ('Hedgehog enclosure', STR_TO_DATE('2020-02-17', '%Y-%m-%d'));
  INSERT INTO enclosure(enclosure_id, maintenance_date)
  VALUES ('Snake enclosure', STR_TO_DATE('2020-11-17', '%Y-%m-%d'));
  INSERT INTO enclosure(enclosure_id, maintenance_date)
  VALUES ('Wolf enclosure', STR_TO_DATE('2020-12-09', '%Y-%m-%d'));
  INSERT INTO enclosure(enclosure_id, maintenance_date)
  VALUES ('Monkey enclosure', STR_TO_DATE('2020-04-17', '%Y-%m-%d'));

  INSERT INTO visitor(visitor_id, demographic)
  VALUES (1, 'Senior');
  INSERT INTO visitor(visitor_id, demographic)
  VALUES (2, 'Child');
  INSERT INTO visitor(visitor_id, demographic)
  VALUES (3, 'Student');
  INSERT INTO visitor(visitor_id, demographic)
  VALUES (4, 'Adult');
  INSERT INTO visitor(visitor_id, demographic)
  VALUES (5, 'Adult');

  INSERT INTO visitorhascontactinformation(visitor_id, name, address, email, phone_number, dob)
  VALUES (1, 'Juno Kim', '123 Some Street', 'juno@ubc.ca', '716-123-4567', STR_TO_DATE('1962-04-01', '%Y-%m-%d'));
  INSERT INTO visitorhascontactinformation(visitor_id, name, address, email, phone_number, dob)
  VALUES (2, 'Junsun Kim', '123 Some Street', 'junsun@ubc.ca', '716-123-4567', STR_TO_DATE('2012-04-01', '%Y-%m-%d'));
  INSERT INTO visitorhascontactinformation(visitor_id, name, address, email, phone_number, dob)
  VALUES (3, 'Logan Lapointe', '289 Some Street', 'logan@shaw.ca', '213-456-7896', STR_TO_DATE('1993-04-01', '%Y-%m-%d'));
  INSERT INTO visitorhascontactinformation(visitor_id, name, address, email, phone_number, dob)
  VALUES (4, 'Riley Bierer', '456 Some Street', 'riles@gmail.ca', '716-123-4527', STR_TO_DATE('1983-04-01', '%Y-%m-%d'));
  INSERT INTO visitorhascontactinformation(visitor_id, name, address, email, phone_number, dob)
  VALUES (5, 'Brian Stephens', '1577 Some Street', 'brianstep@live.ca', '716-127-6527', STR_TO_DATE('1982-04-01', '%Y-%m-%d'));

  INSERT INTO typehost(type, host)
  VALUES ('Party', 'Leslie Gore');
  INSERT INTO typehost(type, host)
  VALUES ('Fundraiser', 'Donna Summer');
  INSERT INTO typehost(type, host)
  VALUES ('Corporate Event', 'Dwight Schrute');
  INSERT INTO typehost(type, host)
  VALUES ('Class', 'Gillian Anderson');
  INSERT INTO typehost(type, host)
  VALUES ('Community Outreach', 'Brita Filter');

  INSERT INTO events(event_id, name_of_event, time, event_date, location, number_of_invitees, type)
  VALUES (1, 'Rapping about Raptors', '15:00', STR_TO_DATE('2020-04-01', '%Y-%m-%d'), 'Conservatory', '20', 'Class');
  INSERT INTO events(event_id, name_of_event, time, event_date, location, number_of_invitees, type)
  VALUES (2, 'Summer Celebration', '15:00', STR_TO_DATE('2020-04-02', '%Y-%m-%d'), 'West Wing', '3', 'Party');
  INSERT INTO events(event_id, name_of_event, time, event_date, location, number_of_invitees, type)
  VALUES (3, 'Michaels tots', '15:00', STR_TO_DATE('2020-04-03', '%Y-%m-%d'), 'West Wing', '15', 'Fundraiser');
  INSERT INTO events(event_id, name_of_event, time, event_date, location, number_of_invitees, type)
  VALUES (4, 'Free food for all', '15:00', STR_TO_DATE('2020-04-04', '%Y-%m-%d'), 'West Wing', '60', 'Fundraiser');
  INSERT INTO events(event_id, name_of_event, time, event_date, location, number_of_invitees, type)
  VALUES (5, 'employee Appreciation Day', '15:00', STR_TO_DATE('2020-04-05', '%Y-%m-%d'), 'West Wing', '34', 'Corporate Event');
  INSERT INTO events(event_id, name_of_event, time, event_date, location, number_of_invitees, type)
  VALUES (6, 'Get Involved With Wildlyfe', '15:00', STR_TO_DATE('2020-04-05', '%Y-%m-%d'), 'Main Hall', '34', 'Community Outreach');


INSERT INTO attends(visitor_id, event_id)
VALUES (1,1);
INSERT INTO attends(visitor_id, event_id)
VALUES (1,2);
INSERT INTO attends(visitor_id, event_id)
VALUES (1,3);
INSERT INTO attends(visitor_id, event_id)
VALUES (1,4);
INSERT INTO attends(visitor_id, event_id)
VALUES (1,5);
INSERT INTO attends(visitor_id, event_id)
VALUES (2,4);
INSERT INTO attends(visitor_id, event_id)
VALUES (3,2);
INSERT INTO attends(visitor_id, event_id)
VALUES (5,4);
INSERT INTO attends(visitor_id, event_id)
VALUES (4,5);

INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (1, 'Laura Ruiz', STR_TO_DATE('1997-01-01', '%Y-%m-%d'), 123456789, 2, 1);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (2, 'Lauren Ruiz', STR_TO_DATE('1993-10-01', '%Y-%m-%d'), 123456790, 2, 1);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (3, 'Lara Ruiz', STR_TO_DATE('1993-12-01', '%Y-%m-%d'), 123456791, 2, 1);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (4, 'Laurin Ruiz', STR_TO_DATE('2001-01-01', '%Y-%m-%d'), 123456792, 2, 1);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (5, 'Lore Ruiz', STR_TO_DATE('2002-01-01', '%Y-%m-%d'), 123456793, 40, 3);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (6, 'Michael scott', STR_TO_DATE('1972-01-01', '%Y-%m-%d'), 123456123, 3, 3);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (7, 'Lara Ruiz', STR_TO_DATE('1960-01-01', '%Y-%m-%d'), 963092036, 3, 3);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (8, 'Laurin Ruiz', STR_TO_DATE('1932-01-01', '%Y-%m-%d'), 799132600, 3, 3);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (9, 'Lore Ruiz', STR_TO_DATE('1954-01-01', '%Y-%m-%d'), 074472408, 40, 3);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (10, 'Laurin Ruiz', STR_TO_DATE('1970-01-01', '%Y-%m-%d'), 186320685, 40, 4);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (11, 'Lore Ruiz', STR_TO_DATE('1989-01-01', '%Y-%m-%d'), 131825721, 40, 4);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (12, 'Lauren Ruiz', STR_TO_DATE('1923-01-01', '%Y-%m-%d'), 123222790, 22, 4);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (13, 'Lara Ruiz', STR_TO_DATE('1999-01-01', '%Y-%m-%d'), 123455555, 22, 4);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (14, 'Laurin Ruiz', STR_TO_DATE('1997-01-01', '%Y-%m-%d'), 123343434, 22, 4);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (15, 'Lore Ruiz', STR_TO_DATE('2001-01-01', '%Y-%m-%d'), 123453234, 40, 5);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (16, 'Laurin Ruiz', STR_TO_DATE('1942-01-01', '%Y-%m-%d'), 123575723, 22, 5);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (17, 'Lore Ruiz', STR_TO_DATE('1956-01-01', '%Y-%m-%d'), 123434564, 40, 5);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (18, 'Lauren Ruiz', STR_TO_DATE('1933-01-01', '%Y-%m-%d'), 128786790, 12, 5);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (19, 'Lara Ruiz', STR_TO_DATE('1945-01-01', '%Y-%m-%d'), 123345677, 12, 6);
INSERT INTO employee(employee_number, name, dob, sin, director_number, department_number )
VALUES (20, 'Laurin Ruiz', STR_TO_DATE('1997-01-01', '%Y-%m-%d'), 124456792, 12, 6);




INSERT INTO purchaseentry(entry_number, price, visitor_id, purchase_date, purchase_time)
VALUES (1, 10, 1,  STR_TO_DATE('2020-02-04', '%Y-%m-%d'), 'Morning');
INSERT INTO purchaseentry(entry_number, price, visitor_id, purchase_date, purchase_time)
VALUES (2, 10, 2, STR_TO_DATE('2020-02-04', '%Y-%m-%d'),  'Morning');
INSERT INTO purchaseentry(entry_number, price, visitor_id, purchase_date, purchase_time)
VALUES (3, 10, 3, STR_TO_DATE('2020-02-04', '%Y-%m-%d'), 'Afternoon');
INSERT INTO purchaseentry(entry_number, price, visitor_id, purchase_date, purchase_time)
VALUES (4, 5, 4, STR_TO_DATE('2020-02-04', '%Y-%m-%d'), 'Evening');
INSERT INTO purchaseentry(entry_number, price, visitor_id, purchase_date, purchase_time)
VALUES (5, 5, 5, STR_TO_DATE('2020-02-04', '%Y-%m-%d'), 'Evening');


INSERT INTO outdoorworker(employee_number, outdoor_gear)
VALUES (1, 'Shovel');
INSERT INTO outdoorworker(employee_number, outdoor_gear)
VALUES (2, 'Forklift');
INSERT INTO outdoorworker(employee_number, outdoor_gear)
VALUES (3, 'Power saw');
INSERT INTO outdoorworker(employee_number, outdoor_gear)
VALUES (4, 'Pressure washer');
INSERT INTO outdoorworker(employee_number, outdoor_gear)
VALUES (5, 'Tractor');



INSERT INTO officeworker(employee_number, desk_number)
VALUES (1, 9999);
INSERT INTO officeworker(employee_number, desk_number)
VALUES (3, 9998);
INSERT INTO officeworker(employee_number, desk_number)
VALUES (4, 9997);
INSERT INTO officeworker(employee_number, desk_number)
VALUES (6, 9996);
INSERT INTO officeworker(employee_number, desk_number)
VALUES (7, 9995);

INSERT INTO eventtypebudget(event_type, events_budget)
VALUES ('Work Party', 500);
INSERT INTO eventtypebudget(event_type, events_budget)
VALUES ('Birthday Party', 500);
INSERT INTO eventtypebudget(event_type, events_budget)
VALUES ('Funeral', 500);
INSERT INTO eventtypebudget(event_type, events_budget)
VALUES ('Fundraiser', 1000);


INSERT INTO eventcoordinator(employee_number, event_type)
VALUES (1, 'Work Party');
INSERT INTO eventcoordinator(employee_number, event_type)
VALUES (2, 'Birthday Party');
INSERT INTO eventcoordinator(employee_number, event_type)
VALUES (3, 'Birthday Party');
INSERT INTO eventcoordinator(employee_number, event_type)
VALUES (4, 'Fundraiser');
INSERT INTO eventcoordinator(employee_number, event_type)
VALUES (5, 'Fundraiser');

INSERT INTO hr(employee_number, payroll_login)
VALUES (3, 'jimbush');
INSERT INTO hr(employee_number, payroll_login)
VALUES (4, 'jonsmith');
INSERT INTO hr(employee_number, payroll_login)
VALUES (5, 'jonstraw');
INSERT INTO hr(employee_number, payroll_login)
VALUES (6, 'jasonbreeze');
INSERT INTO hr(employee_number, payroll_login)
VALUES (7, 'andrewbush');

INSERT INTO ticketclerk(employee_number, clerk_id)
VALUES (15, 1);
INSERT INTO ticketclerk(employee_number, clerk_id)
VALUES (16, 2);
INSERT INTO ticketclerk(employee_number, clerk_id)
VALUES (17, 3);
INSERT INTO ticketclerk(employee_number, clerk_id)
VALUES (18, 4);
INSERT INTO ticketclerk(employee_number, clerk_id)
VALUES (19, 5);

INSERT INTO sells(employee_number, entry_number, cash_register_id)
VALUES (16, 1, 1);
INSERT INTO sells(employee_number, entry_number, cash_register_id)
VALUES (16, 2, 2);
INSERT INTO sells(employee_number, entry_number, cash_register_id)
VALUES (16, 3, 4);
INSERT INTO sells(employee_number, entry_number, cash_register_id)
VALUES (18, 4, 5);
INSERT INTO sells(employee_number, entry_number, cash_register_id)
VALUES (18, 5, 1);

INSERT INTO animalcaretaker(employee_number, caretaker_id, assigned_species)
VALUES (6, 1, 'Lizards');
INSERT INTO animalcaretaker(employee_number, caretaker_id, assigned_species)
VALUES (7, 2, 'Dogs');
INSERT INTO animalcaretaker(employee_number, caretaker_id, assigned_species)
VALUES (8, 3, 'Wolves');
INSERT INTO animalcaretaker(employee_number, caretaker_id, assigned_species)
VALUES (9, 4, 'Hedgehogs');
INSERT INTO animalcaretaker(employee_number, caretaker_id, assigned_species)
VALUES (10, 5, 'Birds');

INSERT INTO volunteer(employee_number, access_level)
VALUES (11, 'Level 1');
INSERT INTO volunteer(employee_number, access_level)
VALUES (12, 'Level 1');
INSERT INTO volunteer(employee_number, access_level)
VALUES (13, 'Level 2');
INSERT INTO volunteer(employee_number, access_level)
VALUES (14, 'Level 3');
INSERT INTO volunteer(employee_number, access_level)
VALUES (15, 'Level 5');

INSERT INTO species(species, diet)
VALUES ('Lizard', 'Carnivorous');
INSERT INTO species(species, diet)
VALUES ('Snake', 'Carnivorous');
INSERT INTO species(species, diet)
VALUES ('Wolf', 'Carnivorous');
INSERT INTO species(species, diet)
VALUES ('Hedgehog', 'Omnivorous');
INSERT INTO species(species, diet)
VALUES ('Monkey', 'Omnivorous');

INSERT INTO animallivesin(animal_id, enclosure_id, species)
VALUES ('Larry the Lizard', 'Lizard enclosure', 'Lizard');
INSERT INTO animallivesin(animal_id, enclosure_id, species)
VALUES ('Sam the Snake', 'Snake enclosure', 'Snake');
INSERT INTO animallivesin(animal_id, enclosure_id, species)
VALUES ('William the Wolf', 'Wolf enclosure', 'Wolf');
INSERT INTO animallivesin(animal_id, enclosure_id, species)
VALUES ('Harry the Hedgehog', 'Hedgehog enclosure', 'Hedgehog');
INSERT INTO animallivesin(animal_id, enclosure_id, species)
VALUES ('Chip the Monkey', 'Monkey enclosure', 'Monkey');

INSERT INTO fooditem(food_item_id, food_quantity, food_expiry_date)
VALUES ('Crickets', 1222, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));
INSERT INTO fooditem(food_item_id, food_quantity, food_expiry_date)
VALUES ('Mealworms', 333, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));
INSERT INTO fooditem(food_item_id, food_quantity, food_expiry_date)
VALUES ('Mice', 23, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));
INSERT INTO fooditem(food_item_id, food_quantity, food_expiry_date)
VALUES ('Kibble', 494, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));
INSERT INTO fooditem(food_item_id, food_quantity, food_expiry_date)
VALUES ('Bananas', 33, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));


INSERT INTO feeds(employee_number, animal_id, date_of_feeding , time, food_item_id, food_quantity)
VALUES (7, 'Larry the Lizard', STR_TO_DATE('2021-03-04', '%Y-%m-%d'), 1200, 'Crickets', 134);
INSERT INTO feeds(employee_number, animal_id, date_of_feeding , time, food_item_id, food_quantity)
VALUES (7, 'Sam the Snake', STR_TO_DATE('2021-04-04', '%Y-%m-%d'), 1300, 'Mice', 123);
INSERT INTO feeds(employee_number, animal_id, date_of_feeding , time, food_item_id, food_quantity)
VALUES (7, 'William the Wolf', STR_TO_DATE('2021-05-06', '%Y-%m-%d'), 1400, 'Kibble', 22);
INSERT INTO feeds(employee_number, animal_id, date_of_feeding , time, food_item_id, food_quantity)
VALUES (6, 'Harry the Hedgehog', STR_TO_DATE('2021-03-04', '%Y-%m-%d'), 1500, 'Mealworms', 55);
INSERT INTO feeds(employee_number, animal_id, date_of_feeding , time, food_item_id, food_quantity)
VALUES (9, 'Chip the Monkey', STR_TO_DATE('2021-04-10', '%Y-%m-%d'), 1600, 'Bananas', 32);

INSERT INTO plans(employee_number, event_id)
VALUES (2, 1);
INSERT INTO plans(employee_number, event_id)
VALUES (2, 2);
INSERT INTO plans(employee_number, event_id)
VALUES (4, 3);
INSERT INTO plans(employee_number, event_id)
VALUES (4, 4);
INSERT INTO plans(employee_number, event_id)
VALUES (1, 5);



INSERT INTO eats(animal_id, food_item_id)
VALUES ('Larry the Lizard', 'Crickets');
INSERT INTO eats(animal_id, food_item_id)
VALUES ('Harry the Hedgehog', 'Mealworms');
INSERT INTO eats(animal_id, food_item_id)
VALUES ('Sam the Snake', 'Mice');
INSERT INTO eats(animal_id, food_item_id)
VALUES ('William the Wolf', 'Kibble');
INSERT INTO eats(animal_id, food_item_id)
VALUES ('Chip the Monkey', 'Bananas');