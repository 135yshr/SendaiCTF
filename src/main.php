<?php
session_start();

if (isset($_SESSION["NAME"])) {
    header("Location: /login.php");
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>世界一すごい製品のメインページ</title>
    </head>
    <body>
        <h1>世界一すごい製品</h1>
    </body>
</html>

