<?php

require_once("../src/config/database.php");

$username = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($username === "" || $password === ""){
        echo "Dang ki khong thanh cong\nVui long thu lai\n$e";
        return;
    }

    $sql = "INSERT INTO users (username, password_hash)
        VALUES ('$username', '$password')";

    try {
        $conn->query($sql);
        echo "Dang ki thanh cong";
    }
    catch (mysqli_sql_exception $e){
        echo "Dang ki khong thanh cong\nVui long thu lai\n$e";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <form action="register.php" method="POST">
        <input type="text" name="username" placeholder="username">
        <br>
        <input type="text" name="password" placeholder="password">
        <br>
        <button type="submit">Submit</button>
    </form>
    <p>Your username: <?= $username ?></p>
    <!-- <br> -->
    <!-- <p>Your password: <?= $password ?></p> -->
</body>
</html>