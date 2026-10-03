<?php
#Kiểm tra xem đã có session được khởi tạo chưa, nếu chèn vào một trang có rồi thì không tạo session mới nữa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<link rel="stylesheet" href="/web-demo/assets/css/style.css">
<nav class="navbar">
    <a href="/web-demo/dashboard.php">Dashboard</a>

    <?php if (isset($_SESSION['id'])): ?>

        <a href="/web-demo/profile.php">Profile</a>
        <a href="/web-demo/changepassword.php">Change password</a>
        <a href="/web-demo/products.php">Products</a>
        <a href="/web-demo/search.php">Search</a>
        <a href="/web-demo/logout.php">Logout</a>

    <?php else: ?>

        <a href="/web-demo/login.php">Login</a>
        <a href="/web-demo/register.php">Register</a>

    <?php endif; ?>
</nav>

<hr>