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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">
                <img src="img/purple.png" alt="PurpleGroup Logo" width="30" height="30" class="d-inline-block align-top">
                PurpleGroup
            </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogarchive.php">Blog</a>
                </li>
              </li>
            </ul>
        </div>
      
      
     <!--
          <li><a href="index.php">Home</a></li>
          <li><a href="blogarchive.php">Blog</a></li>
        </ul>
      </nav>
      <div class="header-login"> -->

        <?php
// This code allow for buttons based on whether a user is not logged in, logged in as a user or logged in as an admin.
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" class="btn btn-light" name="login-submit">Login</button>
          </form>
          <a href="registrationpage.php" class="btn btn-dark">Signup</a>';
        }
        else if (isset($_SESSION['id']) AND ($_SESSION['role'] == 1)) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-light" name="login-submit">Logout</button>
          </form>
          <form action="admin.php" method="post">
            <button type="submit" class="btn btn-dark" name="admin-submit">Admin</button>
          </form>';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" class="btn btn-dark" name="login-submit">Logout</button>
          </form>';
        }
        ?>

      </div>
    </header>
