<?php

namespace Config;

$database_name = "favorite_songs";
$host = "localhost";
$user = "root";
$pwd = "";
$data = [];
$dbh = NULL;

try {
    $dbh = new \PDO("mysql:host=$host;dbname=$database_name", $user, $pwd);
} catch (PDOException $e) {
    consolePrint("Error: ".$e->getMessage()."!");
}

function consolePrint($text)  {
    echo "<script>console.log($text)</script";
}