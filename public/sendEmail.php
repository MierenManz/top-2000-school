<?php
require '../static/autoloader.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Top 2000</title>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }
  </style>
</head>

<body>
  <h1>Top 2000 Lijst</h1>
  <table>
    <thead>
      <tr>
        <th>Artiest </th>
        <th>Nummer </th>
      </tr>
    </thead>
    <tbody>
      <?php
      // foreach ($games as $game) {
      // $html .= " <tr>
      // <td>$game->name</td>
      // <td>$game->platform</td>
      // </tr>
      // ";
      // }
      ?>
    </tbody>
  </table>
</body>

</html>

<!-- // EmailManager::sendTop2000Mail($_GET['customerId'], $html); -->

<!-- // header('location: index.php'); -->