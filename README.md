# AIDataAnalytics
A data analysis tool for restaurants enhanced with AI to get insights on growth strategies. Given a large amount of data (expenses, revenue, and sales data) we feed this information into curated prompts into openAI’s API to receive data trends with a click of a button. The website gives an easy to understand overview of all the data, provides options to add expenses and revenue, and uses openAI to receive personalized analysis on summary, unique trends, and prediction. 

# Authors
- **Tien Nguyen** - Front-End Developer
- **Huy Nguyen** - Product Manager, SQL/PHP Developer
- **Will Castillo** - PHP Developer

# Project Requirements
**1. Separates all database/business logic using the MVC pattern.**
- All HTML files under views folder
- Routes of all HTML files is under index.php
- Classes are within classes folder
- Controller receives data from our classes and saves objects or data into F3 Hive
- Access to the database and data validation classes are under model

**2. Routes all URLs and leverages a templating language using the Fat-Free framework.**
- All routes are in the index.php and uses the Fat-Free Framework.

**3. Has a clearly defined database layer using PDO and prepared statements.**
- Connection to the database and prepared statements are created within the accessDatabase.php, under the model folder.

**4. Data can be added and viewed.**
- The user is able to add expenses and orders, which are then populated into the database. This is displayed on the overview.html page and a breakdown of the numbers are in revenue.html and expense.html.

**5. Has a history of commits from both team members to a Git repository. Commits are clearly commented.**
- All team members have a history of commits with detailed comments.

**6. Uses OOP, and utilizes multiple classes, including at least one inheritance relationship.**
- Classes: Overview, Revenue, Order, Transaction, Expenses.
- Transaction and Order inherits from the Revenue class and its fields: date and totalAmount.

**7. Contains full Docblocks for all PHP files and follows PEAR standards.**
- All PHP files contains DocBlocks and follows PEAR Standards.

**8. Has full validation on the server side through PHP.**
- The validate.php features static functions to validate forms.

**9. All code is clean, clear, and well-commented. DRY (Don't Repeat Yourself) is practiced.**
- All files are well-commented. Functions are used to organize code that repeats an operation.

**10. Your submission shows adequate effort for a final project in a full-stack web development course.**
- The complexity of the project served as a learning opportunity, pushing the boundaries of our skills and knowledge in full-stack development. This experience has inspired us to dive deeper into exploration of new technologies and techniques.

**BONUS:  Incorporates Ajax that access data from a JSON file, PHP script, or API. If you implement Ajax, be sure to include how you did so in your readme file.**
- Ajax was not used in this project.
- cURL was used to make API calls to openAI's API, using their API endpoint for text-generation. A function to receive the chatGPT resposne is in gptData.php under model directory.

# Admin Login
Username: user
Password: pass

# UML Diagram
![AI Data Analytics UML Class Diagram](https://github.com/hnben/AIDataAnalytics/assets/135763064/292f0ad6-814c-4df3-8c7f-875faf6861c5)

# ER Database Diagram
<img width="1154" alt="AI Data Analytics ER Database Diagram" src="[https://github.com/hnben/AIDataAnalytics/assets/135763064/78822be0-a46c-48d3-ade8-cdac8e56f18b](https://i.imgur.com/LFaFo4d.png)https://i.imgur.com/LFaFo4d.png">


