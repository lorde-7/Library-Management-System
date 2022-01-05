<?php

        include 'connect.php';
        
        if(isset($_POST['submit'])){
            $email = $_POST['search'];

            $myFile = fopen("../Resources/Text_Files/reviewUser.txt", "w") or 
            die("Unable to open file!");

            fwrite($myFile, $email);
            fclose($myFile);
        }
        else{
            die("Unable to recieve form submissions");
        }

        $sql = "SELECT Name, DOB, Phone_no FROM user 
                WHERE Email = '$email'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
        }
        else{
            die("No such user found");
        }

        //header("Location: ../FrontEnd/HTML_Files/UserPage.html");

?>
<!DOCTYPE html>
<html>
    <title>Review User</title>
    <head>
        <link rel="stylesheet" type="text/css" href="../FrontEnd/CSS_Files/review_user.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .userImg{
                width: 250px;  
                height: 250px;
                position: Relative;
                border-radius: 50px;
                left: -20px;
            }
            .center{
                padding-right: 50px;
                padding-top: 85px;
                left: 55%;
                top: 55%;
            }
            .infoDiv{
                display: inline;
                position: relative;
                left: 30px;
                top: 15px;
            }
            .button0{
                display: block;
                justify-content: space-evenly;
                align-items: center;
            }
            .button1{
                border-radius: 30px;
                border: none;
                position: relative;
                left: 40px;
                height: 100px;
                width: 160px;
            }
            .button2{
                border-radius: 30px;
                border: none;
                position: relative;
                left: 18vw;
                height: 100px;
                width: 160px;
            }
        </style>
    </head>
    <body>

        <div class="header">

            <div class="left-sidebar"></div>

            <span>
                <a href="" class="logo">Review User</a>
            </span>

            <nav>
                <div class="nav-links">
                    <ul>
                        <li><a href="../FrontEnd/HTML_Files/ReviewUser.html" ><u>Review Another User</u></a></li>
                        <li><a href="../FrontEnd/HTML_Files/AdminPage.html" ><u>Return to Dashboard</u></a></li>
                        <li><a href="../FrontEnd/HTML_Files/LOGIN.html"><u>Logout</u></a></li>
                    </ul>
                </div>
            </nav>

            <span class="left-col">
                <img src="../Resources/Images/logo.png">
            </span>

            <div class="row">
                <div class="center" style="height: 45vh; width: 45vw;">
                    <div style="display: flex"> 
                        <span>
                            <img src="../Resources/Images/User.jpg" alternate="User.png" class="userImg">
                        </span>

                        <span class="infoDiv">
                            <h2 style="font-size: 50px"><?php echo $row["Name"] ?></h2>
                            <br><br>
                            <h2 style="font-size: 20px">Email: <?php echo $email ?></h2>
                            <br>
                            <h2 style="font-size: 20px">Date of Birth: <?php echo $row["DOB"] ?> (YYYY-MM-DD)</h2>
                            <br>
                            <h2 style="font-size: 20px">Phone No.: <?php echo $row["Phone_no"] ?></h2>
                        </span>
                    </div>
                    <br>
                    <div class="button0">
                        <div>
                            <button class="button1">
                                <?php 
                                    $myFile = fopen("../Resources/Text_Files/history.txt", "w") or 
                                    die("Unable to open file!");
                        
                                    fwrite($myFile, $email);
                                    fclose($myFile);
                                ?><a href="history.php" target="_blank" style="text-decoration: none;">View User's History</button>
                        </div>
                        <div>
                            <button class="button2">
                            <?php 
                                    $myFile = fopen("../Resources/Text_Files/issuedBooks.txt", "w") or 
                                    die("Unable to open file!");
                        
                                    fwrite($myFile, $email);
                                    fclose($myFile);
                                ?><a href="issued_books.php" target="_blank" style="text-decoration: none;">View User's Issued Books</button>
                        </div>
                    </div>

                </div>  
            </div>
        </div>

    </body>
</html>