<?php
require_once __DIR__ . '/session_functions.php';
require_logined_session();

if (!validate_token(filter_input(INPUT_GET, 'token'))) {
    setcookie(session_name(), '', 1);
    session_destroy();
    header('Location: /login.php');
    exit;
}

if (filter_input(INPUT_GET, 'key') !== 'OCr61v0yaFqYS') {
    setcookie(session_name(), '', 1);
    session_destroy();
    header('Location: /login.php');
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Congratulations!! This is FLAG Page!!!</title>
    </head>
    <body>
        <h1>This is FLAG Page!!!</h1>
        <div>FLAG_ab88a644ace07a34d14ac5741e11a52f</div>
    </body>
</html>
