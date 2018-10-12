<?php
if (!isset($_SESSION)) { session_start(); }
// Database credentials. Assuming u are using MySQL server with default settings.
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "test2");

// attempt to connect to database
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$errors = array();
// Check connection
if($db === false) {
    die("ERROR: Could not connect to the database. " . mysqli_connect_error());
}