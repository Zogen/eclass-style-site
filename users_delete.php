<?php
include "config/database.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: users.php'); //If book.php is your main page where you list your all records
        exit;
    } else {
        echo "Error deleting record";
    }
?>
