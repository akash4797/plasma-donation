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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        button{
        padding: 1.5rem;
        background-color: purple;
        color: white;
        border: none;
        border-radius: 10px;
        -webkit-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
        -moz-box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
        box-shadow: -5px 10px 47px -15px rgba(0,0,0,0.75);
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
        .search-user-id{
            margin-bottom: 10px;
        }
        .search-user-id input{
            padding: 10px;
            width: 100%;
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
         <div class="buttons">
         <button onclick="goBack();">Back</button>        
         <a class="logout" href="logout.php">Logout</a>
         </div>
    </div>
   
        <section class="allusers">
            <div class="container">
            <div class="search-user-id">
                <input id="search-id-input" onkeyup="searchname()" type="text" placeholder="Search for userid..">
            </div>
                <table id="myTable" class="table table-bordered">
                    <th>UserID</th>
                    <th>Status</th>
                    <th>Request Time</th>
                    <th>Hospital Name</th>
                    <th>Recovery Time</th>
                    <th>Action</th>
                    <th>Action</th>

                    <tbody>
                        <?php
                            require("../connectiondb.php");
                            $sql = "SELECT * FROM donorreq";
                            $result = mysqli_query($con,$sql);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                  echo "<form action='approvereq.php' method='POST'>"; 
                                  echo "<input  style='display:none;' type='text' name='thisuserid' value='".$row['userid']."' readonly>"; 
                                  echo "<input  style='display:none;' type='text' name='thishosname' value='".$row['Hospital']."' readonly>"; 
                                  echo "<input  style='display:none;' type='text' name='thisrecover' value='".$row['recoveryTime']."' readonly>"; 
                                  echo "<tr> <td>" . $row['userid'] . " </td>";
                                  echo "<td>". $row['status'] ."</td>";
                                  echo "<td>". $row['request time'] ."</td>";
                                  echo "<td>". $row['Hospital'] ."</td>";
                                  echo "<td>". $row['recoveryTime'] ."</td>";
                                  echo "<td> <input name='approve' type='submit' value='Approve'></td>";
                                  echo "<td> <input name='approve' type='submit' value='Reject'> </td>";
                                  echo "</tr>";
                                  echo "</form>";
                                }
                              }                      
                              
                        ?>
                    </tbody>
                </table>
            </div>            
        </section>


        <script>
            function goBack(){
                window.history.back();
            }
            function approveDon(elem){


            }
            function rejectDon(elem){
                console.log(elem);
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