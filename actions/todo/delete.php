<?php

require "../../connect.php";

$id = $_POST['id'];

$sql = "DELETE FROM work WHERE id=$id";

try {
    if (mysqli_query($conn, $sql)) {
        echo "<script>location.assign('/')</script>";
    } else {
        var_dump(mysqli_error($conn));
    };
} catch (Exception $error) {
    var_dump($error->getMessage());
}
