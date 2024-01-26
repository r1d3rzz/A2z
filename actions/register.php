<?php


$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

function redirect($path, $message = '')
{
    echo "<script>alert('$message')</script>";
    echo "<script>window.location.assign('$path')</script>";
}

function passwordCheck($password)
{
    $capitalStatus = false;
    $smallStatus = false;
    $numberStatus = false;

    if (preg_match('/[A-Z]/', $password)) {
        $capitalStatus = true;
    }

    if (preg_match('/[a-z]/', $password)) {
        $smallStatus = true;
    }

    if (preg_match('/[0-9]/', $password)) {
        $numberStatus = true;
    }

    if ($capitalStatus == true && $smallStatus == true && $numberStatus == true) {
        return true;
    }
}

if (isset($_POST['register'])) {
    if ($name !== '' && $email !== '' && $password !== '' && $confirm_password !== '') {
        if (strlen($password) >= 6 && strlen($confirm_password) >= 6) {
            if (passwordCheck($password)) {
                if ($password === $confirm_password) {
                    session_start();

                    $_SESSION['user'] = [
                        'name' => $name,
                        'email' => $email,
                        'password' => $password,
                    ];

                    return redirect("/login.php", "Register Success");
                } else {
                    redirect("/register.php", "Password do not match Confrim Password");
                }
            } else {
                redirect("/register.php", "Password is Weak.");
            }
        } else {
            redirect("/register.php", "Password Need at least 6 characters");
        }
    } else {
        redirect("/register.php", "Please fill this register Form");
    }
}
