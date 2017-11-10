<?php

function require_unlogined_session()
{
    @session_start();
    if (isset($_SESSION['username'])) {
        header('Location: /');
        exit;
    }
}

function require_logined_session()
{
    @session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: /login.php');
        exit;
    }
}

function generate_token()
{
    return hash('sha256', session_id());
}

function validate_token($token)
{
    return $token === generate_token();
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
?>