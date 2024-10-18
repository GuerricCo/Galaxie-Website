<?php
$mysqli = new mysqli("localhost", "root", "", "td1");

if ($mysqli->connect_error) {
    error_log('Connection error: ' . $mysqli->connect_error);
}
