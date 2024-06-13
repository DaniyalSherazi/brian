<?php

// PostgreSQL database connection parameters
$host = "tpdb.cpk0mqc6kde7.us-east-2.rds.amazonaws.com";
$port = "5432";
$dbname = "totalpallets";
$user = "postgres";
$password = "10171970";

try {
    // Connect to the PostgreSQL database
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL query to retrieve all users
    $stmt = $pdo->prepare("SELECT * FROM \"load\"");

    // Execute the query
    $stmt->execute();

    // Fetch all rows as associative array
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Close the database connection
    $pdo = null;

    // Send JSON response with users data
    header('Content-Type: application/json');
    echo json_encode($users);
} catch(PDOException $e) {
    // Error handling
    echo "Connection failed: " . $e->getMessage();
}
?>
