<?php

require "../../connect.php";

session_start();


if (isset($_POST['addBtn'])) {

    $name = $_POST['name'];

    if ($name == "" || $name == null) {
        $_SESSION['error'] = "name field is required";
        return header('Location: /todo/addTodo.php');
    } else {
        if (isset($_SESSION['error'])) {
            session_destroy();
        }
    }


    $sql = "INSERT INTO work (name) VALUES ('$name')";

    if (mysqli_query($conn, $sql)) {
        header('Location: /');
    } else {
        die();
        echo "insert Fail";
    }
}
