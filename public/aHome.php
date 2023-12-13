<?php
require_once "../static/autoloader.php";
$Song = SongManager::getAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../private/components/head.php" ?>
</head>

<body style="background-color: white;">
  <?php include "../private/components/adminNav.php" ?>
  <div class="container">
    <h1>Home pagina</h1>

    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col"><img src="../img/logo/npo_radio2_logo.svg" alt="" width="50" height="50"></th>
          <th scope="col">Naam</th>
          <th scope="col">Verborgen</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($Song as $s) {
          echo "<tr>";
          echo "<td>$s->id</td>";
          echo "<td>$s->name</td>";
          if ($s->is_hidden == 0) {
            echo "<td>Nee</td>";
          } else {
            echo "<td>Ja</td>";
          }
          echo "</tb>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>

<style>
  .table {
    --bs-table-striped-color: white;
    --bs-table-striped-bg: rgb(216 34 34);
  }
</style>