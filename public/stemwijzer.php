<?php
require_once "../static/autoloader.php";

$songs = SongManager::getAll();
// echo json_encode($songs, JSON_THROW_ON_ERROR);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "../private/components/head.php" ?>
  <script>
    window.options = new Map();
    window.selected = new Map();

    {
      const tmp = [
        <?php foreach ($songs as $s) : ?>
          <?= json_encode($s) ?? "{}" ?>,
        <?php endforeach ?>
      ];

      for (let i = 0; i < tmp.length; i++) {
        if (tmp[i]?.id) {
          options.set(tmp[i].id, tmp[i]);
        }
      }
    }
  </script>
  <script src="./js/index.js" defer></script>
</head>

<body>
  <header>
    <img src="/img/logo/top_2000_banner.jpg" style="width: 100vw;">
  </header>
  <main class="d-flex mx-auto w-75 py-2">
    <div class="w-25">
      <div>
        <h3>Stap 1</h3>
        <p>Stem voor de ICT Campus Top 2000</p>
      </div>
      <div>
        <h3>Stap 2</h3>
        <p>Selecteer de nummers die je wilt!</p>
      </div>
      <div>
        <h3>Stap 3</h3>
        <p>Klik op versturen</p>
      </div>
      <div class="col-10">
        <h4>Informatie</h4>
        <div class="form-floating">
          <input type="text" name="firstname" id="firstname" placeholder="Voornaam" class="form-control">
          <label for="firstname">Voornaam</label>
        </div>
        <div class="form-floating">
          <input type="text" name="lastname" id="lastname" placeholder="Achternaam" class="my-1 form-control">
          <label for="firstname">Achternaam</label>
        </div>
        <div class="form-floating">
          <input type="email" name="email" id="email" placeholder="E-Mail" class="form-control">
          <label for="email">E-Mail</label>
        </div>
        <select>
          <optgroup label="geslacht">

          </optgroup>
        </select>
      </div>
    </div>
    <div class="container w-75 row">
      <div id="selected" class="mx-2 border col-5">
        Selected
      </div>
      <div id="options" class="mx-2 border col-5">
        Options
      </div>
    </div>
  </main>
</body>

</html>