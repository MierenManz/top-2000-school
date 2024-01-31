<?php
class SongVoteManager
{
  public static function addVotes(int $voterId, array $songIds)
  {
    global $con;
    $stmt = $con->prepare("INSERT INTO SongVote (voter_id, song_id) VALUES (?,?)");
    foreach ($songIds as $songId) {
      $stmt->execute([$voterId, $songId]);
    }
  }
}
