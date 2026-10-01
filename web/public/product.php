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
</body>
</html>