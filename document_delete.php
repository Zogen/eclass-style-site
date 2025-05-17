<?php include 'inc/header1.php' ?>
Έγγραφα μαθήματος
<?php include 'inc/header2.php' ?>

<div class="container">

    <?php
    $id = $_GET['id'];
    $sql = "DELETE FROM documents WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
        header('Location: documents_tutor.php'); //If book.php is your main page where you list your all records
        exit;
    } else {
        echo "Error deleting record";
    }
    ?>

</div>

<?php include 'inc/footer.php' ?>