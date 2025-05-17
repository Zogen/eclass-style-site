<?php include 'inc/header1.php' ?>
Χρήστες
<?php include 'inc/header2.php' ?>

<div class="container">

    <div class="content" style="margin-top: 10px;">
        <a href="users_new.php">Προσθήκη νέου χρήστη</a>
        <hr>
    </div>

    <?php
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <?php if (empty($users)) : ?>
        <p>Δεν υπάρχουν χρήστες</p>
    <?php endif; ?>

    <?php foreach ($users as $item) : ?>
        <div class="content">
            <h2>Χρήστης <?php echo $item['id'] . ': '. $item['fname'] . ' ' . $item['lname'] . '</h2>' . "<a href='users_edit.php?id=" . $item['id'] . "'>Επεξεργασία χρήστη</a><br>" . "<a href='users_delete.php?id=" . $item['id'] . "'>Διαγραφή χρήστη</a>"?></h2>

            <hr>
        </div>
    <?php endforeach; ?>



    <a href="#top" style="text-align: center;">back to top</a>
</div>

<?php include 'inc/footer.php' ?>