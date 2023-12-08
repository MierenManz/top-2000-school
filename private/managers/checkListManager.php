<?php

  class checkListManager {
    public static function checkIfInList($artist, $title) {
      global $con;
      $stmt = $con->prepare("select ... from ... where ...;");
      $stmt->bindValue(1, htmlspecialchars($artist));
      $stmt->bindValue(2, htmlspecialchars($title));
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $results;
    }
  }

?>