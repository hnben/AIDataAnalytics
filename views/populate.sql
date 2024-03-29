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
    OrderSize INT,
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
-- Insert for TransactionID 1
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (31.00, '2024-03-01');

-- Insert for TransactionID 2
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (137.00, '2024-03-01');

-- Insert for TransactionID 3
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (39.00, '2024-03-01');

-- Insert for TransactionID 4
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (106.00, '2024-03-02');

-- Insert for TransactionID 5
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (90.50, '2024-03-02');

-- Insert for TransactionID 6
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (35.50, '2024-03-03');

-- Insert for TransactionID 7
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (126.00, '2024-03-03');

-- Insert for TransactionID 8
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (114.50, '2024-03-03');

-- Insert for TransactionID 9
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (67.50, '2024-03-04');

-- Insert for TransactionID 10
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (121.00, '2024-03-04');

-- Insert for TransactionID 12
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (46.50, '2024-03-04');

-- Insert for TransactionID 13
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (53.00, '2024-03-05');

-- Insert for TransactionID 14
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (79.00, '2024-03-05');

-- Insert for TransactionID 17
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (79.50, '2024-03-05');

-- Insert for TransactionID 18
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (61.00, '2024-03-06');

-- Insert for TransactionID 19
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (17.50, '2024-03-06');

-- Insert for TransactionID 20
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (37.00, '2024-03-06');

-- Insert for TransactionID 21
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (41.00, '2024-03-06');

-- Insert for TransactionID 22
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (54.00, '2024-03-06');

-- Insert for TransactionID 23
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (57.00, '2024-03-07');

-- Insert for TransactionID 24
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (33.00, '2024-03-07');

-- Insert for TransactionID 25
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (68.50, '2024-03-07');

-- Insert for TransactionID 26
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (38.50, '2024-03-07');

-- Insert for TransactionID 28
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (62.50, '2024-03-07');

-- Insert for TransactionID 29
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (30.00, '2024-03-07');

-- Insert for TransactionID 30
INSERT INTO `Transaction` (TotalAmount, Date) VALUES (56.50, '2024-03-07');

-- Insert for Expense table
INSERT INTO `Expense` (`ID`, `TotalAmount`, `Type`, `Date`) VALUES
(1, 188.01, 'Material', '2024-03-01'),
(2, 168.05, 'Material', '2024-03-02'),
(3, 176.21, 'Material', '2024-03-03'),
(4, 276.89, 'Material', '2024-03-04'),
(5, 155.84, 'Material', '2024-03-05'),
(6, 248.51, 'Material', '2024-03-06'),
(7, 275.05, 'Material', '2024-03-07'),
(8, 129.73, 'Labor', '2024-03-01'),
(9, 123.49, 'Labor', '2024-03-02'),
(10, 128.25, 'Labor', '2024-03-03'),
(11, 170.79, 'Labor', '2024-03-04'),
(12, 169.18, 'Labor', '2024-03-05'),
(13, 233.54, 'Labor', '2024-03-06'),
(14, 160.17, 'Labor', '2024-03-07'),
(15, 500.00, 'Overhead', '2024-03-01');