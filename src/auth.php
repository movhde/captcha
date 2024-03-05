<?php
session_start();

$connection = require_once "Connection.php";

$email = $_POST['userEmail'];
$password = $_POST['userPass'];

$sql = "SELECT * FROM users WHERE email = :email";

$stmt = $connection->prepare($sql);

$stmt->execute([
  'email' => $email
]);

$user = $stmt->fetch();

$passwordMatch = password_verify($password, $user['password'] ?? '');

if ($user && $passwordMatch) {
  $_SESSION['incorrect_info'] = false;
  $_SESSION['loggedIn'] = $user['name'];
  header("Location: http://localhost/captchaProject/src/welcome.php");
} else {
  $_SESSION['incorrect_info'] = true;
  $_SESSION['loggedIn'] = '';
  header("Location: http://localhost/captchaProject/src/login.php");
}
