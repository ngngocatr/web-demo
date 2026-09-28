<?php

require_once("../src/config/database.php");

$username = "";
$password = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($username === "" || $password === ""){
        $message = 'Dang ki KHONG THANH CONG!<br>Tai khoan hoac mat khau khong dung format<br><a href="./register.php">Back to Register</a>';
    }
    else{
        $sql = "INSERT INTO users (username, password_hash)
                VALUES ('$username', '$password')";

        try {
            # check exsist username
            $sql_checkUserExsist = "SELECT id FROM users WHERE username='$username'";
            $res_check = $conn->query($sql_checkUserExsist);

            if ($res_check->num_rows == 0){
                $message = 'Dang ki THANH CONG!<br><a href="./register.php">Back to Register</a>';
            }
            else{
                $message = 'Username da TON TAI!<br><a href="./register.php">Back to Register</a>';
            }
        }
        catch (mysqli_sql_exception $e){;
            $message = 'Loi DB!<br><a href="./register.php">Back to Register</a>';
        }
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
        <input type="password" name="password" placeholder="password">
        <br>
        <button type="submit">Submit</button>
    </form>
    <p><?= $message ?></p>
</body>
</html>