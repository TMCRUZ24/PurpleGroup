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

/* This is essentially the home page. Currently it only holds a message telling the user "You are logged in!" if there
user session started and saying "You are logged out!" if there is no user session started.
*/


    include('header.php');
    include("includes/dbh.inc.php")

 ?>

<!DOCTYPE html>
  <html>
  <head>
    <title>Blog</title>
    <link rel='stylesheet' href='style.css'>
  </head>
  <body>

    <?php

      require_once("nbbc/nbbc.php");

      $bbcode = new BBCode;

      $sql = "SELECT * FROM posts ORDER BY postid DESC LIMIT 3";

      $res = mysqli_query($conn, $sql);

      if (!$res) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $posts = "";

      if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)) {
          $id = $row['postid'];
          $title = $row['posttitle'];
          $content = $row['postcontent'];
          $date = $row['date'];

          $output = $bbcode ->Parse($content);
          if(strlen($output)>1000){
              $output=substr($output,0,1000)."... <a href='view_post.php?pid=$id'>Read more";
          }


          $posts .= "<div class='wrapper-main'>
                      <section class='section-default'>
                        <h2><a href='view_post.php?pid=$id'>$title</a></h2>
                          <h3>$date</h3>
                            <p>$output</p>
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


<?php

  require "footer.php";
?>
