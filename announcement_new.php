<?php include 'inc/header1.php' ?>
Ανακοινώσεις
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content">

        <?php
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
                $sql = "INSERT INTO announcements (subject, body) VALUES ('$subject', '$body')";

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

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <p>
                <label for="subject"><b>Θέμα:</b></label><br>
                <input type="text" id="subject" name="subject" placeholder="Γράψτε το θέμα" required>
            </p>

            <p>
                <label for="body"><b>Κείμενο ανακοίνωσης:</b></label><br>
                <textarea id="body" name="body" cols="30" rows="4" placeholder="Γράψτε την ανακοίνωση" required></textarea>
                <br>
            </p>
            <input type="submit" name='submit' value='Ανάρτηση'>
        </form>
    </div>

</div>

<?php include 'inc/footer.php' ?>