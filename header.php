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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>


    <header>
      <nav class="nav-header-main">
        <a class="header-logo" href="index.php">
          <img src="img/purple.png" alt="mysql logo">
        </a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="blogarchive.php">Blog</a></li>
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
