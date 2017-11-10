<?php
require_once __DIR__ . '/session_functions.php';
require_unlogined_session();

function get_password($user)
{
    $db['host'] = "mysql:3306";
    $db['user'] = "pma";
    $db['pass'] = "pmauser";
    $db['dbname'] = "superapps";
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $db['host'], $db['dbname']);

    try {
        $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        $stmt = $pdo->prepare('SELECT * FROM users WHERE name = ?');
        $stmt->execute(array($userid));

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return $row['password'];
        } else {
            return '';
        }
    } catch (PDOException $e) {
        // $errorMessage = 'データベースエラー';
        //$errorMessage = $sql;
        // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
        // echo $e->getMessage();
        // $errorMessage = $e->getMessage();
        return '';
    }
}

function login($user, $pass)
{
    $pwd = get_password($user);
    return password_verify($pass, $pwd);
}

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'userid');
    $password = filter_input(INPUT_POST, 'password');

    if (empty($_POST["userid"])) {
        $errorMessage = 'ユーザーIDが未入力です。';
        exit;
    }
    if (empty($_POST["password"])) {
        $errorMessage = 'パスワードが未入力です。';
        exit;
    }
    if (login($username, $password)) {
        session_regenerate_id(true);
        $_SESSION['username'] = $username;
        header("Location: /");
        exit;
    } else {
        $_SESSION['username'] = $username . ":" . $password;
        $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
    }
}

header('Content-Type: text/html; charset=UTF-8');

?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
    </head>
    <body>
        <h1>世界一すごい製品のログイン画面</h1>
        <form method="POST" action="">
            <fieldset>
                <legend>ログインフォーム</legend>
                <div>session=<?=h($_SESSION['username'])?></div>
                <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
                <label for="username">ユーザーID</label><input type="text" id="userid" name="userid" placeholder="ユーザーIDを入力" value="<?php if (!empty($_POST["userid"])) {echo htmlspecialchars($_POST["userid"], ENT_QUOTES);} ?>">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <input type="submit" value="ログイン">
            </fieldset>
        </form>
    </body>
</html>