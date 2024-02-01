<?php

require "../../connect.php";

session_start();


if (isset($_POST['updateBtn'])) {

    $name = $_POST['name'];
    $id = $_POST['id'];

    if ($name == "" || $name == null) {
        $_SESSION['error'] = "name field is required";
        return header("Location: /todo/editTodo.php?id=$id");
    } else {
        if (isset($_SESSION['error'])) {
            session_destroy();
        }
    }


    $sql = "UPDATE work SET name='$name' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header('Location: /');
    } else {
        die();
        echo "insert Fail";
    }
}
