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

  public static function getTop(int $n = 2000): array
  {
    global $con;
    $stmt = $con->prepare("
      SELECT
        COUNT(*),
        Song.*
      FROM SongVote
      JOIN Voter
      ON SongVote.voter_id = Voter.id
      JOIN Song
      ON SongVote.song_id = Song.id
      WHERE Voter.is_verified && !Song.is_hidden
      GROUP BY song_id
      ORDER BY COUNT(*) DESC
      LIMIT ?");
    $stmt->execute([$n]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  }
}
