<?php

/*
Purple Group Project
Module v7.0

Programers:
Tabitha Binkley
Tyson Cruz
Matthew McSpadden

last updated 12/09/2018

Module 7.0 adds a rating feature to each comment that's left on a given post. Each comment will display its rating
on the table, and will provide a link for the user to rate that comment. Once the comment has been rated, it will
update the score in the database to keep an accurate running "star score" for each rating it receives.
*/

require "header.php";
require "includes/dbh.inc.php";


$id = $_GET['pid'];

///////////////////This POST is used to update the scores when the form button is clicked///////////////////////////
if(isset($_POST['submitrating'])) {
    $addstars = $_POST['starselection'];

    $sql = "SELECT comment_score, num_of_ratings 
            FROM comments 
            WHERE cid = '".htmlspecialchars($id)."'";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $commentrow = mysqli_fetch_assoc($res);

    $updatescore = $commentrow['comment_score'] + $addstars;
    $update_numofratings = $commentrow['num_of_ratings'] + 1;
    $updatesql = "UPDATE comments 
                  SET comment_score = '$updatescore', 
                      num_of_ratings = '$update_numofratings'  
                  WHERE cid = '".htmlspecialchars($id)."'";
    mysqli_query($conn, $updatesql);
}

///////////////////Pulls the information from the database related to the comment being rated///////////////////
$sql = "SELECT comment_datetime, comment, comment_score, num_of_ratings, comment_fk 
        FROM comments 
        WHERE cid = '".htmlspecialchars($id)."'";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Connection failed: " . mysqli_connect_error());
}

$commentrow = mysqli_fetch_assoc($res);
$postkey = $commentrow['comment_fk'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rate It!</title>

    <link rel = "Stylesheet" href = "style.css">
</head>
<body style="background-color: #1abc9c">

<div id = "main-blog-wrapper">
    <h1>How would you rate this?</h1><br><br>
    <h2>Current Score:
        <?php
        /////////////This displays the current average rating (score divided by number of time its been rated//////////
            if(!$commentrow['comment_score'] > 0)
                echo "This comment has not yet been rated";
            else
                echo number_format($commentrow['comment_score']/$commentrow['num_of_ratings'], 1)." Stars";
        ?></h2>
        <div>
            <form method="post">
                <table>
                    <tr>
                        <th>Date: </th>
                        <th>Comment: </th>
                        <th>Rating: </th>
                    </tr>
                    <tr>
                        <td><?php echo htmlspecialchars($commentrow['comment_datetime']);?></td>
                        <td><?php echo htmlspecialchars($commentrow['comment']);?></td>
                        <td><br>
                            <select name="starselection" <?php if(isset($starsselected) && $starsselected == 'value');?>>
                                <option value = "5">5-Stars</option>
                                <option value = "4">4-Stars</option>
                                <option value = "3">3-Stars</option>
                                <option value = "2">2-Stars</option>
                                <option value = "1">1-Star</option>
                            </select>
                            <br><br>
                                 <input type= "submit" name= "submitrating" value = "Submit"><br><br>
                            <br><br>
                        </td>
                        <br>
                    </tr>
                </table>
            </form>
            <br>
        </div>
    <?php $backlink = "<h3><a href='view_post.php?pid=$postkey'>Return to Post</a></h3>";
    echo $backlink;
    ?>
</div>
</body>
</html>