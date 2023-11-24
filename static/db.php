<?php
global $config;
$dbconfig = $config->db;

$con = new PDO("mysql:hostname=localhost;dbname=$dbconfig->dbname", $dbconfig->username, $dbconfig->password);
