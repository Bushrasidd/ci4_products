<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'ci4_database';

try {
    $conn = new mysqli($hostname, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "Database connection successful!\n";
    
    $result = $conn->query("SHOW TABLES LIKE 'cart_items'");
    if ($result->num_rows > 0) {
        echo "cart_items table exists!\n";
        
        $result = $conn->query("DESCRIBE cart_items");
        echo "\nTable structure:\n";
        while ($row = $result->fetch_assoc()) {
            echo $row['Field'] . " - " . $row['Type'] . "\n";
        }
    } else {
        echo "cart_items table does not exist!\n";
    }
    
    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 