<?php

require_once "../static/autoloader.php";
// $Song = SongManager::getSongById($_GET["id"]);
if ($_POST) {
  if ($_POST["isHidden"] == 'on') {
    $isHidden = 1;
  } else {
    $isHidden = 0;
  }
  SongManager::insertSong($_POST["name"], $isHidden, $_POST["artist"]);
  header("location: aSong.php");
  exit();
}
$artists = ArtistManager::allArtists();
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
    <h1>Liedje Toevoegen</h1>
    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Naam van het nummer:</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Naam van artiest:</label>

        <select class="form-select" aria-label="Default select example" name="artist">
          <?php foreach ($artists as $artist) : ?>
            <option value="<?= $artist->id ?>"><?= $artist->name ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="isHidden">
        <label class="form-check-label" for="exampleCheck1">Verborgen nummer</label>
      </div>
      <input type="submit" value="Toevoegen" class="btn btn-primary">
    </form>
  </div>
</body>

</html>