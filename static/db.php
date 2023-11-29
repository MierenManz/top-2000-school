<?php
global $config;
$dbconfig = $config->db;

$con = new PDO("mysql:hostname=$dbconfig->host;dbname=$dbconfig->dbname", $dbconfig->username, $dbconfig->password);
