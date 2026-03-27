PHP-MySQL Integration (Week 4)

MySQL Setup:

* MySQL is a relational database used to store structured data.
* You can set it up using XAMPP, WAMP, or MAMP for an all-in-one Apache + MySQL + PHP stack.
* Create a database and table using phpMyAdmin or MySQL command line.

Example: Creating a database and table

CREATE DATABASE my_database;

USE my_database;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(100)
);

CRUD Operations with MySQLi:

1. Connecting to MySQL using MySQLi

<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "my_database";

$conn = new mysqli($host, $user, $password, $dbname);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";
?>

2. CREATE (Insert Data)

<?php
$sql = "INSERT INTO users (name, email) VALUES ('Tsion', 'tsion@example.com')";
if($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $conn->error;
}
?>

3. READ (Select Data)

<?php
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results<br>";
}
?>

4. UPDATE (Modify Data)

<?php
$sql = "UPDATE users SET email='tsion_new@example.com' WHERE name='Tsion'";
if($conn->query($sql) === TRUE) {
    echo "Record updated successfully<br>";
} else {
    echo "Error: " . $conn->error;
}
?>

5. DELETE (Remove Data)

<?php
$sql = "DELETE FROM users WHERE name='Tsion'";
if($conn->query($sql) === TRUE) {
    echo "Record deleted successfully<br>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>

CRUD Operations with PDO:

1. Connecting with PDO

<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=my_database", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully with PDO<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

2. CREATE with PDO

<?php
$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
$stmt->execute(['name' => 'Tsion', 'email' => 'tsion@example.com']);
echo "New record created with PDO<br>";
?>

3. READ with PDO

<?php
$stmt = $pdo->query("SELECT * FROM users");
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br>";
}
?>

4. UPDATE with PDO

<?php
$stmt = $pdo->prepare("UPDATE users SET email=:email WHERE name=:name");
$stmt->execute(['email' => 'tsion_new@example.com', 'name' => 'Tsion']);
echo "Record updated with PDO<br>";
?>

5. DELETE with PDO

<?php
$stmt = $pdo->prepare("DELETE FROM users WHERE name=:name");
$stmt->execute(['name' => 'Tsion']);
echo "Record deleted with PDO<br>";
?>

Summary:

* PHP interacts with MySQL using MySQLi or PDO.
* CRUD operations allow you to Create, Read, Update, and Delete database records.
* PDO is more secure and supports prepared statements to prevent SQL Injection.
* Proper PHP-MySQL integration is essential for dynamic web applications.
