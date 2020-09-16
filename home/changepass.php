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
    <title>Donor Request</title>
</head>
<body>
    
<?php

    session_start();

    require_once("../connectiondb.php");

    $userid = $_SESSION['userid'];
    $oldpass = $_POST['oldpassword'];
    $newpass = $_POST['newpassword'];

    $sql3 = "SELECT Password FROM user WHERE UserId='$userid'";
    $result3 = mysqli_query($con,$sql3);
    $array1 = mysqli_fetch_array($result3);
    
    if($array1[0] == $oldpass){
        $cng = "UPDATE user SET Password='$newpass' WHERE UserId='$userid'";
        mysqli_query($con,$cng);
        echo "Password has changed <br>";
        echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
    }else{
        echo "Password didn't match <br>";
        echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
    }    
    
?>

</body>
</html>
