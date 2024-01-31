<?php
require_once "../static/autoloader.php";

if (isset($_POST['page'])) {
  $page = $_POST['page'];
  $limit = 100;
  $offset = ($page - 1) * $limit;

  $songs = SongManager::getPaginated($limit, $offset); // Implement a new method to get paginated songs

  foreach ($songs as $s) {
    echo "<tr>";
    echo "<td scope='row'>$s->id</td>";
    echo "<td>$s->name</td>";
    if ($s->is_hidden == 0) {
      echo "<td>Nee</td>";
    } else {
      echo "<td>Ja</td>";
    }
    echo "<td><a type='button' class='btn' style='background-color:#e0d737; color:black;' href='aSongEdit.php?id=$s->id'>...</a></td>";
    echo "<td><a type='button' class='btn' style='background-color:#292929; color:white;' href='aSong.php?id=$s->id&delete=delete'>X</a></td>";
    echo "</tr>";
  }
}
