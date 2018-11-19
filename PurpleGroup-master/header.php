<?php
/*
Purple Group Project v1.4
Module v4.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/18/2018

This module is to setup user adminstration as well as post/blog content. This enables admins to see users/posts 
and admininster them as needed. 

This is a bar that sits at the top of the users screen and contains tabs that are currently hashed. It has
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
          <li><a href="blogViewPage.php">Blog</a></li>
          <li><a href="index.php">About me</a></li> <!--///////////This needs a link to direct to a page in the future-->
          <li><a href="index.php">Contact</a></li>  <!--///////////this needs a link to direct to a page in the future-->
        </ul>
      </nav>
      <div class="header-login">

        <?php
// This code allow for buttons based on whether a user is not logged in, logged in as a user or logged in as an admin.
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="registrationpage.php" class="header-signup">Signup</a>';
        }
        else if (isset($_SESSION['id']) AND ($_SESSION['role'] == 1)) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>
          <form action="admin.php" method="post">
            <button type="submit" name="admin-submit">Admin</button>
          </form>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="login-submit">Logout</button>
          </form>';
        }
        ?>

      </div>
    </header>