Drop table Typehost cascade constraints;
Drop table Visitor cascade constraints;
Drop table Events cascade constraints;
Drop table Employee cascade constraints;
Drop table Enclosure cascade constraints;
Drop table Species cascade constraints;
Drop table EventTypeBudget cascade constraints;
Drop table VisitorHasContactInformation cascade constraints;
Drop table AnimalLivesIn cascade constraints;
Drop table PurchaseEntry cascade constraints;
drop table FoodItem cascade constraints;
drop table AnimalCaretaker;
drop table OutdoorWorker;
drop table Attends;
drop table Plans;
drop table OfficeWorker;
drop table EventCoordinator;
drop table HR;
drop table TicketClerk;
drop table Sells;
drop table Volunteer;
drop table Eats;
drop table Feeds;

CREATE TABLE Enclosure(
    Enclosure_ID CHAR(20),
    Maintenance_Date DATE NOT NULL,
    PRIMARY KEY (Enclosure_ID));

grant select on Enclosure to public;

CREATE TABLE Visitor(
    Visitor_ID INTEGER,
    Demographic char(20),
    PRIMARY KEY (Visitor_ID));

grant select on Visitor to public;


CREATE TABLE TypeHost(
    Type char(20),
    Host char(40),
    PRIMARY KEY (Type)
  );

grant select on TypeHost to public;

CREATE TABLE Employee(
   Employee_Number INTEGER,
   Name char(40),
   DOB DATE,
   SIN INTEGER UNIQUE NOT NULL,
   Director_Number INTEGER,
   Department_Number INTEGER,
   PRIMARY KEY (Employee_Number));

grant select on Employee to public;


 CREATE TABLE EventTypeBudget(
    Event_Type char(20),
    Events_Budget INTEGER,
    PRIMARY KEY (Event_Type));

grant select on EventTypeBudget to public;

 CREATE TABLE Species(
    Species char(20),
    Diet char(20) NOT NULL,
    PRIMARY KEY (Species));

grant select on Species to public;

  CREATE TABLE VisitorHasContactInformation(
      Visitor_ID  INTEGER,
      Name char(30),
      DOB DATE,
      Address char(40),
      Email char(40),
      Phone_Number INTEGER,
      PRIMARY KEY (Visitor_ID),
      FOREIGN KEY (Visitor_ID) references Visitor ON DELETE SET NULL);

grant select on VisitorHasContactInformation to public;

  CREATE TABLE Events(
      Event_ID INTEGER,
      Name_of_Event char(30),
      Time char(20),
      Event_date DATE NOT NULL,
      Location char(20),
      Number_of_Invitees INTEGER,
      Type char(20),
      PRIMARY KEY (Event_ID),
      FOREIGN KEY (Type) references TypeHost ON DELETE SET NULL);

grant select on Events to public;

CREATE TABLE Attends(
    Visitor_ID INTEGER,
    Event_ID INTEGER,
    PRIMARY KEY (Visitor_ID, Event_ID),
    FOREIGN KEY (Visitor_ID) references Visitor ON DELETE SET NULL,
    FOREIGN KEY (Event_ID) references Events ON DELETE SET NULL);

grant select on Attends to public;


CREATE TABLE FoodItem(
  Food_Item_ID char(20),
  Food_Quantity INTEGER,
  Food_Expiry_Date DATE,
  PRIMARY KEY (Food_Item_ID));

grant select on FoodItem to public;


  CREATE TABLE PurchaseEntry(
    Entry_Number INTEGER,
    Price INTEGER,
    Purchase_Date DATE,
    Purchase_Time char(20),
    Visitor_ID INTEGER NOT NULL,
    PRIMARY KEY (Entry_Number),
    FOREIGN KEY (Visitor_ID) references Visitor ON DELETE SET NULL);

grant select on PurchaseEntry to public;

CREATE TABLE OutdoorWorker(
    Employee_Number INTEGER,
    Outdoor_Gear char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL);

grant select on OutdoorWorker to public;


CREATE TABLE OfficeWorker(
    Employee_Number INTEGER,
    Desk_Number INTEGER,
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL);

grant select on OfficeWorker to public;


