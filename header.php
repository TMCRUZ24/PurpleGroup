<?php
/*
Purple Group Project v1.2
View Blog Moudule v1.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/9/2018

This module is a system for registering users and allowing them to login. It also allows users to enter blogs into a database and veiw them.
*/
/* This is a bar that sits at the top of the users screen and contains tabs that are currently hashed. It has
a home button to the index.php. It also has a link to the login and register page in ther is no user logged in.
and changes to a logout button linking to the logout.inc.php.
*/
  session_start();

  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>


    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/images.jpg" alt="mysql logo">
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="blogViewpage.php">Blog</a></li>
          <li><a href="#">About me</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
      <div class="header-login">

        <?php
        /* runs the code with the login buttons if no user is logged in and otherwise runs the code with the loggout button.*/
        if (!isset($_SESSION['id'])) {
          echo '<form action="loginpage.php" method="post">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="registrationpage.php" class="header-signup">Register</a>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>
          <form action="mainblogpage.php" method="post">
            <button type="submit" name="admin-submit">Admin</button>
          </form>
          ';
        }
        ?>

      </div>
    </header>
