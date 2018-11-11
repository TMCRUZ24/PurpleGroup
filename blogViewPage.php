<?php
/*
Purple Group Project v1.3
Module v3.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/11/2018

This module is a system for registering and logining in as a user by default but also allows for an admin with privleges such as viewing
what users have registered with this system, posting blogs that viewers can see and editing and deleteing posts.

This is the page to view blog posts.
*/
require "header.php";
require "includes/dbh.inc.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blogs</title>

    <link rel = "Stylesheet" href = "style.css">
</head>
<body style="background-color: #1abc9c">

<div id = "main-blog-wrapper">
<h1>My Blogs</h1><br><br>
<h3>My Messages: </h3>
  <?php

  require_once("nbbc/nbbc.php");

      $bbcode = new BBCode;
//this code calls to the database asking for the post id, title, content and date.
      $sql = "SELECT * FROM posts ORDER BY postid DESC";

      $res = mysqli_query($conn, $sql);

      if (!$res) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $posts = "";

      if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)) {
          $id = $row['postid'];
          $subject = $row['posttitle'];
          $message = $row['postcontent'];
          $date = $row['date'];

          $output = $bbcode ->Parse($message);
          $posts .= "<h2>$subject<h2>
                      <h3>$date</h3>
                      <br><br>
                      <p>$output</p>
                      <hr  />";
  }
          echo $posts;
}
    else {
      echo "There are no posts to display!";
    }
    ?>
</div>
</body>
</html>
