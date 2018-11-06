<?php
/*
Purple Group Project v1.0
Login and Registration Moudule v1.0

Programers:
Tabitha Binkley
Tyson Cruz
Mathew McSpadden

last updated 11/4/2018

This module is a system for registering users and allowing them to login.
*/

/* This is a page that contains the code to allow users to input there login information. It has a submit button that
links to the login.inc.php file.
*/

require "header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

    <link rel = "Stylesheet" href = "myLoginPageStyleSheet.css">
</head>
<body style="background-color: #1abc9c">

    <div id = "main-wrapper">
        <center>
            <h2>User Login</h2>
            <img src = "img/images.jpg" class = "PHPmySQL"/>
        </center>
        <?php
        if (!isset($_SESSION['id'])){
    echo ' <form action="includes/login.inc.php" method="post">
            <label>Username:</label><br></br>
            <input type="text" name="uid" placeholder="Type your username"><br></br>
            <label>Password:</label><br></br>
            <input type="password" name="pwd" placeholder="Type your password"><br></br>
            <button type="submit" name="login-submit">Login</button><br></br>
          </form>
          <a href="registrationpage.php"> <button type ="submit">Signup</button></a>';
    }

      ?>
    </div>
</body>
</html>
