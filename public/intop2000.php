<?php
ini_set("xdebug.var_display_max_children", '-1');
ini_set("xdebug.var_display_max_data", '-1');
ini_set("xdebug.var_display_max_depth", '-1');
require_once("../static/autoloader.php");
// var_dump($_SESSION);
if(!$_GET){
  header('location: staatIeErIn.php');
}
$pageTitle = "";
// Temporary variables
$isInList = true;
$search = "Coldplay";
$title = "Hymn for the weekend";

// Check if the song is in the top 2000
// $list = checkListManager::checkIfInList($artist, $title);
if ($isInList == false) {
  $sadArray = array(
    "sad",
    "crying",
    "depressed",
    "sorrowful",
    "somber",
    "heartbroken"
  );
  $rand = array_rand($sadArray, 1);
  $finalSearch = $sadArray[$rand] . $search;
  $pageTitle = "Hij zit er niet in..";
} else {
  $happyArray = array(
    "happy",
    "joyful",
    "dance",
    "yay",
    "cheerful",
    "satisfied",
    "grateful"
  );
  $rand = array_rand($happyArray, 1);
  $finalSearch = $happyArray[$rand] . $search;
  $pageTitle = "Hij zit er in.";
}

// Get gif from api
$gif = json_decode(ApiManager::getGif($finalSearch));
$gifLink = $gif->results[0]->media_formats->gif->url;
//var_dump($gifLink);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/numberInList.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>ah</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col"></div>
      <div class="col">
        <img src="./img/logo/npo_radio2_top2000_logo.svg" id="logo">
      </div>
      <div class="col"></div>
    </div>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <div id="text1"><?php echo $title . " by " . $search; ?></div>
        <div id="text2">STAAT ER IN</div>
        <a style="margin: auto;" href="staatIeErIn.php" class="pixel2">ZOEK EEN LIEDJE</a>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>

<script>
  document.getElementsByTagName("body")[0].style.backgroundImage = "url('<?php echo ($gifLink); ?> ')";
</script>

</html>