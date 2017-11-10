<?php
require_once __DIR__ . '/session_functions.php';
require_logined_session();

function search_users($user) {
    $db['host'] = "mysql:3306";
    $db['user'] = "pma";
    $db['pass'] = "pmauser";
    $db['dbname'] = "superapps";
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $db['host'], $db['dbname']);
    try {
        $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        $sql = 'SELECT * FROM users WHERE name LIKE \'%' . $user . '%\'  AND delete_date IS NULL';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // return array();
        return [$e->getMessage()];
    }

}

$all = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username');
    $all = search_users($username);
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
        <hr>
        <table>
        <tr>
            <th>No</th>
            <th>ユーザー名</th>
            <th>パスワード</th>
        </tr>
        <?php foreach ($all as $row) : ?>
            <tr>
                <td><?=h($row['id'])?></td>
                <td><?=h($row['name'])?></td>
                <td><?=h($row['password'])?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        <div><?=h($sql)?></div>
    </body>
</html>