CREATE TABLE EventCoordinator(
    Employee_Number INTEGER,
    Event_Type char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL,
    FOREIGN KEY (Event_Type) references EventTypeBudget ON DELETE SET NULL);

grant select on EventCoordinator to public;

CREATE TABLE Plans(
    Employee_Number  INTEGER,
    Event_ID INTEGER,
    PRIMARY KEY (Employee_Number, Event_ID),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL,
    FOREIGN KEY (Event_ID) references Events ON DELETE SET NULL);

grant select on Plans to public;

CREATE TABLE HR(
    Employee_Number INTEGER,
    Payroll_Login char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL);

grant select on HR to public;


CREATE TABLE TicketClerk(
    Employee_Number INTEGER,
    Clerk_ID INTEGER,
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL);

grant select on TicketClerk to public;

CREATE TABLE Sells(
    Employee_Number INTEGER,
    Entry_Number INTEGER,
    Cash_Register_ID INTEGER NOT NULL,
    PRIMARY KEY (Employee_Number, Entry_Number),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL,
    FOREIGN KEY (Entry_Number) references PurchaseEntry ON DELETE SET NULL);

grant select on Sells to public;

CREATE TABLE AnimalCaretaker(
    Employee_Number INTEGER,
    Caretaker_ID INTEGER,
    Assigned_Species char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL);

grant select on AnimalCaretaker to public;

CREATE TABLE Volunteer(
    Employee_Number INTEGER,
    Access_Level char(20),
    PRIMARY KEY (Employee_Number),
    FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL);

grant select on Volunteer to public;


CREATE TABLE AnimalLivesIn(
    Animal_ID char(20),
    Enclosure_ID char(20) NOT NULL,
    Species char(20),
    PRIMARY KEY (Animal_ID),
    FOREIGN KEY (Enclosure_ID) references Enclosure ON DELETE SET NULL,
    FOREIGN KEY (Species) references Species ON DELETE SET NULL);

grant select on AnimalLivesIn to public;


  CREATE TABLE Feeds(
      Employee_Number INTEGER,
      Animal_ID Char(20),
      Date_of_feeding DATE,
      Time INTEGER,
      Food_Item_ID char(20),
      Food_Quantity INTEGER,
      PRIMARY KEY (Employee_Number, Animal_ID),
      FOREIGN KEY (Employee_Number) references Employee ON DELETE SET NULL,
      FOREIGN KEY (Animal_ID)       references AnimalLivesIn ON DELETE CASCADE,
      FOREIGN KEY (Food_Item_ID)    references FoodItem ON DELETE SET NULL);

grant select on Feeds to public;

CREATE TABLE Eats(
    Animal_ID char(20),
    Food_Item_ID char(20),
    PRIMARY KEY (Animal_ID, Food_Item_ID),
    FOREIGN KEY (Animal_ID) references AnimalLivesIn ON DELETE SET NULL,
    FOREIGN KEY (Food_Item_ID) references FoodItem ON DELETE SET NULL);

