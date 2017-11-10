<?php
require_once __DIR__ . '/session_functions.php';
require_logined_session();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username');
}
header('Content-Type: text/html; charset=UTF-8');
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>世界一すごい製品のユーザー検索ページ</title>
    </head>
    <body>
        <h1>世界一すごい製品のユーザー検索ページ</h1>
        <form method="POST" action="">
            <fieldset>
                <legend>検索</legend>
                <div><font color="#ff0000"><?php echo h($errorMessage, ENT_QUOTES); ?></font></div>
                <label for="username">ユーザー名</label>
                <input type="text" id="username" name="username" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["username"])) {echo htmlspecialchars($_POST["username"], ENT_QUOTES);} ?>">
                <input type="submit" value="検索">
            </fieldset>
        </form>
    </body>
</html>

