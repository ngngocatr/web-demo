<?php
#Hiển thị chi tiết sản phẩm
#Nếu có: thực hiện truy vấn và in chi tiết sản phẩm đó
#Nếu không: in ra không có sản phẩm đó

require_once('../src/config/database.php');

$id_product = trim($_GET['id'] ?? '');

$sql_getInfoProduct = "SELECT * FROM products WHERE id=$id_product AND is_published='1';";

if ($id_product === ''){
    echo "<p>Sản phẩm không tồn tại</p>\n<br>";
    echo '<a href="products.php">Back to all products</a>';
    exit;
}

try{
    $res = $conn->query($sql_getInfoProduct); 
}
catch(mysqli_sql_exception $e){
    echo "Lỗi kết nối DB!";
    echo '<br><a href="products.php">Back to all products</a>';
    exit;
}
?>

<?php
if ($res->num_rows == 0){
    echo "Sản phẩm chưa được phát hành";
    echo '<br><a href="products.php">Back to all products</a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $product = $res->fetch_assoc();
    // if ($product['is_published']==="0"){
    //     echo "<p>Sản phẩm chưa được phát hành!</p>";
    //     exit;
    // }
    ?>
    <title><?= $product['name'] ?></title>
</head>
<body>
    <h1><?= $product['name'] ?></h1>
    <p>Giá: <?= $product['price'] ?> VNĐ</p>
    <p>Mô tả sản phẩm: <?= $product['description'] ?></p>
    <p><?php echo '<a href="products.php">Back to all products</a>'; ?></p>
    <hr>
    <h2>Comment</h2>
    <?php
    $sql_getComment = "SELECT * FROM comments WHERE product_id=$id_product";

    try {
        $res = $conn->query($sql_getComment);

        if ($res->num_rows === 0) {
            echo "<p>Không có bình luận</p>";
        } else {
            while ($comment = $res->fetch_assoc()) {
                $user_id = $comment['user_id'];
                $sql_getUsername = "SELECT username FROM users WHERE id=$user_id;";
                $res_user = $conn->query($sql_getUsername);
                $username = $res_user->fetch_assoc()['username'];
                echo '
                    <div class="comment">
                        <div class="comment-header">
                            <strong>' . $username . '</strong>
                            <span>' . $comment['created_at'] . '</span>
                        </div>

                        <p class="comment-content">
                            ' . $comment['content'] . '
                        </p>
                    </div>
                ';
            }
        }
    }
    catch (mysqli_sql_exception $e) {
    echo "<p>Lỗi kết nối DB</p>";
}
?>
    <hr>
    <form action="<?php echo 'comment.php?id=' . $id_product; ?>" method="POST">
        <input type="text" name="content">
        <button type="submit">Comment</button>
    </form>
</body>
</html>