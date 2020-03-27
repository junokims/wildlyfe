DROP TABLE IF EXISTS Feeds;
DROP TABLE IF EXISTS Eats;
DROP TABLE IF EXISTS AnimalLivesIn;
DROP TABLE IF EXISTS Enclosure;
DROP TABLE IF EXISTS Attends;
DROP TABLE IF EXISTS Plans;
DROP TABLE IF EXISTS AnimalCaretaker;
DROP TABLE IF EXISTS OutdoorWorker;
DROP TABLE IF EXISTS OfficeWorker;
DROP TABLE IF EXISTS EventCoordinator;
DROP TABLE IF EXISTS HR;
DROP TABLE IF EXISTS TicketClerk;
DROP TABLE IF EXISTS Sells;
DROP TABLE IF EXISTS Volunteer;
DROP TABLE IF EXISTS Events;
DROP TABLE IF EXISTS Employee;
DROP TABLE IF EXISTS TypeHost;
DROP TABLE IF EXISTS Enclosure;
DROP TABLE IF EXISTS Species;
DROP TABLE IF EXISTS EventTypeBudget;
DROP TABLE IF EXISTS VisitorHasContactInformation;
DROP TABLE IF EXISTS PurchaseEntry;
DROP TABLE IF EXISTS FoodItem;
DROP TABLE IF EXISTS Visitor;

CREATE TABLE Enclosure(
    Enclosure_ID CHAR(20),
    Maintenance_Date DATE NOT NULL,
    PRIMARY KEY (Enclosure_ID));

CREATE TABLE Visitor(
    Visitor_ID INTEGER,
    Demographic char(20),
    PRIMARY KEY (Visitor_ID));

CREATE TABLE TypeHost(
    Type char(20),
    Host char(40),
    PRIMARY KEY (Type)
  );

CREATE TABLE Employee(
   Employee_Number INTEGER,
   Name char(40),
   DOB DATE,
   SIN INTEGER UNIQUE NOT NULL,
   Director_Number INTEGER,
   Department_Number INTEGER,
   PRIMARY KEY (Employee_Number));

 CREATE TABLE EventTypeBudget(
    Event_Type char(20),
    Events_Budget INTEGER,
    PRIMARY KEY (Event_Type));

 CREATE TABLE Species(
    Species char(20),
    Diet char(20) NOT NULL,
    PRIMARY KEY (Species));

 CREATE TABLE VisitorHasContactInformation(
      Visitor_ID  INTEGER,
      Name char(30),
      DOB DATE,
      Address char(40),
      Email char(40),
      Phone_Number char(12),
      PRIMARY KEY (Visitor_ID),
      FOREIGN KEY (Visitor_ID) references Visitor(Visitor_ID) ON DELETE CASCADE);

  CREATE TABLE Events(
      Event_ID INTEGER,
      Name_of_Event char(30),
      Time char(20),
      Event_date DATE NOT NULL,
      Location char(20),
      Number_of_Invitees INTEGER,
      Type char(20),
      PRIMARY KEY (Event_ID),
      FOREIGN KEY (Type) references TypeHost(Type) ON DELETE CASCADE);

CREATE TABLE Attends(
    Visitor_ID INTEGER,
    Event_ID INTEGER,
    PRIMARY KEY (Visitor_ID, Event_ID),
    FOREIGN KEY (Visitor_ID) references Visitor(Visitor_ID) ON DELETE CASCADE,
    FOREIGN KEY (Event_ID) references Events(Event_ID) ON DELETE CASCADE);

CREATE TABLE FoodItem(
  Food_Item_ID char(20),
  Food_Quantity INTEGER,
  Food_Expiry_Date DATE,
  PRIMARY KEY (Food_Item_ID));

  CREATE TABLE PurchaseEntry(
    Entry_Number INTEGER,
    Price INTEGER,
    Purchase_Date DATE,
    Purchase_Time char(20),
    Visitor_ID INTEGER NOT NULL,
    PRIMARY KEY (Entry_Number),
    FOREIGN KEY (Visitor_ID) references Visitor(Visitor_ID) ON DELETE CASCADE);

