<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("Location:index.php");
    }
    require("../connectiondb.php");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        span{
            text-decoration: none;
            color: white;
            font-size: 2rem;
            padding: 2rem;     
        }

        .all-boxes{
            height: 60vh;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;            
        }

        .boxy{
            width: 300px;            
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: purple;
            cursor: pointer;
            border-radius: 10px; 
            transition: .3s ease;
            -webkit-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            -moz-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);           
        }

        .boxy:hover{
            opacity: .5;
        }
        
        .logout{
            text-decoration: none;
            padding: 1.5rem;
            background-color: purple;
            color: white;
            border: none;
            border-radius: 10px;
        }
        .logout:hover{
            text-decoration: none;
            color: white;   
        }
        nav{
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 2rem;
            height: 176px;
            background-image: url("../assets/nav.svg");
            background-size: contain;    
            color: white;
        }
        .navu{
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 2rem; 
            color: purple;
        }
    </style>
    <title> <?php echo $_SESSION['userid']; ?> | Home </title>
</head>
<body>
    <nav>

    </nav>
    <div class="navu">
        <h1>Welcome <?php echo $_SESSION['userid']; ?> </h1>         
        <a class="logout" href="logout.php">Logout</a>
    </div>

    <hr>

    <section>
        <div class="container">
            <div class="all-boxes">
                <div class="users boxy" onclick="seeAllUsers();">    
                    <span>See All Users</span>
                    </div>
                    <div class="donor-req boxy" onclick="donorRequests();">         
                        <span>Donor Requests</span>
                    </div>
                    <div class="approved-donor-req boxy" onclick="seeAllApproved();">   
                        <span>Approved Donor Request</span>
                    </div>
                    <div class="rejected-donor-req boxy" onclick="seeAllRejected();">
                        <span>Rejected Donor Request</span>
                    </div>
            </div>

        </div>
    </section>

<script>
    function seeAllUsers(){
        location.href = "allusers.php";
    }
    function donorRequests(){
        location.href = "donorreqs.php";
    }
    function seeAllApproved(){
        location.href = "allapprove.php";
    }
    function seeAllRejected(){
        location.href = "rejectedreq.php";
    }
</script>

</body>
</html>