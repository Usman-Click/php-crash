<?php include "inc/header.php" ?>

<?php

$name = $mail = $body = "";
$nameErr = $mailErr = $bodyErr = "";

if (isset($_POST["submit"])) {
  // validate 
  if (empty($_POST["name"])) {
    $nameErr = "Name cannot be empty";
  } else {
    $name = $_POST["name"];
  }

  if (empty($_POST["mail"])) {
    $mailErr = "  Mail cannot be empty";
  } {
    $mail = $_POST["mail"];
  }

  if (empty($_POST["body"])) {
    $bodyErr = "Body cannot be empty";
  } else {
    $body = $_POST["body"];
  }

  if (!empty($name) && !empty($mail) && !empty($body)) {
    $sql = "INSERT INTO users (name, mail, body) VALUES ('$name', '$mail', '$body')";
    if (mysqli_query($conn, $sql)) {
      # code...
      header("/feedback.php");
    } else {
      echo mysqli_error($conn);
    }
  }
}


?>

<img src="/php-crash/feedback/img/logo.png" class="w-25 mb-3" alt="">
<h2>Feedback</h2>
<p class="lead text-center">Leave feedback for Traversy Media</p>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["self"]) ?>" class="mt-4 w-75">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control <?php echo !empty($nameErr) ? " is-invalid" : null; ?>" id="name" name="name" placeholder="Enter your name">
    <div class="invalid-feedback">
      <?php echo $nameErr ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control <?php echo !empty($mailErr) ? " is-invalid" : null; ?>" id="mail" name="mail" placeholder="Enter your email">
    <div class="invalid-feedback">
      <?php echo $mailErr ?>
    </div>
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Feedback</label>
    <textarea class="form-control <?php echo !empty($bodyErr) ? " is-invalid" : null; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
    <div class="invalid-feedback">
      <?php echo $bodyErr ?>
    </div>
  </div>
  <div class="mb-3">
    <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
  </div>
</form>

<?php include "inc/footer.php"; ?>