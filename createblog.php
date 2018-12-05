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

This page allows you to create a blog post.

*/

require "header.php";
require "includes/dbh.inc.php";

if (!$_SESSION['role'] == 1) {
  header("Location: index.php");
  exit();
}

      if(isset($_POST['post'])){
        $subject = strip_tags($_POST['subjectField']);
        $message = strip_tags($_POST['messageField']);

        $subject = mysqli_real_escape_string($conn, $subject);
        $message = mysqli_real_escape_string($conn, $message);

        $date = date('m/d/y  h:i');

        $sql = "INSERT INTO posts (posttitle, postcontent, date)
                VALUES ('$subject','$message','$date')";

                if($subject == "" || $message == ""){
                      echo "Please complete your post!";
                      return;
                    }
                    mysqli_query($conn, $sql);

                    header("Location: blogarchive.php");

        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>My Blogs</title>

            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        </head>
        <body style="background-color: #1abc9c">

        <div id = "main-blog-wrapper">



            <h1>My Blog Page</h1>
            <br>
            <br>
            <h2>Subject:</h2>
            <br><form action="createblog.php" method="post" enctype="multipart/form-data">
            <textarea name="subjectField" rows="1" cols="75" placeholder = "Enter a subject..."></textarea>
            <br>
            <br>
            <h2>Message:</h2>
            <textarea name="messageField" rows="10" cols="75" placeholder = "Enter a message..."></textarea>
            <input type = "submit" name="post" value = "Submit" >
    </form>

</div>
</body>
</html>
