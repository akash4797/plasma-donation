<?php

    require_once("../connectiondb.php");


    $what = $_POST["approve"];
    $userid = $_POST["thisuserid"];
    $hosname = $_POST["thishosname"];     
    $recoverytime = $_POST["thisrecover"];   

    if($what == "Approve"){
        $putdata = "UPDATE user SET isdonor = 1  WHERE UserId = '$userid'";
        $putting = mysqli_query($con,$putdata);
        echo "Approved <br>";
        echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
            
    }else{
        $putdata = "INSERT INTO rejectedreq values('$userid','$hosname',$recoverytime)";
        $putting = mysqli_query($con,$putdata);

        echo "Rejected <br>";
        echo '<form><input type="button" value="Return to previous page" onClick="javascript:history.go(-1)"></form>';
    }


    $removedata = "DELETE FROM donorreq WHERE userid='$userid'";
    $removeing = mysqli_query($con,$removedata);




?>