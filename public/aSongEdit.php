<?php

require_once "../static/autoloader.php";
$Song = SongManager::getSongById($_GET["id"]);
$artists = ArtistManager::allArtists();

if ($_POST) {
  if ($_POST["isHidden"] == 'on') {
    $isHidden = 1;
  } else {
    $isHidden = 0;
  }
  SongManager::updateSong($_POST["name"], $isHidden, $_POST["artist"], $_GET["id"]);
  header("location: aSong.php");
  exit();
}

if (isset($_SESSION["access"]) == false) {
  header("location: aLogin.php");
  exit();
}
var_dump($Song);
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
    <h1>Liedjes Wijzigen</h1>
    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Naam van het nummer:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $Song->name ?>" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Naam van het nummer:</label>

        <select class="form-select" aria-label="Default select example" name="artist">
          <?php foreach ($artists as $artist) :
            if ($artist->name == $Song->artist) {
              $selected = "selected";
            } else {
              $selected = "";
            }
          ?>
            <option value="<?= $artist->id ?>" <?= $selected ?>><?= $artist->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3 form-check">
        <?php
        if ($Song->is_hidden == 1) {
          $checked = "checked";
        } else {
          $checked = "";
        }
        ?>
        <input type="checkbox" class="form-check-input" id="exampleCheck1" <?= $checked ?> name="isHidden">
        <label class="form-check-label" for="exampleCheck1">Verborgen nummer</label>
      </div>
      <input type="submit" value="Wijzigen" class="btn btn-primary">
    </form>
  </div>
</body>

</html>