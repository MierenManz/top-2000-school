<?php
class SongManager
{
  public static function getAll(): array
  {
    global $con;
    $stmt = $con->prepare("SELECT Song.*, Artist.name as artist FROM Song JOIN SongArtist ON Song.id = SongArtist.id JOIN Artist ON SongArtist.artist_id = Artist.id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}
