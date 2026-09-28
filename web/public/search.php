<?php
    $title = "Search engine";

    $query = $_GET["q"] ?? "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seach</title>
</head>
<body>
    <h1>This is <?= $title ?></h1>

    <form action="search.php" method="GET">
        <input type="text" name="q">
        <button type="submit">Search</button>
    </form>

    <p>You search for: <?= $query ?></p>
</body>
</html>