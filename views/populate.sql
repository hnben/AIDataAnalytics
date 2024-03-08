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
   TotalAmount INT,
   Date DATE,

   PRIMARY KEY (ID)
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

-- populate orders
-- Drinks (15%)
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (5, 'Drink', 'Soda', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (17, 'Drink', 'Lemonade', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (24, 'Drink', 'Mocktail', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (8, 'Drink', 'Alcohol', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (12, 'Drink', 'Soda', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (23, 'Drink', 'Lemonade', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (30, 'Drink', 'Mocktail', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (5, 'Drink', 'Alcohol', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Drink', 'Soda', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (18, 'Drink', 'Lemonade', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (21, 'Drink', 'Mocktail', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (10, 'Drink', 'Alcohol', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (22, 'Drink', 'Soda', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (29, 'Drink', 'Lemonade', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (14, 'Drink', 'Mocktail', 3);

-- Appetizers (30%)
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Appetizer', 'Nachos', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (10, 'Appetizer', 'Fries', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (18, 'Appetizer', 'Garlic Bread', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Appetizer', 'Salad', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (25, 'Appetizer', 'Taco', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Appetizer', 'Nachos', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (13, 'Appetizer', 'Fries', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (28, 'Appetizer', 'Garlic Bread', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (6, 'Appetizer', 'Salad', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (14, 'Appetizer', 'Taco', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (3, 'Appetizer', 'Nachos', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (15, 'Appetizer', 'Fries', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (30, 'Appetizer', 'Garlic Bread', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (9, 'Appetizer', 'Salad', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (19, 'Appetizer', 'Taco', 1);

-- Desserts (10%)
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (4, 'Dessert', 'Cheesecake', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (13, 'Dessert', 'Ice Cream', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (20, 'Dessert', 'Cookie', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Dessert', 'Cheesecake', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (18, 'Dessert', 'Ice Cream', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (26, 'Dessert', 'Cookie', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (9, 'Dessert', 'Cheesecake', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (22, 'Dessert', 'Ice Cream', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (29, 'Dessert', 'Cookie', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (11, 'Dessert', 'Cheesecake', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (17, 'Dessert', 'Ice Cream', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (28, 'Dessert', 'Cookie', 2);

-- Entrees (Rest)
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Entree', 'Spaghetti', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Entree', 'Burger', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (4, 'Entree', 'Pizza', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (1, 'Entree', 'Chicken Tendies', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (10, 'Entree', 'Dumplings', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Entree', 'Spaghetti', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (8, 'Entree', 'Burger', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (14, 'Entree', 'Pizza', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (3, 'Entree', 'Chicken Tendies', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (20, 'Entree', 'Dumplings', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Entree', 'Spaghetti', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Entree', 'Burger', 1);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (4, 'Entree', 'Pizza', 3);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (1, 'Entree', 'Chicken Tendies', 2);
INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (10, 'Entree', 'Dumplings', 1);


-- populate transactions
