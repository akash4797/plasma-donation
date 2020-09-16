<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   
    <link href="css/style.css?<?=filemtime("css/style.css")?>" rel="stylesheet" type="text/css" />  
    <style>
        .allcomments{
            margin-top: 30px;
        }
    </style>
    <title>PlasmaDo</title>
</head>
<body>
    <nav>

    </nav>
    <div class="navu">
    <div href="#" class="logo">
            <img src="assets/blood.svg?<?=filemtime("assets/blood.svg")?>" alt="">
            <h5><b>PlasmaDo</b></h5>
        </div>
        <ul>
            <li> <a href="../index.php">Home</a> </li>
            <li> <a href="#">About</a> </li>
            <li> <a href="#">Reviews</a> </li>
            <li> <a href="./login">Login</a> </li>
            <li> <a href="./reg">Registration</a> </li>
        </ul>
    </div>
    <section class="container allcomments">
        <div class="center-text">
            <h1 style="text-align: center;">Our Reviews</h1>
            <table class="table table-bordered">
                <th>UserID</th>
                <th>Comment</th>
                <th>Stars</th>

                <tbody>
                <?php
                            require("connectiondb.php");
                            $sql = "SELECT * FROM feedback";
                            $result = mysqli_query($con,$sql);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr> <td>" . $row['userID'] . " </td>";
                                  echo "<td>". $row['comment'] ."</td>";
                                  echo "<td>";
                                  for ($i=0; $i < $row['starcount'] ; $i++) { 
                                    echo "<img  width='40px' src='./assets/star.svg'>";
                                  }
                                  echo "</td>";                                  
                                  echo "</tr>";
                                }
                              }                      
                              
                        ?>
                </tbody>
            </table>
        </div>
    </section>
    <footer>
       
    </footer>
</body>
</html>