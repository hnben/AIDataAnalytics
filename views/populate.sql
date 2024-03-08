DROP TABLE IF EXISTS `Expense`;
DROP TABLE IF EXISTS `Revenue`;
DROP TABLE IF EXISTS `Transaction`;
DROP TABLE IF EXISTS `Order`;
DROP TABLE IF EXISTS `Employee`;

-- * Stand alone table
CREATE TABLE `Expense` (
    ID INT NOT NULL AUTO_INCREMENT,
    TotalAmount DECIMAL(10, 2),
    Type ENUM('Overhead', 'Labor', 'Material'),
    Date DATE,

    PRIMARY KEY (ID)
);

-- * Stand alone table for looking at employees
CREATE TABLE `Employee` (
    ID INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR (255),
    Position ENUM('Server', 'Bartender', 'Cook', 'Manager'),
    HourlyPay DECIMAL(10,2),

    PRIMARY KEY (ID)
);

CREATE TABLE `Revenue` (
   ID INT NOT NULL AUTO_INCREMENT,
   TransactionID INT,
   TotalAmount INT,
   Date DATE,

   PRIMARY KEY (ID),
   FOREIGN KEY (TransactionID) REFERENCES `Transaction` (ID)
);

CREATE TABLE `Transaction` (
   ID INT NOT NULL AUTO_INCREMENT,
   TotalAmount DECIMAL (10,2),
   Date DATE,

   PRIMARY KEY (ID)
);

CREATE TABLE `Order`(
  ID INT NOT NULL AUTO_INCREMENT,
  TransactionID INT,
  CATEGORY ENUM('Appetizer', 'Entree', 'Dessert', 'Drink'),
  ItemName VARCHAR(50),
  Quantity INT,

  PRIMARY KEY (ID),
    FOREIGN KEY (TransactionID) REFERENCES `Transaction` (ID)
);

