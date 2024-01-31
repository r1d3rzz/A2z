<?php

$conn = mysqli_connect("localhost", "rider", "123456", "code_lab");

if (!$conn) {
    echo "<pre>";
    die(print_r(mysqli_connect_error(), 1));
}

return $conn;
