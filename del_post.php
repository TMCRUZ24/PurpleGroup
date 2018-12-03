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

This page allows you to delete a post.

*/

  session_start();
  include_once("includes/dbh.inc.php");

  if(!isset($_SESSION['id']) AND (!$_SESSION['role'] == 1) ){
    header("Location: index.php");
    exit();
  }
  if(!isset($_GET['pid'])) {
    header("Location: blogarchive.php");
    exit();
  }
  //This tells the database to drop the post given by the variable retrieved from the url
  else{
    $pid = $_GET['pid'];
    $sql = "DELETE FROM posts WHERE postid=$pid";
    mysqli_query($conn, $sql);
    header("Location: blogarchive.php");

  }
