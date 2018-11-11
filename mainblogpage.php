<?php
/*
Purple Group Project v1.2
View Blog Moudule v2.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/9/2018

This module is a system for registering users and allowing them to login. It also allows users to enter blogs into a database and veiw them.
*/

require "header.php";
require "includes/dbh.inc.php";


      if(isset($_POST['post'])){
        $subject = strip_tags($_POST['subjectField']);
        $message = strip_tags($_POST['messageField']);

        $subject = mysqli_real_escape_string($conn, $subject);
        $message = mysqli_real_escape_string($conn, $message);

        $date = date('l jS \of F Y h:i:s A');

        $sql = "INSERT INTO posts (posttitle, postcontent, date)
                VALUES ('$subject','$message','$date')";

                if($subject == "" || $message == ""){
                      echo "Please complete your post!";
                      return;
                    }
                    mysqli_query($conn, $sql);

                    header("Location: index.php");

        }
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



            <h1>My Blog Page</h1>
            <br>
            <br>
            <h2>Subject:</h2>
            <br><form action="mainblogpage.php" method="post" enctype="multipart/form-data">
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
