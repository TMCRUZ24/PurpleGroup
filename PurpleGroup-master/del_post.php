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

This page allows an admin to delete a post. 
*/

  session_start();
  include_once("includes/dbh.inc.php");

  if(!isset($_SESSION['id']) AND (!$_SESSION['role'] == 1) ){
    header("Location: index.php");
    exit();
  }
  if(!isset($_GET['pid'])) {
    header("Location: blogViewPage.php");
    exit();
  }
  //This tells the database to drop the post given by the variable retrieved from the url
  else{
    $pid = $_GET['pid'];
    $sql = "DELETE FROM posts WHERE postid=$pid";
    mysqli_query($conn, $sql);
    header("Location: blogViewPage.php");

  }
