<?php
session_start();
    require_once("../connectiondb.php");
    $userid = $_POST["userid"];
    $password = $_POST["password"];
    if(empty($userid) || empty($password)){
    }else{
        $sql = "SELECT * FROM user where UserId = '$userid' AND Password = '$password'";
        $result = mysqli_query($con,$sql);
        $rows = mysqli_num_rows($result);

        if($rows == 1){
            
            $infos = mysqli_fetch_array($result);           
            $_SESSION['fullname'] = $infos[0];
            $_SESSION['address'] = $infos[7];
            $_SESSION['userid'] = $userid;        
            header("Location:../home");
            //echo("<script>location.href = '../home';</script>");
        }else{
            echo "UserID or Password is incorrect!";            
        }
    }

?>