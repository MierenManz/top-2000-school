<?php
require_once "../static/autoloader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../private/components/head.php" ?>
</head>

<body>
  <?php if (isset($_SESSION["access"]) == true) {
    require_once "../private/components/adminNav.php";
  } else {
    include "../private/components/homepageNav.php";
  }
  ?>
  <h1>Hello World</h1>
</body>

</html>
<style>
  body {
    background-color: black;
  }
</style>