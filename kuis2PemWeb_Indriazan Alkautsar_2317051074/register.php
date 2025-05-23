<?php
include 'database.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

$stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Username sudah digunakan. Silakan coba yang lain.";
} else {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) {
        echo "Registrasi berhasil. Silakan <a href='login.html'>login</a>.";
    } else {
        echo "Terjadi kesalahan saat registrasi.";
    }
}
$stmt->close();
$conn->close();
?>
