<?php include 'inc/header1.php' ?>
Εργασίες
<?php include 'inc/header2.php' ?>

<div class="container">

    <?php
    $id = $_GET['id'];
    $sql = "DELETE FROM homework WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: homework_tutor.php'); //If book.php is your main page where you list your all records
        exit;
    } else {
        echo "Error deleting record";
    }
    ?>

</div>

<?php include 'inc/footer.php' ?>