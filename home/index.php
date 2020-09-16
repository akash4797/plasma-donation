<?php
    session_start();
    $hisAddress = $_SESSION['address'];
    if(!isset($_SESSION['userid'])){
        header("Location:../login");
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

        table th,table td{
            text-align: center;
        }
        .become-a-donor,.my-info-div,.change-password-div,.review-div{
            position: fixed;
            width: 300px;
            height: 300px;
            top: 50%;
            left: 50%;
            margin-top: -150px;
            margin-left: -150px;
            border: 1px solid black;            
            flex-direction: column;
            justify-content: center;
            align-items: center;
            display: none;
            background-color: #f2f2f2;
            border-radius: 10px;
            -webkit-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            -moz-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
            overflow: auto;
        }

        .review-div textarea{
            padding: 1rem;
            margin-bottom: 10px;
        }

        .become-a-donor span{
            text-align: center;
            padding: 1.5rem;
        }
        .become-a-donor form , .change-password-div form, .review-div form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .become-a-donor form input , .change-password-div form input{
            margin-bottom: 5px;
        }
        .closing-button{
            background-color: transparent;
            position: absolute;
            top: 0;
            right: 0;
            color: red;
        }
        .closing-button:focus{
            outline: none;
        }
        .logout{
            text-decoration: none;
            padding: 1rem;
            background-color: purple;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .logout:hover{
            text-decoration: none;
            color: white;   
        }
        button{
        padding: 1rem;
        background-color: purple;
        color: white;
        border: none;
        border-radius: 5px;
        -webkit-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
        -moz-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
        box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
        }
        .donor-span{            
            color: purple;
            padding: 1rem;
            border-radius: 5px;
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
            align-items: center;
            padding: 2rem;
            color: purple;
        }
        .search-user-id{
            margin-bottom: 10px;
        }
        .search-user-id input{
            padding: 10px;
            width: 100%;
        }
        
        .ohstars{
            margin-bottom: 10px;
        }

    </style>
    <title> <?php echo $_SESSION['userid']; ?> | Home </title>
</head>
<body>
    <nav>

    </nav>
    <div class="navu">
        <h3 >Welcome, <?php echo $_SESSION['userid']; ?> </h3>
         <div class="allbuttons">
         <button onclick="myinfo();">My Info</button>
         <button onclick="changepass();">Change Password</button>
         <button onclick="addReview();">Rate this app</button>
        <?php
            $userid = $_SESSION['userid'];
            $reallydonor = "SELECT isdonor FROM user WHERE userid='$userid'";
            $check1 = mysqli_query($con,$reallydonor);
            $theArray = mysqli_fetch_array($check1);
            if($theArray[0] == 1){
                echo "<span class='donor-span'>You are donor!</span>";
            }else{
                echo "<button onclick='becomeADonor();'>Become a donor</button>";
            }
        ?>         
         <a class="logout" href="logout.php">Logout</a>
         </div>
         
    </div>

   
    <div class="search-box">
        <div class="container">
                <h3 style="text-align: center;">Donar List inside your location</h3>
                <div class="search-user-id">
                    <input id="search-id-input" onkeyup="searchname()" type="text" placeholder="Search for name..">
                </div>
                <table id="myTable" class="table table-bordered">
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Contact</th>

                    
                    <tbody>
                    <?php                        
                            $finddonor = "SELECT * FROM user WHERE isdonor=1 AND Address='$hisAddress'";
                            $ooresult = mysqli_query($con,$finddonor);
                            if (mysqli_num_rows($ooresult) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($ooresult)) {
                                  echo "<tr> <td>" . $row['Full Name'] . " </td>";
                                  echo "<td>". $row['Age'] ."</td>";
                                  echo "<td>". $row['Gender'] ."</td>";
                                  echo "<td>". $row['Blood Group'] ."</td>";
                                  echo "<td>". $row['contact'] ."</td>";
                                  echo "</tr>";
                                  
                                }
                              }                      
                              
                        ?>
                    </tbody>
                </table>
        </div>

    </div>

    <div class="become-a-donor">
        <button class="closing-button" onclick="closeDiv(this);">X</button>
        <?php            
            
            $sql1 = "SELECT * FROM donorreq WHERE userid='$userid'";
            $result1 = mysqli_query($con,$sql1);

            $rows1 = mysqli_num_rows($result1);  

            if($rows1 == 1){
                echo "<span>You have Already requested to become a donor. Please wait for an approval</span>";
            }else{
                echo  "<h3>Become a Donor!</h3>";
                echo "<form action='donorrequest.php' method='POST'>";
                echo "<input type='text' name='hos' placeholder='Hospital Name' required>";
                echo  "<input type='number' min='14'  name='rtime' placeholder='Recovery Time' required>";
                echo   "<input type='submit'>";
                echo "</form>";
            }
        ?>

    </div>    

    <div class="my-info-div">
        <button class="closing-button" onclick="closeDiv(this);">X</button>
        <h2>Info</h2>
        <?php                        
            $sql2 = "SELECT * FROM user WHERE userid='$userid'";
            $result2 = mysqli_query($con,$sql2);

            $array = mysqli_fetch_array($result2);
      
                echo  "<span> Full Name: ". $array[0] ."</span>";
                echo "<span> UserID:". $array[1] . "</span>";
                echo "<span> Blood Group: " . $array[3] . " </span>";
                echo  "<span> Age: " . $array[4] . " </span>";
                echo   "<span> Gender: " . $array[5] . " </span>";
                echo "<span> Contact: " . $array[6] . " </span>";
                echo "<span> Address: " . $array[7] . " </span>";
                echo "<span> Donor: " . ($array[8] == 1? "Yes" : "No") . " </span>";

 
        ?>

    </div>

    <div class="change-password-div">
        <button class="closing-button" onclick="closeDiv(this);">X</button>
        <h2>Change Password</h2>
        <?php                       
            echo "<form action='changepass.php' method='POST'>";
            echo "<input name='oldpassword' type='password' placeholder='Old Password'>";
            echo "<input name='newpassword' type='password' placeholder='New Password'>";
            echo "<input type='submit' value='Change'>";
            echo "</form>";                                             
 
        ?>

    </div>

    <div class="review-div">
        <button class="closing-button" onclick="closeDiv(this);">X</button>
        <h2>Lets Review US</h2>
        <?php                       
            echo "<form action='review.php' method='POST'>";
            echo "<textarea name='comment' id='' cols='30' rows='4' required></textarea>";
            echo "<input id='starcount' name='starcount' type='number' style='display:none;' name='star' value='3' readable>";
            echo "<div class='ohstars'>";
            echo "<img class='thestar'  width='40px' src='../assets/favourite.svg'  data-alt='none-stared' onmouseover='hover(this);' onmouseout='unhover(this);' onclick='makestar(0);'>";          
            echo "<img class='thestar'  width='40px' src='../assets/favourite.svg'  data-alt='none-stared' onmouseover='hover(this);' onmouseout='unhover(this);' onclick='makestar(1);'>";            
            echo "<img class='thestar'  width='40px' src='../assets/favourite.svg'  data-alt='none-stared' onmouseover='hover(this);' onmouseout='unhover(this);' onclick='makestar(2);'>";            
            echo "<img class='thestar'  width='40px' src='../assets/favourite.svg'  data-alt='none-stared' onmouseover='hover(this);' onmouseout='unhover(this);' onclick='makestar(3);'>";            
            echo "<img class='thestar'  width='40px' src='../assets/favourite.svg'  data-alt='none-stared' onmouseover='hover(this);' onmouseout='unhover(this);' onclick='makestar(4);'>";              
            echo "</div>";
            echo "<input type='submit' value='Submit'>";
            echo "</form>";                                             
 
        ?>



    </div>


    <script>
        function becomeADonor(){
            document.querySelector(".become-a-donor").style.display = "flex";
        }
        function closeDiv(elem){
            elem.parentNode.style.display = "none";
        }
        function myinfo(){
            document.querySelector(".my-info-div").style.display = "flex";
        }
        function changepass(){
            document.querySelector(".change-password-div").style.display = "flex";
        }

        function addReview(){
            document.querySelector(".review-div").style.display = "flex";            
            makestar((document.getElementById("starcount").value)-1);

        }
        function hover(elem){
              elem.src = "../assets/star.svg";  
        }
        function unhover(elem){
            if(elem.dataset.alt == "none-stared"){
                elem.src = "../assets/favourite.svg"; 
            }             
        }
        function makestar(input){                   
            var thestar = document.querySelectorAll(".thestar");
            document.getElementById("starcount").value = input + 1;            
            for (let i = 0; i < thestar.length; i++) {
                if(input >= i){
                    thestar[i].dataset.alt = "stared";                     
                    thestar[i].src = "../assets/star.svg"; 
                }else{
                    thestar[i].dataset.alt = "none-stared";                     
                    thestar[i].src = "../assets/favourite.svg"; 
                }
              
            }

        }



        function searchname(){
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("search-id-input");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    }       
                }
                }
    </script>

</body>
</html>