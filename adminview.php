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

This page is how the admin views the features. 
*/

require 'header.php';
require 'includes/dbh.inc.php';

   // if (!$_SESSION['role'] == 1) {
   //   header("Location: index.php");
   //   exit();
   // }
 ?>

<!DOCTYPE html>
  <html>
  <head>
    <title>Blog</title>
    <link rel='stylesheet' href='style.css'>
  </head>
  <body>

    <?php
//This code calls the post from the database asking for just the post id the titles and the dates.
      $sql = "SELECT * FROM posts ORDER BY postid DESC";

      $res = mysqli_query($conn, $sql);

      if (!$res) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $posts = "";

      if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)) {
          $id = $row['postid'];
          $title = $row['posttitle'];
          $date = $row['date'];

          $admin = "<div>
                        <a href='del_post.php?pid=$id'>Delete</a>
                        &nbsp;
                        <a href='edit_post.php?pid=$id'>Edit</a>
                    </div>";
//this appends the variable created in line 29.
          $posts .= "<div class='wrapper-main'>
                      <section class='section-default'>
                        <h2><a href='view_post.php?pid=$id'>$title</a></h2>
                          <h3>$date</h3>
                            $admin
                        </section>
                      </div";

                }


        echo $posts;
      }
      else {
        echo "There are no posts to display!";
      }
     ?>

  </body>
  </html>
