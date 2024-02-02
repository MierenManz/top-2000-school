<?php
class UserManager
{
  public static function checkLoggedIn($email, $password)
  {
    global $con;

    $stmt = $con->prepare("select * from User where email = ?");
    $stmt->bindValue(1, htmlspecialchars($email));
    $stmt->execute();
    $user = $stmt->fetchObject();

    if ($user) {
      if (password_verify($password, $user->password_hash)) {
        $_SESSION["access"] = true;
        return true;
      }
    } else {
      $_SESSION["access"] = false;
      return false;
    }
  }
}
