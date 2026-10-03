<?php
    $title = "Test Title";
    $test_html = "<h1>hello</h1>"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once("../src/helpers/header.php"); ?>
    <h1><?= $title ." ". $title?>
    <?= $test_html?>
    <button id="test_Btn">Click</button>
    
    <br>
    <script src="assets/js/app.js"></script>
</body>
</html>