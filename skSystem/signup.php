<?php
$conn = new mysqli("localhost", "root", "", "sk_management");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (full_name, phone, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $full_name, $phone, $email, $password);

if ($stmt->execute()) {
    echo "<script>alert('Registration successful! You can now log in.'); window.location.href='index.html';</script>";
} else {
    // Log detailed error for admin, but show a generic message for the user
    error_log("Registration error: " . $stmt->error);
    echo "<script>alert('Error: Registration failed.'); window.location.href='index.html';</script>";
}

$stmt->close();
$conn->close();
?>
