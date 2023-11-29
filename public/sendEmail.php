<?php
require '../static/autoloader.php';



$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ratjetoe</title>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
</head>
<body>
<h1>Hierbij uw games</h1>
<table>
<thead>
    <tr>
        <th>Game</th>
        <th>Platform</th>
    </tr>
</thead>   
<tbody>';
// foreach ($games as $game) {
//   $html .= "  <tr>
//         <td>$game->name</td>
//         <td>$game->platform</td>
//     </tr>
// ";
// }
$html .= '
</tbody> 
</table>
</body>
</html>';

EmailManager::sendGameMail($_GET['customerId'], $html);

header('location: index.php');
