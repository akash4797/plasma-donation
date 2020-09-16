<?php

    session_start();
    require_once("../connectiondb.php");

    $userid = $_POST["userid"];
    $password = $_POST["password"];

    if(empty($userid) || empty($password)){
        
    }else{
        $sql = "SELECT * FROM admin where AdminID = '$userid' AND Password = '$password'";
        $result = mysqli_query($con,$sql);
        $rows = mysqli_num_rows($result);

        if($rows == 1){                      
            $_SESSION['userid'] = $userid;        
            header("Location:admin.php");
        }else{
            echo "UserID or Password is incorrect!";
        }
    }

?>