CREATE TABLE OutdoorWorker(
    Employee_Number INTEGER,
    Outdoor_Gear char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE);

CREATE TABLE OfficeWorker(
    Employee_Number INTEGER,
    Desk_Number INTEGER,
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE);

CREATE TABLE EventCoordinator(
    Employee_Number INTEGER,
    Event_Type char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE,
    FOREIGN KEY (Event_Type) references EventTypeBudget(Event_Type) ON DELETE CASCADE);

CREATE TABLE Plans(
    Employee_Number  INTEGER,
    Event_ID INTEGER,
    PRIMARY KEY (Employee_Number, Event_ID),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE,
    FOREIGN KEY (Event_ID) references Events(Event_ID) ON DELETE CASCADE);

CREATE TABLE HR(
    Employee_Number INTEGER,
    Payroll_Login char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE);

CREATE TABLE TicketClerk(
    Employee_Number INTEGER,
    Clerk_ID INTEGER,
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE);

CREATE TABLE Sells(
    Employee_Number INTEGER,
    Entry_Number INTEGER,
    Cash_Register_ID INTEGER NOT NULL,
    PRIMARY KEY (Employee_Number, Entry_Number),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE,
    FOREIGN KEY (Entry_Number) references PurchaseEntry(Entry_Number) ON DELETE CASCADE);

CREATE TABLE AnimalCaretaker(
    Employee_Number INTEGER,
    Caretaker_ID INTEGER,
    Assigned_Species char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE);

CREATE TABLE Volunteer(
    Employee_Number INTEGER,
    Access_Level char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE);

CREATE TABLE AnimalLivesIn(
    Animal_ID char(20),
    Enclosure_ID char(20) NOT NULL,
    Species char(20),
    PRIMARY KEY (Animal_ID),
    FOREIGN KEY (Enclosure_ID) references Enclosure(Enclosure_ID) ON DELETE CASCADE,
    FOREIGN KEY (Species) references Species(Species) ON DELETE CASCADE);

  CREATE TABLE Feeds(
      Employee_Number INTEGER,
      Animal_ID Char(20),
      Date_of_feeding DATE,
      Time INTEGER,
      Food_Item_ID char(20),
      Food_Quantity INTEGER,
      PRIMARY KEY (Employee_Number, Animal_ID),
      FOREIGN KEY (Employee_Number) references Employee(Employee_Number) ON DELETE CASCADE,
      FOREIGN KEY (Animal_ID)       references AnimalLivesIn(Animal_ID) ON DELETE CASCADE,
      FOREIGN KEY (Food_Item_ID)    references FoodItem(Food_Item_ID) ON DELETE CASCADE);

