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

This is a page that allows the user to input their user information and upload it to the database. It contains a
submit button that links to the registration.inc.php file. */

 require "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
          <div class="mx-auto" style="width: 1000px;">

<div>
        <center>
        <h2>User Registration</h2>
        </center>


    <?php
//Displays error message in the url if the registration.inc.php detects an error.
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyfields") {
            echo '<p class="signuperror">Fill in all fields!</p>';
          }
          else if ($_GET["error"] == "invaliduidmail") {
            echo '<p class="signuperror">Invalid username and e-mail!</p>';
          }
          else if ($_GET["error"] == "invaliduid") {
            echo '<p class="signuperror">Invalid username!</p>';
          }
          else if ($_GET["error"] == "invalidmail") {
            echo '<p class="signuperror">Invalid e-mail!</p>';
          }
          else if ($_GET["error"] == "passwordcheck") {
            echo '<p class="signuperror">Your passwords do not match!</p>';
          }
          else if ($_GET["error"] == "usertaken") {
            echo '<p class="signuperror">Username is already taken!</p>';
          }
        }

        else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
                echo '<p class = "signupsuccess">Signup successful!</p>';

            }
        }
    ?>

    <form class = "MyForm" action = "includes/registration.inc.php" method = "post">

      <?php

      if (!empty($_GET["uid"])) {
        echo '<input type="text" name="uid" placeholder="Username" value="'.$_GET["uid"].'">';
      }
      else {
        echo '<input type="text" name="uid" placeholder="Username">';
      }

      if (!empty($_GET["mail"])) {
        echo '<input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
      }
      else {
        echo '<input type="text" name="mail" placeholder="E-mail">';
      }
      ?>

          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwd-repeat" placeholder="Repeat Password">
        <button type="submit" name="signup-submit" class="btn btn-light">
            <a href = "createblog.php">Signup</a>
        </button>

    </form>
</div>
</body>
</html>

<?php

  require "footer.php";
?>
