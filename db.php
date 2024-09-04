<?php
$host = 'localhost';
$db = 'url';
$user = 'root'; // Default for XAMPP/MAMP
$pass = '';     // Default for XAMPP/MAMP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
