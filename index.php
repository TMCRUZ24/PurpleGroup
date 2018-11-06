<?php
/*
Purple Group Project v1.0
Login and Registration Moudule v1.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/4/2018

This module is a system for registering users and allowing them to login.
*/

/* This is essentially the home page. Currently it only holds a message telling the user "You are logged in!" if there
user session started and saying "You are logged out!" if there is no user session started.
*/

  require "header.php";
?>

    <main>
      <div class="wrapper-main">
        <section class="section-default">

          <?php
//checks if the user has logged in.
          if (!isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged out!</p>';
          }
          else if (isset($_SESSION['id'])) {
            echo '<p class="login-status">You are logged in!</p>';
          }
          ?>
        </section>
      </div>
    </main>

<?php

  require "footer.php";
?>
