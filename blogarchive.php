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

This page is to view the blog posts (the Archive). 

*/

require "header.php";
require "includes/dbh.inc.php";
require_once("nbbc/nbbc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Archive</title>

    <link rel = "Stylesheet" href = "style.css">
</head>
<body style="background-color: #1abc9c">

<div id = "main-blog-wrapper">
<h1>Blog Archive</h1><br><br>
<h2>Search: </h2><br>
    <form method="post" action = "blogarchive.php?go" id = "searchform"]>
      <p>Please select a item type</p><br>
        <input type="radio" name="searchhow" <?php if (isset($searchtype) && $searchtype=="date") echo "checked";?> value="date">Date &nbsp;&nbsp; &nbsp;
        <input type="radio" name="searchhow" <?php if (isset($searchtype) && $searchtype=="posttitle") echo "checked";?> value="posttitle">Subject<br>
        <input type = "text" name = "searchinput"><br><br>
        <input type= "submit" name= "submitsearch" value = "Search">&nbsp;&nbsp;&nbsp;
        <input type= "submit" name= "resetsearch" value = "Reset"><br><br>
        <br><br>
    </form>
</div>
<center>
    <br><h1><strong>My Messages: </strong></h1><br>
</center>

  <?php

  require_once("nbbc/nbbc.php");

  $searchindex = "";
  $bbcode = new BBCode;

  if(isset($_POST['submitsearch'])) {
    if (empty($_POST["searchhow"])) {
      echo 'Please select a search type';
      exit();
    }
      $selected_radio = $_POST['searchhow'];
      $searchindex = htmlspecialchars($_POST['searchinput']);  //this code calls to the database asking for the post id, title, content and date.
      $sql = "SELECT postid, posttitle, postcontent, date FROM posts WHERE $selected_radio = '".htmlspecialchars($searchindex)."'";
  }
  else{
      $sql = "SELECT * FROM posts ORDER BY postid DESC";
  }

  $res = mysqli_query($conn, $sql);

  if (!$res) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $posts = "";

  if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['postid'];
          $title = $row['posttitle'];
          $date = $row['date'];

          $posts .= "<div class='wrapper-main'>
                      <section class='section-default'>
                        <h2><a href='view_post.php?pid=$id'>$title</a></h2>
                          <h3>$date</h3>
                        </section>
                      </div";
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
