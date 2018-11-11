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

/* This is the file containg the background php code for the users to log into. It fetches the data for the users and
starts a session under for that user.
*/

 if(isset($_POST['login-submit'])) {



   require 'dbh.inc.php';


   $uid = $_POST['uid'];
   $password = $_POST['pwd'];


//checks if the fields entered in the login page are empty and sends them back to the homepage if they are.

   if(empty($uid) || empty($password)){
     header("Location: ../index.php?=emptyfields");
     exit();
   }
   else {






     $sql = "SELECT * FROM users WHERE uidUsers=?;";

     $stmt = mysqli_stmt_init($conn);

     if(!mysqli_stmt_prepare($stmt, $sql)){

       header("Location: ../signup.php?error=sqlerror");
       exit();
     }
     else{




       mysqli_stmt_bind_param($stmt, "s", $uid);

       mysqli_stmt_execute($stmt);

       $result = mysqli_stmt_get_result($stmt);

       if ($row = mysqli_fetch_assoc($result)) {

        $pwdCheck = password_verify($password, $row['pwdUsers']);

        if ($pwdCheck == false) {

          header("Location: ../index.php?error=wrongpwd");
          exit();
          }

        else if ($pwdCheck == true) {

          session_start();

          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['uid'] = $row['uidUsers'];
          $_SESSION['email'] = $row['emailUsers'];

          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?login=wronguidpwd");
        exit();
      }

     }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
 }
 else{
   header("Location: ../index.php?error");
   exit();
 }
