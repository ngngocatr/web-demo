<?php

session_start();
$message = '';

if (!isset($_SESSION['id'])){
    header('Location: login.php');
    exit;
}
else{
    $message = 'Welcome '. $_SESSION['username'] . ' !';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <a href="profile.php">Profile</a>
    <a href="changepassword.php">Change password</a>
    <a href="logout.php">Logout</a>
    <h1><?= $message ?></h1>
</body>
</html>