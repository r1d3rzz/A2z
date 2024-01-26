<?php

$email = $_POST['email'];
$password = $_POST['password'];

function redirect($path, $message = '')
{
    echo "<script>alert('$message')</script>";
    echo "<script>window.location.assign('$path')</script>";
}

if (isset($_POST['login'])) {
    session_start();
    if ($email === $_SESSION['user']['email'] && $password === $_SESSION['user']['password']) {
        redirect('/', 'Welcome Back');
    } else {
        redirect('/login.php', 'Password or Username is invalid');
    }
}
