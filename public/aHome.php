<?php
require_once "../static/autoloader.php";
$Song = SongManager::getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../private/components/head.php" ?>
  <style>
    body {
      background-color: white;
    }

    .container {
      margin-top: 20px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    tr {
      border: 1px solid black;

    }

    th {
      background-color: black;
      color: white;
    }

    tr:nth-child(odd) {
      background-color: rgb(216, 34, 34);
      color: white;
    }

    tr:nth-child(even) {
      background-color: white;
      color: black;
    }
  </style>
</head>

<body>
  <?php include "../private/components/adminNav.php" ?>
  <div class="container">
    <h1>Home pagina</h1>

    <table>
      <thead>
        <tr>
          <th><img src="../img/logo/npo_radio2_logo.svg" alt="" width="50" height="50"></th>
          <th>Naam</th>
          <th>Verborgen</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($Song as $s) {
          echo "<tr>";
          echo "<td scope='row'>$s->id</td>";
          echo "<td>$s->name</td>";
          if ($s->is_hidden == 0) {
            echo "<td>Nee</td>";
          } else {
            echo "<td>Ja</td>";
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>