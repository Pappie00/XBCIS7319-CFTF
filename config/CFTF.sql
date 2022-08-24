DROP DATABASE IF EXISTS CFTF;
CREATE DATABASE if Not Exists CFTF ;
USE CFTF;

drop table if Exists Vehicle ;
Create Table If Not Exists Vehicle (
id INT auto_increment,
vin varchar(20) NOT NULL,
make varchar(250) NOT NULL,
model varchar(250) NOT NULL,
year varchar(4) NOT NULL,
exteriorColour varchar(250) NOT NULL,
interiorColour varchar(250) NOT NULL,
options varchar(250) NOT NULL,
price double(10,2) NOT NULL,
sellPrice double(10,2) NOT NULL,
category varchar(20) NOT NULL,
image text NOT NULL,
PRIMARY KEY (id));

insert into Vehicle (id, vin, make, model, year, exteriorColour, interiorColour, options, price, sellPrice, category, image)
values (1, 'AAVZBB3CD901726956', 'Volkswagen','Polo GTI','2015','White','Black','ONLY 34500KMs, Sunroof, Xenon Lights, Smash and Grab Tint, Full Service History',245000,281750,'Hatchback', 'config/product-images/Polo-GTI-front.jpeg');


drop Table If Exists Customer;
Create Table If Not Exists Customer(
id INT auto_increment,
clientID varchar(20),
name varchar(250),
surname varchar(250),
address varchar(250),
telephone varchar(15),
email varchar(250),
PRIMARY KEY (id));

insert into Customer (id, clientID, name, surname, address, telephone, email)
values(1,'C2890','Castro','Tebogo','20 moutainview 0c krediet street Rooderpoor', '+29110005904', 'castro.teb@gmail.com');

drop Table If Exists Admin;
Create table If Not Exists Admin(
id INT auto_increment,
adminID int(10) NOT NULL,
fullName varchar(250),
email varchar(250),
address varchar(250),
phone varchar(15),
username varchar(255),
password varchar(255) NOT NULL,
PRIMARY KEY (id));

insert into Admin (id, adminID, fullName, email, address, phone, username, password)
values(1, '10','Mary Kasongo','mary.kasongo@mail.com' , '63 Killburn 2 Penguin street','+27874532107', 'admin', 'admin');

drop Table If Exists Salesperson;
Create table If Not Exists Salesperson(
id INT auto_increment,
salespersonID varchar(20),
name varchar(250),
surname varchar(250),
address varchar(250),
telephone varchar(15),
email varchar(250),
PRIMARY KEY (id));

insert into Salesperson (id, salespersonID, name, surname, address, telephone, email)
values(1,'S0045','Peter','Muku','22 moutainview 0c krediet street Rooderpoor', '+29110005905', 'peter.muku@cftf.com');

drop Table If Exists Orders;
Create table If Not Exists Orders(
id INT auto_increment,
orderNum varchar(50),
statusOrder varchar(150),
fk_clientID varchar(20),
fk_vin varchar(20),
fk_SalesPersonID varchar(20),
orderFile text NOT NULL,
PRIMARY KEY (id));

insert into Orders (id, OrderNum, statusOrder, fk_clientID, fk_vin, fk_salesPersonID, orderFile)
values(1, 'O56778','Pending Authorisation','C2890','AHTFZ29G209047329','S0045', 'config/product-order/056778-Order.pdf');

drop table If Exists Invoice;
Create table If Not Exists Invoice(
id INT auto_increment,
invoiceNum varchar(20),
fk_vin varchar(20),
fk_salesPersonID varchar(20),
fk_clientID varchar(20),
statusInvoice varchar(150),
invoiceFile text NOT NULL,
PRIMARY KEY (id));

insert into Invoice (id, invoiceNum, fk_vin, fk_salesPersonID, fk_clientID, statusInvoice, invoiceFile)
values(1,'CFTF6RGTI','AAVZBB3CD901726956','S0045','C2890','Paid/Complete', 'config/product-invoice/CFTF6RGTI-Invoice.pdf');
