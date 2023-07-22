<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=your_database_name', 'acore', 'acore');
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