CREATE TABLE Eats(
    Animal_ID char(20),
    Food_Item_ID char(20),
    PRIMARY KEY (Animal_ID, Food_Item_ID),
    FOREIGN KEY (Animal_ID) references AnimalLivesIn(Animal_ID) ON DELETE CASCADE,
    FOREIGN KEY (Food_Item_ID) references FoodItem(Food_Item_ID) ON DELETE CASCADE);

  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Lizard Enclosure', STR_TO_DATE('2020-12-1', '%Y-%m-%d'));
  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Hedgehog Enclosure', STR_TO_DATE('2020-02-17', '%Y-%m-%d'));
  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Snake Enclosure', STR_TO_DATE('2020-11-17', '%Y-%m-%d'));
  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Wolf Enclosure', STR_TO_DATE('2020-12-09', '%Y-%m-%d'));
  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Monkey Enclosure', STR_TO_DATE('2020-04-17', '%Y-%m-%d'));

  INSERT INTO Visitor(Visitor_ID, Demographic)
  VALUES (1, 'Senior');
  INSERT INTO Visitor(Visitor_ID, Demographic)
  VALUES (2, 'Child');
  INSERT INTO Visitor(Visitor_ID, Demographic)
  VALUES (3, 'Student');
  INSERT INTO Visitor(Visitor_ID, Demographic)
  VALUES (4, 'Adult');
  INSERT INTO Visitor(Visitor_ID, Demographic)
  VALUES (5, 'Adult');

  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (1, 'Juno Kim', '123 Some Street', 'juno@ubc.ca', '716-123-4567', STR_TO_DATE('1962-04-01', '%Y-%m-%d'));
  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (2, 'Junsun Kim', '123 Some Street', 'junsun@ubc.ca', '716-123-4567', STR_TO_DATE('2012-04-01', '%Y-%m-%d'));
  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (3, 'Logan Lapointe', '289 Some Street', 'logan@shaw.ca', '213-456-7896', STR_TO_DATE('1993-04-01', '%Y-%m-%d'));
  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (4, 'Riley Bierer', '456 Some Street', 'riles@gmail.ca', '716-123-4527', STR_TO_DATE('1983-04-01', '%Y-%m-%d'));
  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (5, 'Brian Stephens', '1577 Some Street', 'brianstep@live.ca', '716-127-6527', STR_TO_DATE('1982-04-01', '%Y-%m-%d'));

  INSERT INTO TypeHost(Type, Host)
  VALUES ('Party', 'Leslie Gore');
  INSERT INTO TypeHost(Type, Host)
  VALUES ('Fundraiser', 'Donna Summer');
  INSERT INTO TypeHost(Type, Host)
  VALUES ('Corporate Event', 'Dwight Schrute');
  INSERT INTO TypeHost(Type, Host)
  VALUES ('Class', 'Gillian Anderson');
  INSERT INTO TypeHost(Type, Host)
  VALUES ('Community Outreach', 'Brita Filter');

  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (1, 'Steves Birthday Party', '15:00', STR_TO_DATE('2020-04-01', '%Y-%m-%d'), 'West Wing', '20', 'Party');
  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (2, 'Als Birthday Party', '15:00', STR_TO_DATE('2020-04-02', '%Y-%m-%d'), 'West Wing', '20', 'Party');
  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (3, 'Rogers Birthday Party', '15:00', STR_TO_DATE('2020-04-03', '%Y-%m-%d'), 'West Wing', '20', 'Party');
  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (4, 'Bens Birthday Party', '15:00', STR_TO_DATE('2020-04-04', '%Y-%m-%d'), 'West Wing', '20', 'Party');
  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (5, 'Cliffords Birthday Party', '15:00', STR_TO_DATE('2020-04-05', '%Y-%m-%d'), 'West Wing', '20', 'Party');


INSERT INTO Attends(Visitor_ID, Event_ID)
VALUES (1,1);
INSERT INTO Attends(Visitor_ID, Event_ID)
VALUES (2,1);
INSERT INTO Attends(Visitor_ID, Event_ID)
VALUES (3,1);
INSERT INTO Attends(Visitor_ID, Event_ID)
VALUES (4,1);
INSERT INTO Attends(Visitor_ID, Event_ID)
VALUES (5,1);

INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (1, 'Laura Ruiz', STR_TO_DATE('1997-01-01', '%Y-%m-%d'), 123456789, 1, 1);
INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (2, 'Lauren Ruiz', STR_TO_DATE('1997-01-01', '%Y-%m-%d'), 123456790, 1, 1);
INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (3, 'Lara Ruiz', STR_TO_DATE('1997-01-01', '%Y-%m-%d'), 123456791, 1, 1);
INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (4, 'Laurin Ruiz', STR_TO_DATE('1997-01-01', '%Y-%m-%d'), 123456792, 1, 1);
INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (5, 'Lore Ruiz', STR_TO_DATE('1997-01-01', '%Y-%m-%d'), 123456793, 40, 1);



INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (1, 10, 1,  STR_TO_DATE('2020-02-04', '%Y-%m-%d'), 'Morning');
INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (2, 10, 2, STR_TO_DATE('2020-02-04', '%Y-%m-%d'),  'Morning');
INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (3, 10, 3, STR_TO_DATE('2020-02-04', '%Y-%m-%d'), 'Afternoon');
INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (4, 5, 4, STR_TO_DATE('2020-02-04', '%Y-%m-%d'), 'Evening');
INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (5, 5, 5, STR_TO_DATE('2020-02-04', '%Y-%m-%d'), 'Evening');


