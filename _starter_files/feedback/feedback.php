<?php include "inc/header.php" ?>

<?php

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h2>Feedback</h2>

<?php if (empty($feedbacks)) : ?>
  <p>No feedbacks yet...</p>
<?php endif ?>

<?php foreach ($feedbacks as $feedback) : ?>
  <div class="card my-3 w-100 text-center">
    <div class="card-body">
      <?php echo  $feedback["body"] ?>
    </div>
    <div class="text-secondary mt-2">
      <?php echo "By ", $feedback["name"], " on ",  $feedback["date"]?>
    </div>
  </div>
<?php endforeach ?>


<?php include "inc/footer.php" ?>