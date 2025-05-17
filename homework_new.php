<?php include 'inc/header1.php' ?>
Εργασίες
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content">
        <form action="homework_upload.php" method="POST" enctype="multipart/form-data">
            <p>
                <label for="goals"><b>Στόχοι:</b></label><br>
                <textarea name="goals" id="goals" cols="30" rows="4" placeholder="Γράψτε τους στόχους"></textarea>
            </p>

            <p>
                <label for="due"><b>Παραδοτέα:</b></label><br>
                <textarea name="due" id="due" cols="30" rows="4" placeholder="Αναγράψτε τα παραδοτέα"></textarea>
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