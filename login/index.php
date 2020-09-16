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

        h1{
            text-align: center;
        }

        input,select{
            width: 500px;
            margin-top: 10px;
            padding: 5px;            
        }    

        input:focus{
            outline: none;
        }

        label{
            transform: translateY(10px);
        }

        form{
            display: flex;
            flex-direction: column;            
            align-items: center;
        }
        .warning{
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        .login{
            text-align: center;
            margin-top: 10px;
        }
        input[type=text],input[type=number],input[type=password],input[type=tel],select{
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid black;
        }
        input[type=submit]{
            padding: 1.5rem;
            background-color: purple;
            color: white;
            border: none;
            border-radius: 10px;
            -webkit-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            -moz-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
        }
        li{
            list-style: none;
            margin-left: 15px;        
        }

        .navu a{
            text-decoration: none;
            color: black;
            font-size: 2rem;
            padding: 2rem;                           
        }

        .navu a:hover{
            text-decoration: none;
            border-bottom: 2px solid purple;
            color: purple;             
        }
        .navu a:active{
            text-decoration: none;                 
        }

        .logo{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;     
        }


        .logo img{
            width: 50px;
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

        ul{
            display: flex; 
            justify-content: center;
            align-items: center;   
        }

        .navu{
            display: flex;
            justify-content: space-around;
            align-items: flex-start;  
            color: purple;
        }

        .coverr{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        footer{       
            background-color: red;
            background-image: url("../assets/back.png");   
            background-size: cover;
            height: 527px;
        }

    </style>  
    <title>Login | PlasmaDO</title>
</head>
<body>
            <nav>

            </nav>
            <div class="navu">
            <div href="#" class="logo">
                        <img src="../assets/blood.svg?<?=filemtime("../assets/blood.svg")?>" alt="">
                        <h5><b>PlasmaDo</b></h5>
                    </div>
                    <ul>
                        <li> <a href="../index.php">Home</a> </li>
                        <li> <a href="#">About</a> </li>
                        <li> <a href="../reviews.php">Reviews</a> </li>
                        <li> <a href="#">Login</a> </li>
                        <li> <a href="../reg">Registration</a> </li>
                    </ul>
            </div>
            <div class="coverr">
            <h1>Login</h1>
    <form action="index.php" method="POST">
    <input type="text" value="<?php if(isset($_POST["userid"])) echo $_POST["userid"] ?>" name="userid" placeholder="UserID" required>
    <input type="password"  name="password" placeholder="Password" required>
    <input type="submit" value="Login">
    </form>
    <div class="warning">          
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require("login.php");
            }
        
        ?>
    </div>
    <div class="login">
            <span>Don't have an account? <a href="/reg">Register here</a> </span>
    </div>

            </div>
    
<footer></footer>

</body>
</html>