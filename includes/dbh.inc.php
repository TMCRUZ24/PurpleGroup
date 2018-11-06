<?php
/*
Purple Group Project v1.0
Login and Registration Moudule v1.0

Programers:
Tabitha Binkley
Tyson Cruz
Mathew McSpadden

last updated 11/4/2018

This module is a system for registering users and allowing them to login.
*/
/*
This file connects to the server and the database we are using.
*/

$dBServername = "purpleweb.mysql.database.azure.com";
$dBUsername = "purpleadmin@purpleweb";
$dBPassword = "";
$dBName = "purpledatabase";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
