<?php include 'inc/header1.php' ?>
Εργασίες
<?php include 'inc/header2.php' ?>

<div class="container">

    <?php
    $goals = $due = $deadline = '';
    $goalsErr = $dueErr = $deadlineErr = '';

    $targetDir = "files/homework/";
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (isset($_POST['submit']) && !empty($_FILES['file']['name'])) {
        if (empty($_POST['goals'])) {
            $goalsErr = 'Γράψτε τον τίτλο';
        } else {
            $goals = filter_input(INPUT_POST, 'goals', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if (empty($_POST['due'])) {
            $dueErr = 'Γράψτε την περιγραφή';
        } else {
            $due = filter_input(INPUT_POST, 'due', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if (empty($_POST['deadline'])) {
            $deadlineErr = 'Δώστε την προθεσμία';
        } else {
            $deadline = $_POST['deadline'];
        }


        if (empty($goalsErr && $dueErr)) {
            //add to database
            move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath);
            $sql = "INSERT INTO homework (goals, location, due, deadline) VALUES ('$goals', '$targetFilePath', '$due', '$deadline')";

            if (mysqli_query($conn, $sql)) {
                //success
                header('Location: homework_tutor.php');
            } else {
                //error
                echo 'Error: ' . mysqli_error($conn);
            }
        }
    }


    ?>

</div>

<?php include 'inc/footer.php' ?>