grant select on Eats to public;


  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Lizard Enclosure', to_date('2020-12-17', 'yyyy-mm-dd'));
  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Hedgehog Enclosure', to_date('2020-02-17', 'yyyy-mm-dd'));
  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Snake Enclosure', to_date('2020-11-17', 'yyyy-mm-dd'));
  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Wolf Enclosure', to_date('2020-12-09', 'yyyy-mm-dd'));
  INSERT INTO Enclosure(Enclosure_ID, Maintenance_Date)
  VALUES ('Monkey Enclosure', to_date('2020-04-17', 'yyyy-mm-dd'));

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
  VALUES (1, 'Juno Kim', '123 Some Street', 'juno@ubc.ca', 7161234567, to_date('1962-04-01', 'yyyy-mm-dd'));
  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (2, 'Junsun Kim', '123 Some Street', 'junsun@ubc.ca', 7161234567, to_date('2012-04-01', 'yyyy-mm-dd'));
  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (3, 'Logan Lapointe', '289 Some Street', 'logan@shaw.ca', 2134567896, to_date('1993-04-01', 'yyyy-mm-dd'));
  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (4, 'Riley Bierer', '456 Some Street', 'riles@gmail.ca', 7161234527, to_date('1983-04-01', 'yyyy-mm-dd'));
  INSERT INTO VisitorHasContactInformation(Visitor_ID, Name, Address, Email, Phone_Number, DOB)
  VALUES (5, 'Brian Stephens', '1577 Some Street', 'brianstep@live.ca', 7161276527, to_date('1982-04-01', 'yyyy-mm-dd'));

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
  VALUES (1, 'Steves Birthday Party', '15:00', to_date('2020-04-01', 'yyyy-mm-dd'), 'West Wing', '20', 'Party');
  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (2, 'Als Birthday Party', '15:00', to_date('2020-04-02', 'yyyy-mm-dd'), 'West Wing', '20', 'Party');
  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (3, 'Rogers Birthday Party', '15:00', to_date('2020-04-03', 'yyyy-mm-dd'), 'West Wing', '20', 'Party');
  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (4, 'Bens Birthday Party', '15:00', to_date('2020-04-04', 'yyyy-mm-dd'), 'West Wing', '20', 'Party');
  INSERT INTO Events(Event_ID, Name_of_Event, Time, Event_date, Location, Number_of_Invitees, Type)
  VALUES (5, 'Cliffords Birthday Party', '15:00', to_date('2020-04-05', 'yyyy-mm-dd'), 'West Wing', '20', 'Party');


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
VALUES (1, 'Laura Ruiz', to_date('1997-01-01', 'yyyy-mm-dd'), 123456789, 1, 1);
INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (2, 'Lauren Ruiz', to_date('1997-01-01', 'yyyy-mm-dd'), 123456790, 1, 1);
INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (3, 'Lara Ruiz', to_date('1997-01-01', 'yyyy-mm-dd'), 123456791, 1, 1);
INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (4, 'Laurin Ruiz', to_date('1997-01-01', 'yyyy-mm-dd'), 123456792, 1, 1);
INSERT INTO Employee(Employee_Number, Name, DOB, SIN, Director_Number, Department_Number )
VALUES (5, 'Lore Ruiz', to_date('1997-01-01', 'yyyy-mm-dd'), 123456793, 40, 1);



INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (1, 10, 1,  to_date('2020-02-04', 'yyyy-mm-dd'), 'Morning');
INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (2, 10, 2, to_date('2020-02-04', 'yyyy-mm-dd'),  'Morning');
INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (3, 10, 3, to_date('2020-02-04', 'yyyy-mm-dd'), 'Afternoon');
INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (4, 5, 4, to_date('2020-02-04', 'yyyy-mm-dd'), 'Evening');
INSERT INTO PurchaseEntry(Entry_Number, Price, Visitor_ID, Purchase_Date, Purchase_Time)
VALUES (5, 5, 5, to_date('2020-02-04', 'yyyy-mm-dd'), 'Evening');


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
VALUES ('Crickets', 5, to_date('2021-03-14', 'yyyy-mm-dd'));
INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Mealworms', 5, to_date('2021-03-14', 'yyyy-mm-dd'));
INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Mice', 5, to_date('2021-03-14', 'yyyy-mm-dd'));
INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Kibble', 5, to_date('2021-03-14', 'yyyy-mm-dd'));
INSERT INTO FoodItem(Food_Item_ID, Food_Quantity, Food_Expiry_Date)
VALUES ('Bananas', 5, to_date('2021-03-14', 'yyyy-mm-dd'));


INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (1, 'Larry the Lizard', to_date('2021-03-04', 'yyyy-mm-dd'), 1200, 'Crickets', 1);
INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (2, 'Sam the Snake', to_date('2021-03-04', 'yyyy-mm-dd'), 1300, 'Mice', 1);
INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (3, 'William the Wolf', to_date('2021-03-04', 'yyyy-mm-dd'), 1400, 'Kibble', 1);
INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (4, 'Harry the Hedgehog', to_date('2021-03-04', 'yyyy-mm-dd'), 1500, 'Mealworms', 1);
INSERT INTO Feeds(Employee_Number, Animal_ID, Date_of_feeding , Time, Food_Item_ID, Food_Quantity)
VALUES (5, 'Chip the Monkey', to_date('2021-03-04', 'yyyy-mm-dd'), 1600, 'Bananas', 1);


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
