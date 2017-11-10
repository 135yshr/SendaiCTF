<?php
require_once __DIR__ . '/session_functions.php';
require_logined_session();

if (!validate_token(filter_input(INPUT_GET, 'token'))) {
    header('Content-Type: text/plain; charset=UTF-8', true, 400);
    exit('トークンが無効です');
}

setcookie(session_name(), '', 1);
session_destroy();
header('Location: /login.php');
