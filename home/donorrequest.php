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
    $hospitalName = $_POST['hos'];
    $recoveryTime = $_POST['rtime'];
    $date = date("Y-m-d H:i:sa");

    $sql = "INSERT INTO donorreq values ('$userid','pending','$date','$hospitalName','$recoveryTime')";
    mysqli_query($con,$sql);

    echo "<h1>Thank you for this request.Please wait for Admin approval</h1>" . "</br> ";
    echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
?>

</body>
</html>


