<?php


/*
Purple Group Project v1.6
Module v6.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 12/03/2018

Module 6.0 adds the feature of displaying any comments related to a blog post. All comments are displayed at the bottom
of the page. Form on the bottom is also used to leave any new comments on the currently viewed post.

This file ends the session started by the login page and sends the user back to the home page.
*/
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
