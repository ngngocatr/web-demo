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
    <?php require_once("../src/helpers/header.php"); ?>
    <h1><?= $message ?></h1>
</body>
</html>