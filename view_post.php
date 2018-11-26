<?php
/*
Purple Group Project v1.5
Module v5.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 11/25/2018

Module 5.0 adds the search ability for blogs posts.
*/

require "header.php";
require "includes/dbh.inc.php";

$id = $_GET['pid'];

$sql = "SELECT posttitle, postcontent, date FROM posts WHERE postid = '".htmlspecialchars($id)."'";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Connection failed: " . mysqli_connect_error());
}

$row = mysqli_fetch_assoc($res);

$postSubject = htmlspecialchars($row['posttitle']);
$postMessage = htmlspecialchars($row['postcontent']);
$postDate = htmlspecialchars($row['date']);

    if(isset($_POST['back'])) {
        header("Location: blogarchive.php");
    }

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
                    <td><?php echo htmlspecialchars($row['date']);?></td>
                    <td><?php echo htmlspecialchars($row['posttitle']);?></td>
                    <td><?php echo htmlspecialchars($row['postcontent']);?></td>
                    <br>
                </tr>
            </table>
        </div>

    <form action="view_post.php" method="post">
        <br><input type = "submit" name="back" value = "Back to Archive" >
    </form>
    </div>
</body>
</html>
