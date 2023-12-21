<?php
class SongManager
{
  public static function getAll()
  {
    global $con;
    $stmt = $con->prepare("select * from Song");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
  public static function getPaginated($limit, $offset)
  {
    global $con;
    $stmt = $con->prepare("SELECT * FROM Song LIMIT :limit OFFSET :offset");
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
};
