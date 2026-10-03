<?php
session_start();

require_once('../src/config/database.php');

$username = '';
$password = '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Username or password = NULL --> err
    if ($username === '' || $password === ''){
        $message = 'Tài khoản hoặc hoặc mật khẩu KHÔNG chính xác!';
    }
    // username and password not NULL
    else{
        try{
            $sql_auth = "SELECT * 
                        FROM users 
                        WHERE username = '$username'
                        AND password_hash = '$password'";
            $res = $conn->query($sql_auth);

            # if res > 0 --> username and password valid --> redirect to dashboard
            if ($res->num_rows > 0){
                $user = $res->fetch_assoc(); # get table from above query
                $_SESSION['id'] = $user['id']; # set cookie
                $_SESSION['username'] = $user['username'];

                # generate new PHPSESSION 
                session_regenerate_id(true);

                header('Location: dashboard.php');
                $message = "Đăng nhập thành công!<br>" . $res->num_rows;
                exit;
            }
            # if res = 0 --> username or password is invalid --> redirect ro login.php
            else{
                header("Location: login.php");
                $message = 'Tài khoản hoặc hoặc mật khẩu KHÔNG chính xác!';
            }
        }
        catch (mysqli_sql_exception $e){
            $message = "Loi ket noi DB!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web-demo/assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login Page</h1>
    <form method="POST"">
        <input type="text" name="username" placeholder="username"><br>
        <input type="password" name="password" placeholder="password"><br>
        <button type="submit">Login</button>
    </form>
    <a href="register.php" name>Bạn chưa có tài khoản?</a>
    <p><?= $message ?></p>
</body>
</html>
