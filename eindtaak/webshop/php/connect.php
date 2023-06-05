<?php
$mysqli = new mysqli("localhost", "root", "", "webshop2");
$aanpassenUTF = $mysqli->query("SET NAMES utf8");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>

