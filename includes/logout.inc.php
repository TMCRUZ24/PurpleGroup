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

/* This file ends the session started by the login page and sends the user back to the home page.
*/
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
