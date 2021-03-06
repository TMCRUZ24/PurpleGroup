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

This is the admin page for viewing blog posts (where an admin can delete and edit posts).

Admin login for testing purposes: Username-testadmin Password-test

*/

require 'header.php';
require 'includes/dbh.inc.php';

 if (!$_SESSION['role'] == 1) {
   header("Location: index.php");
      exit();
 }
 ?>

<!DOCTYPE html>
  <html>
  <head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
      
      <div class="container">
          <div class="mx-auto" style="width: 1000px;">

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
    </div>
    </div>
  </body>
  </html>
  
<?php

  require "footer.php";
?>
