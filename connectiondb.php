<?php
   

    $con = mysqli_connect("localhost","root","");

    if($con->connect_error){
        die("Connection Failed: " . $con->connect_error);
    }else{

        $db = mysqli_select_db($con,"plasma_donation");        
    }


?>