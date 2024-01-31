<?php
$date = date('m/d/Y h:i:s a', time());
$closed = false;
// var_dump($date);
if ($date >= '12/08/2023 15:00:00 am') {
  $closed = true;
} else {
  header("location: index.php");
}
ini_set("xdebug.var_display_max_children", '-1');
ini_set("xdebug.var_display_max_data", '-1');
ini_set("xdebug.var_display_max_depth", '-1');

require_once "../static/autoloader.php";
$link = json_decode(ApiManager::getGif("cars"));
$gif = $link->results[0]->media_formats->gif->url;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Staat 'ie dr in</title>
</head>

<body>
  <img id="mainGif" src="<?php echo $gif; ?>" style="width: 100%;">
  <img id="logo_top_2000" src="img/logo/npo_radio2_top2000_logo.svg">

  <div class="container">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">
        <form method="post">
          <input id="artist_lookup" name="artist" type="text" placeholder="ARTIEST">
          <input id="song_lookup" name="song" type="text" placeholder="TITLE">

          <?php
            if ($_POST) {
              if ($_POST['artist'] == "" || $_POST['song'] == "") {
                echo "<div id='error'>! Vul alle velden in !</div>";
              } else {
                $artist = $_POST['artist'];
                $song = $_POST['song'];
                header("Location: intop2000.php?artist=$artist&song=$song");
              }
            }
          ?>
          <button type="submit" class="pixel2">STAAT 'IE ER IN?</button>
          <!-- <div class="pixel2">STAAT 'IE ER IN?</div>  -->
          <a href="#" class="pixel3">VERRAS MIJ!</a>

        </form>
      </div>
      <div class="col">

      </div>
    </div>
  </div>
</body>

</html>