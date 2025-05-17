<?php
include "config/database.php";

$id = $_GET['id'];
$fname = $lname = $email = $password = $role = '';
$fnameErr = $lnameErr = $emailErr = $passwordErr = $roleErr = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['fname'])) {
        $fnameErr = 'Γράψτε το όνομα';
    } else {
        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['lname'])) {
        $lnameErr = 'Γράψτε το επώνυμο';
    } else {
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['email'])) {
        $emailErr = 'Γράψτε το email';
    } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($_POST['password'])) {
        $passwordErr = 'Δώστε τον κωδικό';
    } else {
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);;
    }

    if (empty($_POST['role'])) {
        $roleErr = 'Δώστε τον τύπο χρήστη';
    } else {
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);;
    }


    if (empty($fnameErr && $lnameErr && $emailErr && $passwordErr && $roleErr)) {
        //add to database
        $sql = "UPDATE users SET fname = '$fname', lname = '$lname', email = '$email', password = '$password', role = '$role' WHERE id = $id;";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $row = mysqli_fetch_assoc($result);
        
        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: users.php');
        } else {
            //error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