INSERT INTO OutdoorWorker(Employee_Number, Outdoor_Gear)
VALUES (1, 'Shovel');
INSERT INTO OutdoorWorker(Employee_Number, Outdoor_Gear)
VALUES (2, 'Forklift');
INSERT INTO OutdoorWorker(Employee_Number, Outdoor_Gear)
VALUES (3, 'Power saw');
INSERT INTO OutdoorWorker(Employee_Number, Outdoor_Gear)
VALUES (4, 'Pressure washer');
INSERT INTO OutdoorWorker(Employee_Number, Outdoor_Gear)
VALUES (5, 'Tractor');



INSERT INTO OfficeWorker(Employee_Number, Desk_Number)
VALUES (1, 9999);
INSERT INTO OfficeWorker(Employee_Number, Desk_Number)
VALUES (2, 9998);
INSERT INTO OfficeWorker(Employee_Number, Desk_Number)
VALUES (3, 9997);
INSERT INTO OfficeWorker(Employee_Number, Desk_Number)
VALUES (4, 9996);
INSERT INTO OfficeWorker(Employee_Number, Desk_Number)
VALUES (5, 9995);

INSERT INTO EventTypeBudget(Event_Type, Events_Budget)
VALUES ('Work Party', 500);
INSERT INTO EventTypeBudget(Event_Type, Events_Budget)
VALUES ('Birthday Party', 500);
INSERT INTO EventTypeBudget(Event_Type, Events_Budget)
VALUES ('Funeral', 500);
INSERT INTO EventTypeBudget(Event_Type, Events_Budget)
VALUES ('Fundraiser', 1000);


INSERT INTO EventCoordinator(Employee_Number, Event_Type)
VALUES (1, 'Work Party');
INSERT INTO EventCoordinator(Employee_Number, Event_Type)
VALUES (2, 'Birthday Party');
INSERT INTO EventCoordinator(Employee_Number, Event_Type)
VALUES (3, 'Birthday Party');
INSERT INTO EventCoordinator(Employee_Number, Event_Type)
VALUES (4, 'Fundraiser');
INSERT INTO EventCoordinator(Employee_Number, Event_Type)
VALUES (5, 'Fundraiser');

INSERT INTO HR(Employee_Number, Payroll_Login)
VALUES (1, 'jimbush');
INSERT INTO HR(Employee_Number, Payroll_Login)
VALUES (2, 'jonsmith');
INSERT INTO HR(Employee_Number, Payroll_Login)
VALUES (3, 'jonstraw');
INSERT INTO HR(Employee_Number, Payroll_Login)
VALUES (4, 'jasonbreeze');
INSERT INTO HR(Employee_Number, Payroll_Login)
VALUES (5, 'andrewbush');

INSERT INTO TicketClerk(Employee_Number, Clerk_ID)
VALUES (1, 1);
INSERT INTO TicketClerk(Employee_Number, Clerk_ID)
VALUES (2, 2);
INSERT INTO TicketClerk(Employee_Number, Clerk_ID)
VALUES (3, 3);
INSERT INTO TicketClerk(Employee_Number, Clerk_ID)
VALUES (4, 4);
INSERT INTO TicketClerk(Employee_Number, Clerk_ID)
VALUES (5, 5);

INSERT INTO Sells(Employee_Number, Entry_Number, Cash_Register_ID)
VALUES (1, 1, 1);
INSERT INTO Sells(Employee_Number, Entry_Number, Cash_Register_ID)
VALUES (2, 2, 2);
INSERT INTO Sells(Employee_Number, Entry_Number, Cash_Register_ID)
VALUES (3, 3, 4);
INSERT INTO Sells(Employee_Number, Entry_Number, Cash_Register_ID)
VALUES (4, 4, 5);
INSERT INTO Sells(Employee_Number, Entry_Number, Cash_Register_ID)
VALUES (5, 5, 1);

