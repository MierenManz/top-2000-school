<?php
class GenderManager
{
  public static function getAll(): array
  {
    global $con;
    $stmt = $con->prepare("SELECT * FROM Gender");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}
