<?php
# 1. Đã đăng nhập
# 2. Nhập mật khẩu hiện tại
# 3. Nhập mật khẩu mới và confirm
# 4. So sánh xem có đúng password cũ không
# 5. Nếu đúng --> thực hiện UPDATE; Nếu sai --> không cho đổi mật khẩu

require_once('../src/config/database.php');

session_start();

# 1. Kiểm tra xem session có hợp lệ không
if (!isset($_SESSION['id'])){
    header("Location: login.php");
    exit;
}

# 2. Nhập mật khẩu hiện tại, mật khẩu mới và confirm
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $oldPassword = $_POST['oldPassword'] ?? '';
    $newPassword = $_POST['newPassword'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';
    $message = '';

    # Không cho phép để mật khẩu trống
    if (trim($oldPassword) === '' || trim($newPassword) === '' || trim($confirmPassword) === ''){
        echo 'Vui lòng không để mật khẩu trống!<br>';
        echo ("<a href='changepassword.php'>Back</a>");
        exit;
    }

    # So sánh xem có đúng pass cũ không
    $userID = $_SESSION['id'];
    // echo $userID;
    $sql_getOldPassword = "SELECT password_hash FROM users WHERE id = '$userID'";
    $res = $conn->query($sql_getOldPassword);
    $userInfor = $res->fetch_assoc();

    if ($oldPassword === $userInfor['password_hash']){
        if ($newPassword === $confirmPassword){
            $sql_updatePassword = "UPDATE users SET password_hash = '$newPassword' WHERE id = $userID";
            $conn->query($sql_updatePassword);
            $message = 'Đổi mật khẩu thành công';
        }
        else{
            $message = 'Mật khẩu mới phải khớp!';
        }
    }
    else{
        $message = 'Mật khẩu cũ không đúng, vui lòng nhập lại!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
</head>
<body>
    <h1>Change password</h1>
    <form action="changepassword.php" method="POST">
        <label for="oldPassword">Current password:</label><br>
        <input type="text" type="password" name="oldPassword"><br>
        <label for="newPassword">New password:</label><br>
        <input type="text" type="password" name="newPassword"><br>
        <label for="confirmPassword">Confirm password:</label><br>
        <input type="text" type="password" name="confirmPassword"><br>
        <button type="sub">Submit</button>
        <p><?= $message ?></p>
    </form>
</body>
</html>