INSERT INTO AnimalCaretaker(Employee_Number, Caretaker_ID, Assigned_Species)
VALUES (1, 1, 'Lizards');
INSERT INTO AnimalCaretaker(Employee_Number, Caretaker_ID, Assigned_Species)
VALUES (2, 2, 'Dogs');
INSERT INTO AnimalCaretaker(Employee_Number, Caretaker_ID, Assigned_Species)
VALUES (3, 3, 'Wolves');
INSERT INTO AnimalCaretaker(Employee_Number, Caretaker_ID, Assigned_Species)
VALUES (4, 4, 'Hedgehogs');
INSERT INTO AnimalCaretaker(Employee_Number, Caretaker_ID, Assigned_Species)
VALUES (5, 5, 'Birds');

INSERT INTO Volunteer(Employee_Number, Access_Level)
VALUES (1, 'Level 1');
INSERT INTO Volunteer(Employee_Number, Access_Level)
VALUES (2, 'Level 1');
INSERT INTO Volunteer(Employee_Number, Access_Level)
VALUES (3, 'Level 2');
INSERT INTO Volunteer(Employee_Number, Access_Level)
VALUES (4, 'Level 3');
INSERT INTO Volunteer(Employee_Number, Access_Level)
VALUES (5, 'Level 5');

INSERT INTO Species(Species, Diet)
VALUES ('Lizard', 'Carnivorous');
INSERT INTO Species(Species, Diet)
VALUES ('Snake', 'Carnivorous');
INSERT INTO Species(Species, Diet)
VALUES ('Wolf', 'Carnivorous');
INSERT INTO Species(Species, Diet)
VALUES ('Hedgehog', 'Omnivorous');
INSERT INTO Species(Species, Diet)
VALUES ('Monkey', 'Omnivorous');

INSERT INTO AnimalLivesIn(Animal_ID, Enclosure_ID, Species)
VALUES ('Larry the Lizard', 'Lizard Enclosure', 'Lizard');
INSERT INTO AnimalLivesIn(Animal_ID, Enclosure_ID, Species)
VALUES ('Sam the Snake', 'Snake Enclosure', 'Snake');
INSERT INTO AnimalLivesIn(Animal_ID, Enclosure_ID, Species)
VALUES ('William the Wolf', 'Wolf Enclosure', 'Wolf');
INSERT INTO AnimalLivesIn(Animal_ID, Enclosure_ID, Species)
VALUES ('Harry the Hedgehog', 'Hedgehog Enclosure', 'Hedgehog');
INSERT INTO AnimalLivesIn(Animal_ID, Enclosure_ID, Species)
VALUES ('Chip the Monkey', 'Monkey Enclosure', 'Monkey');

INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Crickets', 5, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));
INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Mealworms', 5, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));
INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Mice', 5, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));
INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Kibble', 5, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));
INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Bananas', 5, STR_TO_DATE('2021-03-14', '%Y-%m-%d'));


INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (1, 'Larry the Lizard', STR_TO_DATE('2021-03-04', '%Y-%m-%d'), 1200, 'Crickets', 1);
INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (2, 'Sam the Snake', STR_TO_DATE('2021-03-04', '%Y-%m-%d'), 1300, 'Mice', 1);
INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (3, 'William the Wolf', STR_TO_DATE('2021-03-04', '%Y-%m-%d'), 1400, 'Kibble', 1);
INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (4, 'Harry the Hedgehog', STR_TO_DATE('2021-03-04', '%Y-%m-%d'), 1500, 'Mealworms', 1);
INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (5, 'Chip the Monkey', STR_TO_DATE('2021-03-04', '%Y-%m-%d'), 1600, 'Bananas', 1);


INSERT INTO Eats(Animal_ID, Food_Item_ID)
VALUES ('Larry the Lizard', 'Crickets');
INSERT INTO Eats(Animal_ID, Food_Item_ID)
VALUES ('Harry the Hedgehog', 'Mealworms');
INSERT INTO Eats(Animal_ID, Food_Item_ID)
VALUES ('Sam the Snake', 'Mice');
INSERT INTO Eats(Animal_ID, Food_Item_ID)
VALUES ('William the Wolf', 'Kibble');
INSERT INTO Eats(Animal_ID, Food_Item_ID)
VALUES ('Chip the Monkey', 'Bananas');
