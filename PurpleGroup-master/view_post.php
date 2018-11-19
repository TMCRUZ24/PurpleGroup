<?php
/*
Purple Group Project v1.4
Module v4.0

Programmers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/18/2018

This module is to setup user adminstration as well as post/blog content. This enables admins to see users/posts 
and admininster them as needed. 
*/

require "header.php";
require "includes/dbh.inc.php";

$id = $_GET['pid'];

$sql = "SELECT posttitle, postcontent, date FROM posts WHERE postid = '".$id."'";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Connection failed: " . mysqli_connect_error());
}

$row = mysqli_fetch_assoc($res);

$postSubject = $row['posttitle'];
$postMessage = $row['postcontent'];
$postDate = $row['date'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blogs</title>

    <link rel = "Stylesheet" href = "style.css">
</head>
<body style="background-color: #1abc9c">

<div id = "main-blog-wrapper">
    <h1>My Blogs</h1><br><br>
    <h3>My Messages: </h3>

        <div>
            <table>
                <tr>
                    <th>Date: </th>
                    <th>Subject: </th>
                    <th>Message: </th>
                </tr>
                <tr>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['posttitle'];?></td>
                    <td><?php echo $row['postcontent'];?></td>
                </tr>
            </table>
        </div>

</div>
</body>
</html>
