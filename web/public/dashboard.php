<?php

session_start();
$message = '';

if (!isset($_SESSION['id'])){
    header('location: login.php');
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
    <h1><?= $message ?></h1>
</body>
</html>