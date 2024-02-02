<?php
  class timeslotManager {
    public static function getTimeSlotByDay($day) {
      global $con;

      $stmt = $con->prepare("select TicketTimeslot.id, TicketTimeslot.from, TicketTimeslot.to, ");
    }
  }
?>