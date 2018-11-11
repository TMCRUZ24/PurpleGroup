<?php
/*
Purple Group Project v1.2
View Blog Moudule v2.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/9/2018

This module is a system for registering users and allowing them to login. It also allows users to enter blogs into a database and veiw them.
*/
/*
This file connects to the server and the database we are using.
*/

$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "purple";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
