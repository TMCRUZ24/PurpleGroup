<?php
/*
Purple Group Project v1.1
View Blog Moudule v1.0

Programers:
Tabitha Binkley
Tyson Cruz
Mathew McSpadden

last updated 11/9/2018

This module is a system for registering users and allowing them to login. It also allows users to enter blogs into a database and veiw them.
*/
require "header.php";
require "includes/dbh.inc.php";

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
<h2>My Messages: </h2><br>
  <?php

  require_once("nbbc/nbbc.php");

      $bbcode = new BBCode;
//this code calls to the database asking for the post id, title, content and date.
      $sql = "SELECT * FROM posts ORDER BY postid DESC";
      $res = mysqli_query($conn, $sql);

      if (!$res) {
        die("Connection failed: " . mysqli_connect_error());
      }

      if(mysqli_num_rows($res) > 0) {

          while ($row = mysqli_fetch_assoc($res)) {

              $message = $row['postcontent'];
              $id = $row['postid'];

              $output = $bbcode->Parse($message);

              if (strlen($output) > 100) {
                  $output = substr($output, 0, 500) . "... <a href='view_post.php?pid=$id'>Read more";
              }
              echo "<strong>";
              echo $row['date'] . "\n";
              echo nl2br($row['posttitle'] . "\n");
              echo "</strong>";
              echo nl2br($output . "\n");
              echo "<a href='view_post.php?pid=$id'>Read more</a>";
              echo nl2br("\n\n");
          }
      }
    else {
      echo "There are no posts to display!";
    }

    ?>

</div>
</body>
</html>