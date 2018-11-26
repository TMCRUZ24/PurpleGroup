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

This file ends the session started by the login page and sends the user back to the home page.
*/
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
