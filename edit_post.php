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

This page allows you to edit a post. You only have access to this page if you are an admin. 

*/

  require ('header.php');
  include_once('includes/dbh.inc.php');

  if(!isset($_SESSION['id'])){
    header("Location: index.php");
    exit();
  }

if (!$_SESSION['role'] == 1) {
  header("Location: index.php");
  exit();
}


  if(!isset($_GET['pid'])) {
    header("Location: blogarchive.php?error");
    exit();
  }

  $pid = $_GET['pid'];

  if(isset($_POST['update'])) {
      $title = strip_tags($_POST['title']);
      $content = strip_tags($_POST['content']);

      $title = mysqli_real_escape_string($conn, $title);
      $content = mysqli_real_escape_string($conn, $content);

      $date = date('l jS \of F Y h:i:s A');
//This tells the database to change the data in in the database based on the variable retrieved from the url.
      $sql = "UPDATE posts SET posttitle='$title',postcontent='$content', date='$date' WHERE postid='$pid'";

      if($title == "" || $content == ""){
        echo "Please complete your post!";
        return;
      }
      mysqli_query($conn, $sql);

      header("Location: blogarchive.php");
  }

?>

<!DOCTYPE html>
 <html>
 <header>
   <title>Edit a Post</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 </header>
 <body>
        <div class="container">
          <div class="mx-auto" style="width: 1000px;">
              <h1>Edit a Post</h1>
 <?php
      $sql_get = "SELECT * FROM posts WHERE postid=$pid LIMIT 1";
      $res = mysqli_query($conn, $sql_get);

      if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)) {
          $title =$row['posttitle'];
          $content = $row['postcontent'];

          echo "<form action='edit_post.php?pid=$pid' method='post' enctype='multipart/form-data'>
            <input name='title' type='text' autofocus size='48' value='$title'><br /><br />
            <textarea name='content' row='20' cols='50'>$content</textarea><br />
            <input name='update' type='submit' value='Update'>
          </form>";
        }
      }
 ?>
    </div>
    </div>
 </body>
 </html>

<?php

  require "footer.php";
?>