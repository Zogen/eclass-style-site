<?php include 'inc/header1.php' ?>
Ανακοινώσεις
<?php include 'inc/header2.php' ?>

<div class="container">

    <?php

    $id = $_GET['id'];
    $subject = $body = '';
    $subjectErr = $bodyErr = '';

    if (isset($_POST['submit'])) {
        if (empty($_POST['subject'])) {
            $subjectErr = 'Γράψτε το θέμα';
        } else {
            $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if (empty($_POST['body'])) {
            $bodyErr = 'Γράψτε ένα μήνυμα';
        } else {
            $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if (empty($subjectErr && $bodyErr)) {
            //add to database
            $sql = "UPDATE announcements SET body = '$body', subject = '$subject'  WHERE id = $id;";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $row = mysqli_fetch_assoc($result);

            if (mysqli_query($conn, $sql)) {
                //success
                header('Location: announcements_tutor.php');
            } else {
                //error
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }
    ?>

</div>

<?php include 'inc/footer.php' ?>