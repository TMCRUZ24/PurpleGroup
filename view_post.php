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
*/

require "header.php";
require "includes/dbh.inc.php";

$id = $_GET['pid'];

$sql = "SELECT posttitle, postcontent, date FROM posts WHERE postid = '".htmlspecialchars($id)."'";
$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Connection failed: " . mysqli_connect_error());
}

$blogrow = mysqli_fetch_assoc($res);

if(isset($_POST['back'])) {
    header("Location: blogarchive.php");
}

////////////This series of statements posts any new comments left by the user as a single form submission////////////
if(isset($_POST['comment'])){

    //Pulls the username from person logged in
    $idqry = "SELECT uidusers FROM users WHERE uidUsers=?";
    $comment_uid = mysqli_query($conn, $idqry);

    //Assigns the current date/time to the comment
    $comment_datetime = date('m/d/y  h:i');

    //Pulls the comment entered into the field and enters it into the database
    $comment = strip_tags($_POST['commentField']);
    $comment = mysqli_real_escape_string($conn, $comment);

    //Enters user and comment information into database table using primary and foreign keys
    $sql = "INSERT INTO comments (comment_uid, comment_datetime, comment, comment_fk)
            VALUES ('$comment_uid','$comment_datetime','$comment', '$id')";
    mysqli_query($conn, $sql);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blogs</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                    <td><?php echo htmlspecialchars($blogrow['date']);?></td>
                    <td><?php echo htmlspecialchars($blogrow['posttitle']);?></td>
                    <td><?php echo htmlspecialchars($blogrow['postcontent']);?></td>
                    <br>
                </tr>
            </table>
        </div>

       <br><a class="button" href="blogarchive.php">Back to Archive</a>
    </div>

    <div id = "main-comment-wrapper">
        <br><h1><center>Comments: </center></h1>
        <div>
            <?php

            //Pulling comments from the database and assigning them to variables
            $commentsql = "SELECT comment_datetime, comment_uid, comment FROM comments WHERE comment_fk = '".htmlspecialchars($id)."'";
            $commentres = mysqli_query($conn, $commentsql);
            if (!$commentres) {
                 die("Connection failed: " . mysqli_connect_error());
            }
            $commentrow = "";

//////////This section blends PHP with HTML and only displays the "Comments" table when found in the database//////////
            if (mysqli_num_rows($commentres) > 0) {
            ?>
    <table id="comment-table">
    <tr>
        <th>Date:</th>
        <th>User:</th>
        <th>Comment:</th>
    </tr>
                <!--///////////////Loop displays comments in a table as long as there are comments stores///////////-->
                <?php
                    while ($commentrow = mysqli_fetch_assoc($commentres)) {
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($commentrow['comment_datetime']); ?></td>
                    <td><?php echo htmlspecialchars($commentrow['comment_uid']); ?></td>
                    <td><?php echo htmlspecialchars($commentrow['comment']); ?></td>
                </tr>
                <?php }
            }
             else {
             ?>
                 <!--/////////////If no comments are found in the database, display the following message///////////-->
                 <br><h2><center><strong>There are no posts to display!</strong></center></h2><br><br>
             <?php
                }
             ?>
    </table>
    </div><br>
        <center>
            <!--//////Form used for submission when user leaves a new comments. Stores as new row in database///////-->
            <form  method="post">
            <h1>Leave a Comment: </h1><br>
            <textarea name="commentField" rows="5" cols="50" placeholder = "Leave your own comment here..."></textarea><br>
                <br><input type = "submit" name="comment" value = "Comment" >
            </form>
        </center>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

</body>
</html>
<?php
require "footer.php";
?>
