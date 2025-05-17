<?php include 'inc/header1.php' ?>
Εργασίες
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM homework WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $edit_homework = mysqli_fetch_assoc($res);
        ?>

        <form action="hwk_edit_upload.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <p>
                <label for="goals"><b>Στόχοι:</b></label><br>
                <textarea name="goals" id="goals" cols="30" rows="4"><?php echo $edit_homework['goals'] ?></textarea>
            </p>

            <p>
                <label for="due"><b>Παραδοτέα:</b></label><br>
                <textarea name="due" id="due" cols="30" rows="4"><?php echo $edit_homework['due'] ?></textarea>
            </p>

            <p>
                <label for="deadline"><b>Προθεσμία (ημερομηνία & ώρα):</b>:</label><br>
                <input type="datetime-local" id="deadline" name="deadline">
            </p>

            <p>
                <label for="body"><b>Αρχείο εκφώνησης:</b></label><br>
                <input type="file" name="file">
                <br>
            </p>
            <input type="submit" name='submit' value='Ανάρτηση' style="margin-bottom: 5%;">
        </form>
    </div>

</div>

<?php include 'inc/footer.php' ?>