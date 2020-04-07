DROP DATABASE IF EXISTS Project;
CREATE DATABASE Project;
USE Project;

CREATE TABLE Admin (
    AdminUserId VARCHAR(45) PRIMARY KEY NOT NULL UNIQUE,
    FirstName VARCHAR(45) NOT NULL,
    LastName VARCHAR(45) NOT NULL,
    Email VARCHAR(45) NOT NULL,
    Phone VARCHAR(45) NOT NULL,
    CompanyName VARCHAR(45) NOT NULL
) Engine=InnoDB; 

CREATE TABLE AdminAccount(
    AdminUserId VARCHAR(45) PRIMARY KEY,
    AdminPassword VARCHAR(100) NOT NULL,

    FOREIGN KEY (AdminUserID) REFERENCES Admin(AdminUserId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

CREATE TABLE Title (
    JobTitleId INT PRIMARY KEY NOT NULL, 
    JobTitleName VARCHAR(45) NOT NULL
) Engine=InnoDB;

CREATE TABLE Availability (
    DayId INT PRIMARY KEY NOT NULL,
    DateOfWork VARCHAR(45) NOT NULL    
) Engine=InnoDB;

CREATE TABLE Shift (
    ShiftTimeId INT PRIMARY KEY NOT NULL,
    ShiftOfWork VARCHAR(45) NOT NULL
) Engine=InnoDB;

CREATE TABLE Employee (
    EmployeeUserId VARCHAR(45) PRIMARY KEY NOT NULL UNIQUE,
    FirstName VARCHAR(45) NOT NULL,
    LastName VARCHAR(45) NOT NULL,
    Email VARCHAR(45) NOT NULL,
    Phone VARCHAR(45) NOT NULL,
    JobTitleId INT NOT NULL,
    AdminUserId VARCHAR(45),
    FOREIGN KEY (AdminUserId) REFERENCES Admin(AdminUserId) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (JobTitleId) REFERENCES Title(JobTitleId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

CREATE TABLE EmployeeAccount(
    EmployeeUserId VARCHAR(45) PRIMARY KEY,
    EmployeePassword VARCHAR(100) NOT NULL,
    FOREIGN KEY (EmployeeUserId) REFERENCES Employee(EmployeeUserId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

CREATE TABLE AssignedShift (
    AssignedShiftId INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    EmployeeUserId VARCHAR(45) NOT NULL,
    Date VARCHAR(45) NOT NULL,
    ShiftTimeId INT NOT NULL, 
    FOREIGN KEY (EmployeeUserId) REFERENCES Employee (EmployeeUserId) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ShiftTimeId) REFERENCES Shift (ShiftTimeId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;


CREATE TABLE EmployeeAvailable (
    EmployeeUserId VARCHAR(45) NOT NULL,
    DayId INT NOT NULL,
    ShiftTimeId INT NOT NULL,
    JobTitleId INT NOT NULL, 
    PRIMARY KEY (EmployeeUserId, DayId, ShiftTimeId, JobtitleId),
    FOREIGN KEY (EmployeeUserId) REFERENCES Employee (EmployeeUserId) ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (DayId) REFERENCES Availability (DayId) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (ShiftTimeId) REFERENCES Shift (ShiftTimeId) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (JobTitleId) REFERENCES Title (JobTitleId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine=InnoDB;

-- ADD DATA

-- Add Admin Data
insert into Admin (AdminUserId, FirstName, LastName, Email, Phone,CompanyName) values ('mpadberry0', 'Merrick', 'Padberry', 'mpadberry0@jimdo.com', '885-492-5910','Super Store');
insert into Admin (AdminUserId, FirstName, LastName, Email, Phone,CompanyName) values ('pgwillim1', 'Philomena', 'Gwillim', 'pgwillim1@drupal.org', '143-263-3313','Super Store');
insert into Admin (AdminUserId, FirstName, LastName, Email, Phone,CompanyName) values ('tglavias2', 'Tito', 'Glavias', 'tglavias2@yelp.com', '263-598-9535','Super Store');

-- Add AdminAccount Data 
insert into AdminAccount(AdminUserId,AdminPassword) VALUES ('mpadberry0','mpadberry0');
insert into AdminAccount(AdminUserId,AdminPassword) VALUES ('pgwillim1','pgwillim1');
insert into AdminAccount(AdminUserId,AdminPassword) VALUES ('tglavias2','tglavias2');

-- ADD Shift Data
insert into Shift (ShiftTimeId, ShiftOfWork) VALUES (1,'Monrning');
insert into Shift (ShiftTimeId, ShiftOfWork) VALUES (2,'Evening');
insert into Shift (ShiftTimeId, ShiftOfWork) VALUES (3,'Night');


-- Add Title Data
insert into Title (JobTitleId, JobTitleName) values (1, 'Service Clerk');
insert into Title (JobTitleId, JobTitleName) values (2, 'Cashier');
insert into Title (JobTitleId, JobTitleName) values (3, 'Cold Bar Clerk');
insert into Title (JobTitleId, JobTitleName) values (4, 'Salad Bar Clerk');
insert into Title (JobTitleId, JobTitleName) values (5, 'Bakery Clerk');
insert into Title (JobTitleId, JobTitleName) values (6, 'Produce Clerk');


-- ADD Availability Data
insert into Availability (DayId, DateOfWork) VALUES (1,'Monday');
insert into Availability (DayId, DateOfWork) VALUES (2,'Tuesday');
insert into Availability (DayId, DateOfWork) VALUES (3,'Wednesday');
insert into Availability (DayId, DateOfWork) VALUES (4,'Thursday');
insert into Availability (DayId, DateOfWork) VALUES (5,'Friday');
insert into Availability (DayId, DateOfWork) VALUES (6,'Saturday');
insert into Availability (DayId, DateOfWork) VALUES (7,'Sunday');


-- ADD Employee Data
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('vwitter0', 'Veronique', 'Witter', 'vwitter0@merriam-webster.com', '615-625-1389', 1, 'mpadberry0');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('gbrittles1', 'Giselle', 'Brittles', 'gbrittles1@blog.com', '488-743-5352', 2, 'mpadberry0');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('dpruckner2', 'Dominic', 'Pruckner', 'dpruckner2@ted.com', '651-181-7917', 3, 'mpadberry0');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('akitchenside3', 'Adah', 'Kitchenside', 'akitchenside3@ebay.co.uk', '305-551-8383', 4, 'pgwillim1');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('akenforth4', 'Alair', 'Kenforth', 'akenforth4@cocolog-nifty.com', '213-711-5992', 5,'pgwillim1');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('ecresswell5', 'Emylee', 'Cresswell', 'ecresswell5@jalbum.net', '335-710-2723', 1,'pgwillim1');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('cricardin6', 'Colan', 'Ricardin', 'cricardin6@comsenz.com', '142-914-1403', 2,'pgwillim1');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('pjeandeau7', 'Patrice', 'Jeandeau','pjeandeau7@g.co', '293-386-4695', 3,'tglavias2');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('rkineton8', 'Rice', 'Kineton',  'rkineton8@soup.io', '426-960-0698', 4,'tglavias2');
insert into Employee (EmployeeUserId, FirstName, LastName,  Email, Phone, JobtitleId, AdminUserId) values ('sriglesford9', 'Sauncho', 'Riglesford', 'sriglesford9@sitemeter.com', '716-609-1262', 6,'tglavias2');


-- ADD EmployeeAccount Data 
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('vwitter0','vwitter0');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('gbrittles1','gbrittles1');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('dpruckner2','dpruckner2');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('akitchenside3','akitchenside3');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('akenforth4','akenforth4');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('ecresswell5','ecresswell5');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('cricardin6','cricardin6');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('pjeandeau7','pjeandeau7');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('rkineton8','rkineton8');
insert into EmployeeAccount(EmployeeUserId,EmployeePassword) VALUES ('sriglesford9','sriglesford9');


-- ADD AssigendShift Data
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('vwitter0','2020-04-06',1);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('gbrittles1','2020-04-02',1);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('dpruckner2','2020-04-03',2);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('akitchenside3','2020-04-04',2);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('akenforth4','2020-04-04',3);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('ecresswell5','2020-04-03',3);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('cricardin6','2020-04-02',2);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('pjeandeau7','2020-04-04',2);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('rkineton8','2020-04-03',1);
insert into AssignedShift (EmployeeUserId,Date,ShiftTimeId) VALUES('sriglesford9','2020-04-05',1);
