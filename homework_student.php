<?php include 'inc/header1.php' ?>
Εργασίες
<?php include 'inc/header3.php' ?>

<div class="container">


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
            <h2>Εργασία <?php echo $item['id'] ?></h2>

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