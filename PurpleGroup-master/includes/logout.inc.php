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

This file ends the session started by the login page and sends the user back to the home page.
*/
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
