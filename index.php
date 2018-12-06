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

This is the home page.
*/


    include('header.php');
    include("includes/dbh.inc.php")

 ?>

<!DOCTYPE html>
  <html>
  <head>
    <title>PurpleGroup Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="mx-auto" style="width: 1000px;">

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
        </div>
        </div>
  </body>
  </html>


<?php

  require "footer.php";
?>
