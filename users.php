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

This page shows all the users for an admin.
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
    <title>Blog</title>
    <link rel='stylesheet' href='style.css'>
  </head>
  <body>
    <div class='wrapper-main'>
                <section class='section-default'>
    <h1>Users</h1>
    <?php

      $sql = "SELECT * FROM users ORDER BY idUsers DESC";

      $res = mysqli_query($conn, $sql);

      if (!$res) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $users = "";

      if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)) {
          $user = $row['uidUsers'];
          $email = $row['emailUsers'];

          $users .= "<h2>$user</a></h2>
                          <h3>$email</h3>
                          <hr  />
                          <br><br>";

                }


        echo $users;
      }
      else {
        echo "There are no posts to display!";
      }
     ?>
   </section>
 </div>
  </body>
  </html>
