<?php
class ArtistManager
{
  public static function allArtists()
  {
    global $con;

    $stmt = $con->prepare("select * from Artist");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}
