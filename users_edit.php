<?php include 'inc/header1.php' ?>
Χρήστες
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $edit_user = mysqli_fetch_assoc($res);
        ?>

        <form action="users_edit_upload.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <p>
                <label for="fname"><b>Όνομα:</b></label><br>
                <input type="text" name="fname" id="fname" value=<?php echo $edit_user['fname'] ?>>
            </p>

            <p>
                <label for="lname"><b>Επώνυμο:</b></label><br>
                <input type="text" name="lname" id="lname" value=<?php echo $edit_user['lname'] ?>>
            </p>

            <p>
                <label for="email"><b>e-mail:</b></label><br>
                <input type="text" id="email" name="email" value=<?php echo $edit_user['email'] ?>>
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

            <input type="submit" name='submit' value='Αποθήκευση' style="margin-bottom: 5%;">
        </form>
    </div>

</div>

<?php include 'inc/footer.php' ?>