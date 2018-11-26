<?php
/*
Purple Group Project v1.5
Module v5.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/25/2018

Module 5.0 adds the search ability for blogs posts. 

This file connects to the server and the database we are using.
*/

$dBServername = "purpleweb.mysql.database.azure.com";
$dBUsername = "purpleadmin@purpleweb";
$dBPassword = "password2!";
$dBName = "purpledatabase";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
