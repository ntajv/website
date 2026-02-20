<?php
require_once 'config/database.php';

$username = 'admin';
$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Generated Hash for '$password': $hash\n";

// Update the user
$stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
if ($stmt->execute([$hash, $username])) {
    echo "Password for user '$username' has been updated successfully.\n";
} else {
    echo "Failed to update password.\n";
}

// Check if user exists
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo "User found in database.\n";
} else {
    echo "User '$username' NOT found. Creating user...\n";
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $hash])) {
        echo "User '$username' created successfully.\n";
    } else {
        echo "Failed to create user.\n";
    }
}
?>