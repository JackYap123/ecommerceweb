<?php
// Error Reporting Turn On
ini_set('error_reporting', E_ALL);

// Setting up the time zone
date_default_timezone_set('America/Los_Angeles');

// Database Configuration
$host = '127.0.0.1'; // Use 127.0.0.1 for local connection
$port = '3306'; 
$db = 'ecommerceweb';
$user = 'root';
$pass = '';

// Defining base url
define("BASE_URL", "");

// Getting Admin URL
define("ADMIN_URL", BASE_URL . "admin" . "/");

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Test the connection
    echo "Connected successfully!";
} catch (PDOException $exception) {
    // Catch and display the error
    echo "Connection failed: " . $exception->getMessage();
}
?>
