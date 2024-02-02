<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/ticket.css">
  <?php require_once "../private/components/head.php"; ?>
  <title>ja</title>
</head>

<body>
  <?php require_once "../private/components/homepageNav.php"; ?>
  <div class="container">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">
        <div id="ticket_panel">
          <span id="panel_title">Reserveer je ticket</span>

          <div id="button_field">
            <span id="button_field_title">Selecteer de dag</span>
            <button onclick="showDay(25)" class="ticket_day">25e</button>
            <button onclick="showDay(26)" class="ticket_day">26e</button>
            <button onclick="showDay(27)" class="ticket_day">27e</button>
            <button onclick="showDay(28)" class="ticket_day">28e</button>
            <button onclick="showDay(29)" class="ticket_day">29e</button>
            <button onclick="showDay(30)" class="ticket_day">30e</button>
            <button onclick="showDay(31)" class="ticket_day">31e</button>
          </div>
          <div id="time_slots">
            
          </div>
        </div>
      </div>
      <div class="col">

      </div>
    </div>
  </div>
  <script>
    function showDay(day){
      
    }
  </script>
</body>

</html>