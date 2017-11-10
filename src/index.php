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
            <?php if ($_SESSION['username'] === 'admin'): ?>
            <li><a href="/users.php?token=<?=h(generate_token())?>">ユーザー管理</a></li>
            <li><a href="/flag.php?token=<?=h(generate_token())?>&key=OCr61v0yaFqYS">FLAG</a></li>
            <?php endif; ?>
            <li><a href="/logout.php?token=<?=h(generate_token())?>">ログアウト</a></li>
        </ul>
    </body>
</html>

