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

This page allows an admin to delete a post. 
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
