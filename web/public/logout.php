<?php
# nạp lại những thông tin từ session người dùng gửi lên
# nếu không có thì thực hiện tạo một session mới không có thông tin
session_start();

# xóa dữ liệu nằm mà session hiện tại đang chứa nằm trong $_SESSION
session_unset();

# hủy biến sess_* ở phía server
session_destroy();

# điều hướng về login.php
header("location: login.php");

?>