<?php
# Hiển thị toàn bộ các link của sản phẩm để người dùng có thể xem

require_once("../src/config/database.php");

try{
    $sql_getProduct = "SELECT id, name, is_published FROM products";
    $res = $conn->query($sql_getProduct);
}
catch(mysqli_sql_exception $e){
    echo "<p>Lỗi kết nối DB</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <?php
    #Nếu không có sản phẩm nào được trả về
    if ($res->num_rows == 0){
        echo "<p>Không có sản phẩm nào</p>";
    }
    else{
        while ($product = $res->fetch_assoc()){
            if ($product['is_published']==='1'){
                echo '<a href="product.php?id=' . $product['id'] . '">' . $product['name'] . '</a>';
                echo "<br>\n\t";
            }   
        }
    }
    ?>
</body>
</html>