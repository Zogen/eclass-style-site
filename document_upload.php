<?php include 'inc/header1.php' ?>
Έγγραφα μαθήματος
<?php include 'inc/header2.php' ?>

<div class="container">

    <?php
    $title = $description = '';
    $titleErr = $descriptionErr = '';

    $targetDir = "files/documents/";
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (isset($_POST['submit']) && !empty($_FILES['file']['name'])) {
        if (empty($_POST['title'])) {
            $titleErr = 'Γράψτε τον τίτλο';
        } else {
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if (empty($_POST['description'])) {
            $descriptionErr = 'Γράψτε την περιγραφή';
        } else {
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }


        if (empty($titleErr && $descriptionErr)) {
            //add to database
            move_uploaded_file($_FILES['file']['name'], $targetFilePath);
            $sql = "INSERT INTO documents (title, description, location) VALUES ('$title', '$description', '$targetFilePath')";

            if (mysqli_query($conn, $sql)) {
                //success
                header('Location: documents_tutor.php');
            } else {
                //error
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }


    ?>

</div>

<?php include 'inc/footer.php' ?>