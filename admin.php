<?php

/*
Purple Group Project v1.3
Module v3.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/11/2018

This module is a system for registering and logining in as a user by default but also allows for an admin with privleges such as viewing
what users have registered with this system, posting blogs that viewers can see and editing and deleteing posts.

This is the admin page that sets the foundation for all admin features, panels, etc. 
*/

require "header.php";
//This sends those without admin privleges back to the index page.
if (!$_SESSION['role'] == 1) {
  header("Location: index.php");
  exit();
}
?>
  <DOCTYPE! html>
  <html>
  <head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="wrapper-main">
      <section class="section-default">
      <h1>Admin Control Panel</h1>
      <form class="form-signup" action="adminview.php" method="post">
        <button type="submit" name="admin-view">Blog Posts</button>
      </form>
      <form class="form-signup" action="mainblogpage.php" method="post">
        <button type="submit" name="admin-post">New Post</button>
      </form>
      <form class="form-signup" action="users.php" method="post">
        <button type="submit" name="admin-users">View Users</button>
      </form>
      </section>
    </div>
  </body>
  </html>
