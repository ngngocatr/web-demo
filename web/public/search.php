<?php
require_once('../src/config/database.php');

$product_name = $_GET["productName"] ?? "";

$sql_searchProduct = "SELECT id, name, is_published FROM products WHERE is_published=1 AND name LIKE '%$product_name%'";

try{
    $res = $conn->query($sql_searchProduct);
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
    <title>Seach</title>
</head>
<body>
    <?php require_once("../src/helpers/header.php"); ?>
    <h1>Search engine</h1>

    <form action="search.php" method="GET">
        <input type="text" name="productName">
        <button type="submit">Search</button>
    </form>

    <p>You search for: <?= $product_name ?></p>

    <?php
    if ($product_name === ''){
        echo "<p>0 có sản phẩm</p>";
    }
    else if ($res->num_rows === 0){
        echo "<p>0 có sản phẩm</p>";
    }
    else{
        while ($product = $res->fetch_assoc()){
            echo '<a href="product.php?id=' . $product['id'] . '">' . $product['name'] . '</a>';
            echo "<br>\n\t";
        }
    }
    ?>
</body>
</html>