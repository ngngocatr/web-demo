<?php
# kết nối DB
require_once('../src/config/database.php');

# lấy session mà trình duyệt gửi lên
session_start();

# nếu session không có thông tin --> chưa đăng nhập --> chuyển về login.php
if (!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}

# thực hiện in ra những thông tin của người dùng
$userId = $_SESSION['id'];
$sql_get_infor = "SELECT id, username FROM users WHERE id = $userId";

$res = $conn->query($sql_get_infor);

# kiểm tra nếu tồn tại thì mới thực hiện in người dùng
if ($res->num_rows > 0){
    $user = $res->fetch_assoc();
}
else{
    echo "<p>Người dùng không hợp lệ</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php require_once("../src/helpers/header.php"); ?>
    <p>ID: <?= $user['id']; ?></p>
    <p>Username: <?= $user['username']; ?></p>
</body>
</html>