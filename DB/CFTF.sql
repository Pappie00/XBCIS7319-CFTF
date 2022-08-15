drop schema CFFTF;
CREATE SCHEMA if Not Exists CFFTF ;
USE CFFTF;

drop table if Exists Vehicle ;
Create Table If Not Exists Vehicle (
Vehicle_id INT auto_increment NOT NULL,
VIN varchar(20),
Make varchar(250),
Model varchar(250),
Year varchar(4),
ExteriorColour varchar(250),
InteriorColour varchar(250), 
Options varchar(250),
Price varchar(250),
InventoryID varchar(5),
CategoryID varchar(20),
PRIMARY KEY (Vehicle_id));
       
insert into Vehicle (VIN, Make, Model, Year, ExteriorColour, InteriorColour, Options, Price, InventoryID, CategoryID)
values ( 'AHTFZ29G209047329', 'Toyota','Hilux','1998','White','Grey','Cattle Rails, Towbar','FC 645 000.00','L','LDV');

drop table if Exists Employees ;
Create Table If Not Exists Employees(
EmployeeID varchar(20),
Name varchar(250),
Surname varchar(250),
Address varchar(250),
PhoneNumber varchar(10),
JobDescription varchar(250),
Password varchar(250));

insert into Employees (EmployeeID, Name, Surname, Address, PhoneNumber, JobDescription, Password)
values('K4576','Mary','Kasongo','63 Killburn 2 Penguin street','0874532107','Update inventory','Hoigigfdytguoy88_');

drop Table If Exists Customer;
Create Table If Not Exists Customer(
ClientID varchar(20),
Name varchar(250),
Surname varchar(250),
Address varchar(250),
VehicleID varchar(20),
OrderID varchar(20),
EmployeeID varchar(20));

insert into Customer (ClientID, Name, Surname, Address, VehicleID, OrderID, EmployeeID)
values('C2890','Castro','Tebogo','20 moutainview 0c krediet street Rooderpoor','V1084','056778','E567890');

drop Table If Exists Manager;
Create table If Not Exists Manager(
ManagerID varchar(20),
Name varchar(250),
Surname varchar(250),
Address varchar(250),
PhoneNumber varchar(10),
JobDescription varchar(250));

insert into Manager (ManagerID, Name, Surname, Address, PhoneNumber,JobDescription)
values('K4576','Mary','Kasongo','63 Killburn 2 Penguin street','0874532107','Update inventory');

drop Table If Exists Salesperson;
Create table If Not Exists Salesperson(
SalespersonID varchar(20),
JobID varchar(20),
Name varchar(250),
Surname varchar(250),
OrderID varchar(20),
ManagerID varchar(20),
ClientID varchar(20));

insert into Salesperson (SalespersonID, JobID, Name, Surname, OrderID, ManagerID, ClientID)
values('S0045','J2626','Peter','Muku','056778','M0001','C2890');

drop Table If Exists Orders;
Create table If Not Exists Orders(
Date varchar(50),
Status varchar(250),
ClientID varchar(20),
ManagerID varchar(20),
VIN varchar(20),
SalesPersonID varchar(20));

insert into Orders (OrderID, Date, Status, ClientID, ManagerID, VIN, SalesPersonID)
values('O56778','23/07/2021 15:30','Out for delivery','C2890','M0001','AHTFZ29G209047329','S0045');

drop table If Exists Invoice;
Create table If Not Exists Invoice(
InvoiceNum varchar(20),
VIN varchar(20),
SalesPersonID varchar(20),
Date varchar(20),
Description varchar(250),
Price varchar(50));

insert into Invoice (InvoiceNum, VIN, SalesPersonID, Date, Description, Price)
values('234578390309','AHTFZ29G209047329','S0045','20/07/2022','Subtotal: FC 23000.78 Discount: FC 450.78 Tax rate : 3%
Balance due : FC 7000.00','FC 645 000.00');

drop table If Exists Category;
Create table If Not Exists Category(
CategoryID varchar(5),
Category varchar(250));

insert into Category (CategoryID, Category)
values('LDV','Light Delivery Vehicle');

drop table If Exists Inventory;
Create table If Not Exists Inventory(
InventoryID varchar(5),
Location varchar(20));

insert into Inventory (InventoryID, Location)
values('L','Lubumbashi');

drop table If Exists Online_Users; 
Create table If Not Exists Online_User(
UserID varchar(50),
Name varchar(250),
Email varchar(250),
Password varchar(250));


















