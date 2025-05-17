<?php include 'inc/header1.php' ?>
Χρήστες
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content">

        <?php
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
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            if (empty($_POST['role'])) {
                $roleErr = 'Δώστε τον τύπο χρήστη';
            } else {
                $role = $_POST['role'];
            }


            if (empty($fnameErr && $lnameErr && $emailErr && $passwordErr && $roleErr)) {
                //add to database
                $sql = "INSERT INTO users (fname, lname, email, password, role) VALUES ('$fname', '$lname', '$email', '$password', '$role')";

                if (mysqli_query($conn, $sql)) {
                    //success
                    header('Location: users.php');
                } else {
                    //error
                    echo 'Error: ' . mysqli_error($conn);
                }
            }
        }


        ?>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <p>
                <label for="fname"><b>Όνομα:</b></label><br>
                <input type="text" name="fname" id="fname" placeholder="Γράψτε το όνομα">
            </p>

            <p>
                <label for="lname"><b>Επώνυμο:</b></label><br>
                <input type="text" name="lname" id="lname" placeholder="Γράψτε το επώνυμο">
            </p>

            <p>
                <label for="email"><b>e-mail:</b></label><br>
                <input type="text" id="email" name="email" placeholder="Γράψτε το email">
            </p>

            <p>
                <label for="password"><b>password:</b></label><br>
                <input type="password" id="password" name="password" placeholder="Γράψτε τον κωδικό">
            </p>

            <p>
                <label for="role">Τύπος χρήστη:</label>
                <input list="roles" name="role" id="role">
                <datalist id="roles">
                    <option value="t">Καθηγητής</option>
                    <option value="s">Μαθητής</option>
                </datalist>
            </p>

            <input type="submit" name='submit' value='Προσθήκη' style="margin-bottom: 5%;">
        </form>
    </div>

</div>

<?php include 'inc/footer.php' ?>