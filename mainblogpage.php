<?php

require "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blogs</title>

    <link rel = "Stylesheet" href = "myBlogPageStyleSheet.css">
</head>
<body style="background-color: #1abc9c">

<div id = "main-blog-wrapper">

    <form class = "BlogForm" action = "" method = "post"><br>

    <h1>My Blog Page</h1>
    <br>
    <br>
    <h2>Subject:</h2>
    <br>
    <textarea name="subjectField" rows="1" cols="75" placeholder = "Enter a subject..."></textarea>
    <br>
    <br>
    <h2>Message:</h2>
    <textarea name="messageField" rows="10" cols="75" placeholder = "Enter a message..."></textarea>
    <input type = "submit" id = "submit_btn" value = "Submit" >
    </form>

</div>
</body>
</html>