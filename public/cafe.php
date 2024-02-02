<?php
require_once "../static/autoloader.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ya</title>
  <link rel="stylesheet" href="css/cafe.css">
  <?php require_once "../private/components/head.php"; ?>
</head>

<body>
  <?php if (isset($_SESSION["access"]) == true) {
    require_once "../private/components/adminNav.php";
  } else {
    include "../private/components/homepageNav.php";
  }
  ?> <div id="img_row">
    <div id="img_text">Het NPO Radio 2 Top 2000 Café</div>
    <img id="img" src="img/cafe/unknown_top_2000_cafe.webp">
  </div>
  <div class="container">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">
        <button onclick="window.location.href='ticket.php';" id="buy_tickets">Tickets reserveren</button>
      </div>
      <div class="col">

      </div>
    </div>
  </div>
</body>

</html>