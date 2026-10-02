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
    <h1><?= $title ." ". $title?>
    <?= $test_html?>
    <button id="test_Btn">Click</button>
    
    <br>
    <a href="./login.php">Login</a><br>
    <a href="./search.php">Search</a><br>
    <a href="./register.php">Register</a>

    <script src="assets/js/app.js"></script>
</body>
</html>