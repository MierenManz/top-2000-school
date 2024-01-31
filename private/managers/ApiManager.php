<?php
//AIzaSyDIQiW1_2F7qMC0eRV0NZ6zFqj-T3DEBoY <-- api key
class ApiManager {
  public static function getGif($search) {
    $apiKey = "AIzaSyBqYvnl3KigSYR-OGaUIuEG4Rs4zM49cTE";
    $searchEncode = urlencode($search);
    $url = "https://g.tenor.com/v2/search?q=$searchEncode&key=$apiKey&limit=1";
    $ch = curl_init($url);
    // Set curl options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    // return $response;
    if (curl_errno($ch)) {
      return 'cURL error: ' . curl_error($ch);
    } else {
      // Get HTTP status code
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      // Check if the request was successful (HTTP status code 2xx)
      if ($httpCode >= 200 && $httpCode < 300
      ) {
        // API request was successful, handle the response
        return $response;
      } else {
        // Return error
        return 'HTTP error ' . $httpCode . ': ' . $response;
      }
    }
  }
}

?>