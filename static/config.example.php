<?php
$config = new stdClass();

// Configure db information
$config->db = new stdClass();
$config->db->dbname = "[[DBNAME]]";
$config->db->username = "[[USERNAME]]";
$config->db->password = "[[PASSWD]]";

// Configure smtp information
$config->smtp = new stdClass();
$config->smtp->host = "smtp.example.com";
$config->smtp->username = "user@example.com";
$config->smtp->password = "[[PASSWD]]";
$config->smtp->port = "465";
