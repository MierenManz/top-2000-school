<?php
require_once "../static/autoloader.php";

if ($_POST) {
  $voterId = VoterManager::addVoter($_POST["firstname"], $_POST["lastname"], $_POST["email"], intval($_POST["gender_id"]));
  SongVoteManager::addVotes($voterId, $_POST["votes"]);
}

$genders = GenderManager::getAll();
$songs = SongManager::getAll();

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
  <script>
    async function sendForm() {
      const formdata = new FormData();
      formdata.set("firstname", document.getElementById("firstname").value);
      formdata.set("lastname", document.getElementById("lastname").value);
      formdata.set("email", document.getElementById("email").value);
      formdata.set("gender_id", document.getElementById("gender_id").value);

      const ids = [...window.selected.keys()];

      for (let i = 0; i < ids.length; i++) {
        formdata.set(`votes[${i}]`, ids[i]);
      }

      const fetchResult = await fetch("./stemwijzer.php", {
        method: "POST",
        body: formdata
      });
      location.href = "index.php";
    }
  </script>
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
        <p>Klik op insturen</p>
      </div>
      <div class="col-10">
        <h4>Informatie</h4>
        <div class="form-floating">
          <input type="text" name="firstname" id="firstname" placeholder="Voornaam" class="form-control" required maxlength="20">
          <label for="firstname">Voornaam</label>
        </div>
        <div class="form-floating">
          <input type="text" name="lastname" id="lastname" placeholder="Achternaam" class="my-1 form-control" required maxlength="30">
          <label for="firstname">Achternaam</label>
        </div>
        <div class="form-floating">
          <input type="email" name="email" id="email" placeholder="E-Mail" class="form-control" required maxlength="45">
          <label for="email">E-Mail</label>
        </div>
        <div class="form-floating my-1">
          <select class="form-control" id="gender_id" name="gender_id">
            <?php foreach ($genders as $g) : ?>
              <option value="<?= $g->id ?>"><?= $g->gender ?></option>
            <?php endforeach ?>
          </select>
          <label for="gender_id">Geslacht</label>
        </div>
        <button onclick="sendForm()" class="btn btn-success w-100">Insturen</button>
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