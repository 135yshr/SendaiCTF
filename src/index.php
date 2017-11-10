<?php
require_once __DIR__ . '/session_functions.php';
require_logined_session();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>世界一すごい製品のメインページ</title>
    </head>
    <body>
        <h1>世界一すごい製品</h1>
        <ul>
            <li><a href="/logout.php?token=<?=h(generate_token())?>">ログアウト</a></li>
        </ul>
    </body>
</html>

