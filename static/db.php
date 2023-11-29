<?php
global $config;
$dbconfig = $config->db;

$con = new PDO("mysql:host=$dbconfig->host;dbname=$dbconfig->dbname", $dbconfig->username, $dbconfig->password);
