<?php include 'inc/header1.php' ?>
Έγγραφα μαθήματος
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content" style="margin-top: 10px;">
        <a href="document_new.php">Προσθήκη νέου εγγράφου</a>
        <hr>
    </div>

    <?php
    $sql = 'SELECT * FROM documents';
    $result = mysqli_query($conn, $sql);
    $documents = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <?php if (empty($documents)) : ?>
        <p>Δεν υπάρχουν Έγγραφα</p>
    <?php endif; ?>

    <?php foreach ($documents as $item) : ?>
        <div class="content">
            <h2>Έγγραφο <?php echo $item['id'] . ': ' . $item['title'] . '</h2>' . "<a href='document_edit.php?id=" . $item['id'] . "'>Επεξεργασία εγγράφου</a><br>" . "<a href='document_delete.php?id=" . $item['id'] . "'>Διαγραφή εγγράφου</a>"; ?></h2>
            <div style="text-indent:25px">
                <p>
                    <i><?php echo $item['description']; ?></i><br><br>
                    <a href=<?php echo str_replace(' ', '%20', $item['location']); ?>>Download</a>
                </p>
            </div>

            <hr>
        </div>
    <?php endforeach; ?>


    <a href="#top" style="text-align: center;">back to top</a>
</div>

<?php include 'inc/footer.php' ?>