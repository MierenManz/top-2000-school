<?php

use FontLib\Table\Type\head;

require_once "../static/autoloader.php";
$Song = SongManager::getAll();

if (isset($_GET["delete"])) {
  SongManager::deleteSong($_GET["delete"]);
  header("location: aSong.php");
  exit();
}

if (isset($_SESSION["access"]) == false) {
  header("location: aLogin.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en" style="background-color: white;">

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
    <h1>Liedjes Table</h1>
    <div class="d-flex justify-content-end mb-2">
      <a href="aSongAdd.php" class="btn btn-primary">+ Nummer Toevoegen</a>

    </div>
    <table id="songTable">
      <thead>
        <tr>
          <th><img src="../img/logo/npo_radio2_logo.svg" alt="" width="50" height="50"></th>
          <th>Naam</th>
          <th>Arties</th>
          <th>Verborgen</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</body>

</html>

<script>
  $(document).ready(function() {
    var page = 1;
    var loading = false;

    function loadSongs() {
      if (loading) return;

      loading = true;

      $.ajax({
        url: 'load_songs.php',
        type: 'POST',
        data: {
          page: page
        },
        success: function(data) {
          // zorgt voor delay als page gelijk is aan 1
          var delay = page === 1 ? 0 : 1000;
          setTimeout(function() {
            $('#songTable tbody').append(data);
            page++;
            loading = false;
          }, delay);
        }
      });
    }

    // laad de nummers in
    loadSongs();

    // laad meer nummers in wanneer naar beneden scrollen
    $(window).scroll(function() {
      if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        loadSongs();
      }
    });
  });
</script>