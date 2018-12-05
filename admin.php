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

This is the admin page that sets the foundation for all admin features, panels, etc.

Admin login for testing purposes: Username-testadmin Password-test

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="wrapper-main">
      <section class="section-default">
      <h1>Admin Control Panel</h1>
      <form class="form-signup" action="adminview.php" method="post">
        <button type="submit" name="admin-view">Blog Posts</button>
      </form>
      <form class="form-signup" action="createblog.php" method="post">
        <button type="submit" name="admin-post">New Post</button>
      </form>
      <form class="form-signup" action="users.php" method="post">
        <button type="submit" name="admin-users">View Users</button>
      </form>
      </section>
    </div>
  </body>
  </html>
