<?php
/*
Purple Group Project v1.4
Module v4.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/18/2018

This module is to setup user adminstration as well as post/blog content. This enables admins to see users/posts 
and admininster them as needed. 

This file connects to the server and the database we are using.
*/

$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "password";
$dBName = "purpledatabase";

$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set("America/Chicago");
