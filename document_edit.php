<?php include 'inc/header1.php' ?>
Έγγραφα μαθήματος
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content">
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM documents WHERE id = $id";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $edit_document = mysqli_fetch_assoc($res);
        ?>

        <form action="doc_edit_upload.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <p>
                <label for="title"><b>Τίτλος:</b></label><br>
                <input type="text" id="title" name="title" value=<?php echo $edit_document['title'] ?>>
            </p>

            <p>
                <label for="description"><b>Περιγραφή:</b></label><br>
                <input type="text" id="description" name="description" value=<?php echo $edit_document['description'] ?>>
            </p>

            <p>
                <label for="body"><b>Έγγραφο:</b></label><br>
                <input type="file" name="file">
                <br>
            </p>
            <input type="submit" name='submit' value='Ενημέρωση'>
        </form>
    </div>

</div>

<?php include 'inc/footer.php' ?>