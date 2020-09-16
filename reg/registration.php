<?php
     
     require_once("../connectiondb.php");

     $fullname = $_POST["fullname"];
     $userid = $_POST["userid"];
     $bloodgrp = $_POST["bloodgrp"];
     $gender = $_POST["gender"];
     $age = $_POST["age"];
     $phone = $_POST["phone"];
     $address = $_POST["address"];
     $password = $_POST["password"];
     $confirmpass = $_POST["confirmpass"];
     
     $sql = "SELECT * FROM user WHERE UserId = '$userid'";
     $result = mysqli_query($con,$sql);

     $rows = mysqli_num_rows($result);   

     if($rows == 1){          
          echo "USERID already taken";
     }else{
          if($password != $confirmpass){
               echo "Password did not match";
          }else{
               $reg = "INSERT INTO user values ('$fullname','$userid','$password','$bloodgrp','$age','$gender','$phone','$address',0)";
               mysqli_query($con,$reg);
               echo("<script>location.href = './regsuccess.php';</script>");
          }

     }


?>     