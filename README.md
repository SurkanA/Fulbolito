<p align="center">
  <a href="https://github.com/user-attachments/assets/36cf261c-e7e1-425e-bcd7-c5866b2a1764">
    <img src="https://github.com/user-attachments/assets/36cf261c-e7e1-425e-bcd7-c5866b2a1764" alt="Node.js logo" height="140">
  </a>
</p>

## Description

A web application for managing soccer teams and players.

## Features

- **Team Management**: Create, edit, and delete football teams.
- **Player Management**: Add, edit, and delete players for each team.
- **Authentication**: User registration and login functionality.
- **API**: REST.

## Technologies Used

- **Frontend**: Bootstrap
- **Backend**: PHP
- **Database**: MariaDB
- **Authentication**: Basic Auth
- **Templating Engine**: Smarty

## Installation

Follow these steps to install and run the application on your local environment using XAMPP:

1. **Download the Project**
- Clone the repository.
     
   ```
   git clone https://github.com/SurkanA/Fulbolito.git
   ```

2. **Move Files**
- Copy the project folder into the `htdocs` directory of your XAMPP installation.

    ```
    C:\xampp\htdocs
    ```

3. **Create the Database**
- Open phpMyAdmin by navigating to `http://localhost/phpmyadmin`.
- Create a new database named `soccer`.
- Import the SQL file to set up the necessary tables.

4. **Configure Database Connection**
- Open the configuration file (`config.php`) and update the database connection details:

  ```
  $dbHost = 'localhost';
  $dbUser = 'root';
  $dbPass = '';
  $dbName = 'soccer';
  ```

5. **Start XAMPP**
- Launch the XAMPP control panel and ensure that both Apache and MySQL are running.

6. **Access the Application**
- Open your browser and go to `http://localhost/fulbolito` to view and use the application.
  
  ```
  username: webadmin
  password: admin
  ```
