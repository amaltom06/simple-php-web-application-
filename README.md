# simple-php-web-application-
The provided PHP and HTML code represents a simple web application for managing information about movies, specifically those related to the actor Mammootty. Users can add new movie details, including the name, release year, box office status, director, and genre. Additionally, users can search for movies based on the release year.

#Steps to Create a Database in phpMyAdmin:

*Access phpMyAdmin:
Open your web browser and navigate to your phpMyAdmin URL (usually http://localhost/phpmyadmin).
Log in with your MySQL credentials.

*Create a New Database:
On the phpMyAdmin dashboard, locate the "Databases" tab.
Enter a name for your database in the "Create database" field, for example, "mammootty."
Choose a collation (usually, the default is fine).
Click the "Create" button to create the new database.

*Create a Table:
After creating the database, click on its name in the left sidebar to select it.
Navigate to the "SQL" tab.
In the SQL query box, paste the following SQL code to create a table:

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `boxoffice` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Click the "Go" button to execute the query and create the table.

*Insert Sample Data (Optional):
If you want to insert sample data, navigate to the "Insert" tab.
Enter sample movie details and click the "Go" button to insert the data.

*Integrate with Code:
Open the PHP code file (m.php) and update the database connection details (hostname, username, password, and database name) in the $conn variable.

$conn = mysqli_connect("localhost", "your_username", "your_password", "mammootty");

*Run the Application:
Save your changes and run the PHP and HTML code on a local server.
Access the application through a web browser.


Now, your web application is connected to the newly created database in phpMyAdmin. Users can add movie details, and the data will be stored in the "movies" table within the "mammootty" database.
