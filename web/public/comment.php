<?php
# Comment/đánh giá cho mỗi sản phẩm
# Đăng nhập mới được comment
# Hiển thị người comment, thời gian, nội dung

require_once('../src/config/database.php');

session_start();

$id = $_GET['id'];

if (!isset($_SESSION['id'])) {
    echo "<p>Bạn cần đăng nhập để bình luận. Đang chuyển đến trang đăng nhập...</p>";

    echo "
        <script>
            setTimeout(function () {
                window.location.href = 'login.php';
            }, 2000);
        </script>
    ";

    exit;
}
else{
    $user_id = $_SESSION['id'];
    $product_id = $id;
    $content = $_POST['content'] ?? '';

    if (trim($content)===''){
        echo "Nội dung không được để trống!";
        echo "
            <script>
                setTimeout(function () {
                    window.location.href = 'product.php?id=' + $id;
                }, 1200);
            </script>
        ";
    }
    else{
        $sql_postComment = "INSERT INTO comments (user_id, product_id, content) VALUES ($user_id, $product_id, '$content');";

        try{
            $conn->query($sql_postComment);
            echo "
                <script>
                    window.location.href = 'product.php?id=' + $id;
                </script>
            ";
        }
        catch(mysqli_sql_exception $e){
            echo "Bình luận chưa được gửi";
            echo "
                <script>
                    setTimeout(function () {
                        window.location.href = 'product.php?id=' + $id;
                    }, 2000);
                </script>
                
            ";
        }
    }
}
?>