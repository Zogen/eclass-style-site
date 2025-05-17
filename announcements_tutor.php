<?php include 'inc/header1.php' ?>
Ανακοινώσεις
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content" style="margin-top: 10px;">
        <a href="announcement_new.php">Προσθήκη νέας ανακοίνωσης</a>
        <hr>
    </div>

    <?php
    $sql = 'SELECT * FROM announcements';
    $result = mysqli_query($conn, $sql);
    $announcements = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <?php if (empty($announcements)) : ?>
        <p style="text-indent: 25px">Δεν υπάρχουν Ανακοινώσεις</p>
    <?php else : ?>
        <?php foreach ($announcements as $item) : ?>
            <div class="content">
                <div>
                    <h2>Ανακοίνωση <?php echo $item['id'] . '</h2>' . "<a href='announcement_edit.php?id=" . $item['id'] . "'>Επεξεργασία ανακοίνωσης</a><br>" . "<a href='announcement_delete.php?id=" . $item['id'] . "'>Διαγραφή ανακοίνωσης</a>" ?>
                </div>


                <ul class="mylist">
                    <li>
                        <b>Ημερομηνία</b>: <?php echo $item['date']; ?>
                    </li>

                    <li>
                        <b>Θέμα</b>: <?php echo $item['subject']; ?>
                    </li>

                    <li>
                        <?php echo $item['body']; ?>
                    </li>
                </ul>

                <hr>
            </div>
        <?php endforeach; ?>

        <a href="#top" style="text-align: center;">back to top</a>

    <?php endif; ?>
</div>

<?php include 'inc/footer.php' ?>