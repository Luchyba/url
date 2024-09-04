<?php
include 'db.php';

function generateShortCode($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return substr(str_shuffle($characters), 0, $length);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $original_url = $_POST['url'];

    // Check if the URL already exists
    $stmt = $pdo->prepare("SELECT short_code FROM urls WHERE original_url = :original_url");
    $stmt->execute(['original_url' => $original_url]);
    $result = $stmt->fetch();

    if ($result) {
        $short_code = $result['short_code'];
    } else {
        $short_code = generateShortCode();
        $stmt = $pdo->prepare("INSERT INTO urls (original_url, short_code) VALUES (:original_url, :short_code)");
        $stmt->execute(['original_url' => $original_url, 'short_code' => $short_code]);
    }

    header("Location: /?shortened=" . urlencode($short_code));
    exit();
}
?>
