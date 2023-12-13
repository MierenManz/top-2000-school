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
};
