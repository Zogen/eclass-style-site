<?php include 'inc/header1.php' ?>
Επικοινωνία
<?php include 'inc/header2.php' ?>

<div class="container">

    <?php
    $sql = 'SELECT * FROM emails';
    $result = mysqli_query($conn, $sql);
    $emails = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <?php if (empty($emails)) : ?>
        <p>Δεν υπάρχουν μηνύματα</p>
    <?php else: ?>
        <?php foreach ($emails as $item) : ?>
            <div class="content">
                <ul class="mylist">
                    <li>
                        <b>Από</b>: <?php echo $item['email']; ?>
                    </li>

                    <li>
                        <b>Ημερομηνία</b>: <?php echo $item['date']; ?>
                    </li>

                    <li>
                        <b>Θέμα</b>: <?php echo $item['subject']; ?>
                    </li>
                    
                    <li style="text-indent: 25px; list-style-type: none">
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