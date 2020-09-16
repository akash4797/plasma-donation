<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Registration | PlasmaDo</title>
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

        .asdfasdf{
            background-color: white;
            -webkit-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            -moz-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            padding: 1rem;
            margin-bottom: 100px;
            margin-top: 100px;
        }

    </style>    
</head>
<body>
    <nav>

        </nav>
        <div class="navu">
        <div href="#" class="logo">
                <img src="../assets/blood.svg?<?=filemtime("../assets/blood.svg")?>" alt="">
                <h5>PlasmaDo</h5>
            </div>
            <ul>
                <li> <a href="../index.php">Home</a> </li>
                <li> <a href="#">About</a> </li>
                <li> <a href="#">Contact</a> </li>
                <li> <a href="../login">Login</a> </li>
                <li> <a href="#">Registration</a> </li>
            </ul>
        </div>
    
    <div class="container asdfasdf">
    <h1>Registration</h1>
        <form class="form" action="index.php" method="POST">
            <input type="text" value="<?php if(isset($_POST["fullname"])) echo $_POST["fullname"] ?>" name="fullname" placeholder="Full Name" required>           
            <input type="text" value="<?php if(isset($_POST["userid"])) echo $_POST["userid"] ?>" name="userid" placeholder="UserID" required>
            <label for="bloodgrp">Blood Group</label>
            <select value="<?php if(isset($_POST["bloodgrp"])) echo $_POST["bloodgrp"] ?>" name="bloodgrp" id="bloodgrp" required>
                <option value="A+ve">A+ve</option>
                <option value="B+ve">B+ve</option>
                <option value="AB+ve">AB+ve</option>
                <option value="A-ve">A-ve</option>
                <option value="B-ve">B-ve</option>
                <option value="AB-ve">AB-ve</option>
                <option value="O+ve">O+ve</option>
                <option value="O-ve">O-ve</option>
            </select>
            <label for="gender">Gender</label>
            <select value="<?php if(isset($_POST["gender"])) echo $_POST["gender"] ?>" name="gender" id="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <input type="number" max="30" min="18" value="<?php if(isset($_POST["age"])) echo $_POST["age"] ?>" name="age" placeholder="AGE" required>
            <input type="tel" value="<?php if(isset($_POST["phone"])) echo $_POST["phone"] ?>" name="phone" placeholder="Phone" required>
            <label for="address">Address</label>
            <select value="<?php if(isset($_POST["address"])) echo $_POST["address"] ?>" name="address" id="address" required>
                <option value="Adabor">Adabor</option>
                <option value="Uttar Khan">Uttar Khan</option>
                <option value="Uttara">Uttara</option>
                <option value="Kadamtali">Kadamtali</option>
                <option value="Kalabagan">Kalabagan</option>
                <option value="Kafrul">Kafrul</option>
                <option value="Kamrangirchar">Kamrangirchar</option>
                <option value="Cantonment">Cantonment</option>
                <option value="Kotwali">Kotwali</option>
                <option value="Khilkhet">Khilkhet</option>
                <option value="Khilgaon">Khilgaon</option>
                <option value="Gulshan">Gulshan</option>
                <option value="Gendaria">Gendaria</option>
                <option value="Chawkbazar Mode">Chawkbazar Mode</option>
                <option value="Demra">Demra</option>
                <option value="Turag">Turag</option>
                <option value="Tejgaon">Tejgaon</option>
                <option value="Tejgaon I/A">Tejgaon I/A</option>
                <option value="Dakshinkhan">Dakshinkhan</option>
                <option value="Darus Salam">Darus Salam</option>
                <option value="Dhanmondi">Dhanmondi</option>
                <option value="New Market">New Market</option>
                <option value="Paltan">Paltan</option>
                <option value="Pallabi">Pallabi</option>
                <option value="Bangshal">Bangshal</option>
                <option value="Badda">Badda</option>
                <option value="Bimanbandar">Bimanbandar</option>
                <option value="Motijheel">Motijheel</option>
                <option value="Mirpur Model">Mirpur Model</option>
                <option value="Mohammadpur">Mohammadpur</option>
                <option value="Jatrabari">Jatrabari</option>
                <option value="Ramna">Ramna</option>
                <option value="Rampura">Rampura</option>
                <option value="Lalbagh">Lalbagh</option>
                <option value="Shah Ali">Shah Ali</option>
                <option value="Shahbagh">Shahbagh</option>
                <option value="Sher-e-Bangla Nagar">Sher-e-Bangla Nagar</option>
                <option value="Shyampur">Shyampur</option>
                <option value="Sabujbagh">Sabujbagh</option>
                <option value="Sutrapur">Sutrapur</option>
                <option value="Hazaribagh">Hazaribagh</option>
            </select>                       
            <input type="password"  name="password" placeholder="Password" required>
            <input type="password" name="confirmpass" placeholder="Confirm Password" required>
            <input type="submit" value="Submit">
        </form>
        <div class="warning">          
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require("registration.php");
            }
        
        ?>
        </div>
        <div class="login">
            <span>Already have an account? <a href="/login">Login here</a> </span>
        </div>

    </div>
    

</body>
</html>