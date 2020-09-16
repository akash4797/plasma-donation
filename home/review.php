<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }
    </style>
    <title>Review</title>
</head>
<body>
    
<?php

    session_start();

    require_once("../connectiondb.php");

    $userid = $_SESSION['userid'];
    $comment = $_POST['comment'];    
    $star = $_POST['starcount'];


    $sql3 = "INSERT INTO `feedback` (`userID`, `comment`, `starcount`) VALUES ('$userid', '$comment', '$star')";
    $result3 = mysqli_query($con,$sql3);


    echo "<h1>Thank you for your review</h1> <br>";
    echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
 
    
?>

</body>
</html>