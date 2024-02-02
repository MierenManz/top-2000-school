<?php
class SongManager
{
  public static function getAll(): array
  {
    global $con;

    $stmt = $con->prepare("SELECT Song.*, Artist.name as artist, Artist.id as artist_id FROM Song JOIN SongArtist ON Song.id = SongArtist.id JOIN Artist ON SongArtist.artist_id = Artist.id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public static function getPaginated($limit, $offset)
  {
    global $con;

    $stmt = $con->prepare("SELECT Song.*, Artist.name as artist, Artist.id as artist_id FROM Song JOIN SongArtist ON Song.id = SongArtist.id JOIN Artist ON SongArtist.artist_id = Artist.id LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public static function deleteSong($id)
  {
    global $con;

    $stmt = $con->prepare("delete from SongArtist where song_id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();

    $stmt = $con->prepare("delete from SongVote where song_id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();

    $stmt = $con->prepare("delete from Song where id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
  }

  public static function getSongById($id)
  {
    global $con;

    $stmt = $con->prepare("SELECT Song.*, Artist.name as artist FROM Song JOIN SongArtist ON Song.id = SongArtist.id JOIN Artist ON SongArtist.artist_id = Artist.id where Song.id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
    return $stmt->fetchObject();
  }

  public static function insertSong($name, $verborgen, $artist)
  {
    global $con;

    $stmt = $con->prepare("INSERT INTO `top2000_3`.`Song` (`name`, `is_hidden`) VALUES (?,?);");
    $stmt->bindValue(1, htmlspecialchars($name));
    $stmt->bindValue(2, htmlspecialchars($verborgen));
    $stmt->execute();

    $stmt = $con->prepare("select * from Song where name = ? and is_hidden = ?");
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $verborgen);
    $stmt->execute();
    $Song = $stmt->fetchObject();

    $stmt = $con->prepare("insert into SongArtist (`artist_id`, `song_id`) values (?,?)");
    $stmt->bindValue(1, htmlspecialchars($artist));
    $stmt->bindValue(2, $Song->id);
    $stmt->execute();
  }

  public static function updateSong($name, $verborgen, $artist, $id)
  {
    global $con;

    $stmt = $con->prepare("UPDATE `top2000_3`.`Song` SET `name` = ?, `is_hidden` = ? WHERE (`id` = ?);");
    $stmt->bindValue(1, htmlspecialchars($name));
    $stmt->bindValue(2, htmlspecialchars($verborgen));
    $stmt->bindValue(3, $id);
    $stmt->execute();

    $stmt = $con->prepare("select * from SongArtist where song_id = ?");
    $stmt->bindValue(1, $id);
    $stmt->execute();
    $Song = $stmt->fetchObject();

    $stmt = $con->prepare("UPDATE `top2000_3`.`SongArtist` SET `artist_id` = ?, `song_id` = ? WHERE (`id` = ?);");
    $stmt->bindValue(1, htmlspecialchars($artist));
    $stmt->bindValue(2, $id);
    $stmt->bindValue(3, $Song->id);
    $stmt->execute();
  }
};
