<?php
require_once "../static/autoloader.php";

if ($_POST) {
  $check = UserManager::checkLoggedIn($_POST["email"], $_POST["password"]);
  if ($check) {
    header("location: index.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en" style="background-color: white;">

<head>
  <?php include "../private/components/head.php" ?>
</head>

<body style="background-color: white;">
  <?php require_once "../private/components/stemwijzerNav.php" ?>
  <div class="container">
    <div class="d-flex justify-content-center">
      <h1>Login Admin</h1>
    </div>
    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email:</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Wachtwoord:</label>
        <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" required>
      </div>
      <input type="submit" value="Inloggen" class="btn btn-primary">
    </form>
  </div>
</body>

</html>