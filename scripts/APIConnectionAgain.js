const OPENAI_API_KEY = '';

async function chatWithOpenAI() {

    const requestBody = {
        model: "gpt-3.5-turbo",
        messages: [{ role: "user", content: " given these set of inserts into the order sql table, can you give us some statistics about these orders? INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (5, 'Drink', 'Soda', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (17, 'Drink', 'Lemonade', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (24, 'Drink', 'Mocktail', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (8, 'Drink', 'Alcohol', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (12, 'Drink', 'Soda', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (23, 'Drink', 'Lemonade', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (30, 'Drink', 'Mocktail', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (5, 'Drink', 'Alcohol', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Drink', 'Soda', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (18, 'Drink', 'Lemonade', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (21, 'Drink', 'Mocktail', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (10, 'Drink', 'Alcohol', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (22, 'Drink', 'Soda', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (29, 'Drink', 'Lemonade', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (14, 'Drink', 'Mocktail', 3);\n" +
                "\n" +
                "-- Appetizers (30%)\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Appetizer', 'Nachos', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (10, 'Appetizer', 'Fries', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (18, 'Appetizer', 'Garlic Bread', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Appetizer', 'Salad', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (25, 'Appetizer', 'Taco', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Appetizer', 'Nachos', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (13, 'Appetizer', 'Fries', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (28, 'Appetizer', 'Garlic Bread', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (6, 'Appetizer', 'Salad', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (14, 'Appetizer', 'Taco', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (3, 'Appetizer', 'Nachos', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (15, 'Appetizer', 'Fries', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (30, 'Appetizer', 'Garlic Bread', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (9, 'Appetizer', 'Salad', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (19, 'Appetizer', 'Taco', 1);\n" +
                "\n" +
                "-- Desserts (10%)\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (4, 'Dessert', 'Cheesecake', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (13, 'Dessert', 'Ice Cream', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (20, 'Dessert', 'Cookie', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Dessert', 'Cheesecake', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (18, 'Dessert', 'Ice Cream', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (26, 'Dessert', 'Cookie', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (9, 'Dessert', 'Cheesecake', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (22, 'Dessert', 'Ice Cream', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (29, 'Dessert', 'Cookie', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (11, 'Dessert', 'Cheesecake', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (17, 'Dessert', 'Ice Cream', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (28, 'Dessert', 'Cookie', 2);\n" +
                "\n" +
                "-- Entrees (Rest)\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Entree', 'Spaghetti', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Entree', 'Burger', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (4, 'Entree', 'Pizza', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (1, 'Entree', 'Chicken Tendies', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (10, 'Entree', 'Dumplings', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Entree', 'Spaghetti', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (8, 'Entree', 'Burger', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (14, 'Entree', 'Pizza', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (3, 'Entree', 'Chicken Tendies', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (20, 'Entree', 'Dumplings', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (7, 'Entree', 'Spaghetti', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (2, 'Entree', 'Burger', 1);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (4, 'Entree', 'Pizza', 3);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (1, 'Entree', 'Chicken Tendies', 2);\n" +
                "INSERT INTO `Order` (TransactionID, CATEGORY, ItemName, Quantity) VALUES (10, 'Entree', 'Dumplings', 1);" }],
    };

    try {
        const response = await fetch('https://api.openai.com/v1/chat/completions', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${OPENAI_API_KEY}`
            },
            body: JSON.stringify(requestBody)
        });

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const data = await response.json();
        console.log(data);
        console.log(data.choices[0].message.content);
        const repsonseObject = document.getElementById('response');
        repsonseObject.textContent = data.choices[0].message.content;
        // Handle response data here

    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
}

// Call the async function
chatWithOpenAI();
