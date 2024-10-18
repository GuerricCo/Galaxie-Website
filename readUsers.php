<?php 
include("mydb.php");
$rdUsers = $mysqli->query("SELECT * from users");

$rows = $rdUsers->fetch_all(MYSQLI_ASSOC);

