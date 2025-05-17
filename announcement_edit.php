<?php include 'inc/header1.php' ?>
Ανακοινώσεις
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM announcements WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $edit_announcement = mysqli_fetch_assoc($res);
        ?>

        <form action="ann_edit_upload.php?id=<?php echo $id; ?>" method="POST">
            <p>
                <label for="subject"><b>Θέμα:</b></label><br>
                <input type="text" id="subject" name="subject" value=<?php echo $edit_announcement['subject'] ?>>
            </p>

            <p>
                <label for="body"><b>Κείμενο ανακοίνωσης:</b></label><br>
                <textarea id="body" name="body" required><?php echo $edit_announcement['body'] ?></textarea>
                <br>
            </p>
            <input type="submit" name='submit' value='Ενημέρωση'>
        </form>
    </div>

</div>

<?php include 'inc/footer.php' ?>