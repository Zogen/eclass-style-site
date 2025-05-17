<?php include 'inc/header1.php' ?>
Έγγραφα μαθήματος
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content">
        <form action="document_upload.php" method="POST" enctype="multipart/form-data">
            <p>
                <label for="title"><b>Τίτλος:</b></label><br>
                <input type="text" id="title" name="title" placeholder="Γράψτε τον τίτλο">
            </p>

            <p>
                <label for="description"><b>Περιγραφή:</b></label><br>
                <input type="text" id="description" name="description" placeholder="Γράψτε την περιγραφή">
            </p>

            <p>
                <label for="body"><b>Έγγραφο:</b></label><br>
                <input type="file" name="file">
                <br>
            </p>
            <input type="submit" name='submit' value='Ανάρτηση'>
        </form>
    </div>

</div>

<?php include 'inc/footer.php' ?>