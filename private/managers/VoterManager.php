<?php
class VoterManager
{
  public static function addVoter(string $firstname, string $lastname, string $email, int $gender_id): int
  {
    global $con;
    $stmt = $con->prepare("INSERT INTO Voter (firstname, lastname, email, gender_id, country_id, is_verified, verification_code) VALUES (?,?,?,?, 1, 0, uuid())");
    $stmt->execute([$firstname, $lastname, $email, $gender_id]);
    return $con->lastInsertId();
  }
}
