<?php include 'inc/header1.php' ?>
Εργασίες
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content" style="margin-top: 10px;">
        <a href="homework_new.php">Προσθήκη νέας εργασίας</a>
        <hr>
    </div>

    <?php
    $sql = 'SELECT * FROM homework';
    $result = mysqli_query($conn, $sql);
    $homework = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <?php if (empty($homework)) : ?>
        <p>Δεν υπάρχουν Έγγραφα</p>
    <?php endif; ?>

    <?php foreach ($homework as $item) : ?>
        <div class="content">
            <h2>Εργασία <?php echo $item['id'] . '</h2>' . "<a href='homework_edit.php?id=" . $item['id'] . "'>Επεξεργασία εργασίας</a><br>" . "<a href='homework_delete.php?id=" . $item['id'] . "'>Διαγραφή εργασίας</a>"?></h2>

            <ul class="mylist">
                <li>
                    Οι στόχοι της εργασίας είναι:
                    <?php echo $item['goals'] ?>
                </li>

                <li>
                    Η εκφώνηση επισυνάπτεται <a href=<?php echo str_replace(' ', '%20', $item['location']); ?>>εδώ</a>
                </li>

                <li>
                    Παραδοτέα:
                    <?php echo $item['due'] ?>
                </li>

                <li>
                    <span style="color: red;"><b>Ημερομηνία παράδοσης:</b></span> <?php echo $item['deadline'] ?>
                </li>

            </ul>
            <hr>
        </div>
    <?php endforeach; ?>



    <a href="#top" style="text-align: center;">back to top</a>
</div>

<?php include 'inc/footer.php' ?>