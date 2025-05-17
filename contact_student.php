<?php include 'inc/header1.php' ?>
Επικοινωνία
<?php include 'inc/header3.php' ?>

<div class="container">

    <div class="content">
        <h2>Αποστολή e-mail μέσω web φόρμας</h2>

        <div>

            <?php
            $email = $subject = $body = '';
            $emailErr = $subjectErr = $bodyErr = '';

            if (isset($_POST['submit'])) {
                if (empty($_POST['email'])) {
                    $emailErr = 'Απαιτείται η διεύθυνση email σας';
                } else {
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                }

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

                #echo $emailErr;
                #echo $email . "<br>";
                #echo $subjectErr;
                #echo $subject . "<br>";
                #echo $bodyErr;
                #echo $body;

                if (empty($emailErr && $subjectErr && $bodyErr)) {
                    //add to database
                    $sql = "INSERT INTO emails (email, subject, body) VALUES ('$email', '$subject', '$body')";

                    if (mysqli_query($conn, $sql)) {
                        //success
                    } else {
                        //error
                        echo 'Error: ' . mysqli_error($conn);
                    }
                }
            }


            ?>



            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <p>
                    <label for="email"><b>Αποστολέας:</b></label><br>
                    <input type="email" id="email" name="email" placeholder="someone@example.com"><br>
                </p>
                <p>
                    <label for="subject"><b>Θέμα:</b></label><br>
                    <input type="text" id="subject" name="subject" placeholder="Γράψτε το θέμα">
                </p>

                <p>
                    <label for="body"><b>Κείμενο:</b></label><br>
                    <textarea id="body" name="body" cols="30" rows="4" placeholder="Γράψτε το μήνυμα σας"></textarea>
                    <br>
                </p>
                <input type="submit" name='submit' value='Αποστολή'>
            </form>
        </div>

        <hr>
    </div>

    <div class="content">
        <h2>Αποστολή e-mail με χρήση e-mail διεύθυνσης</h2>
        <p>
            Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση ηλεκτρονικού ταχυδρομείου:<br>
            <a href="https://mail.google.com/" target=”_blank”>tutor@csd.auth.test.gr</a>
        </p>
    </div>
</div>

<?php include 'inc/footer.php' ?>