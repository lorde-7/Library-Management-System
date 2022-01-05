<?php

    include 'connect.php';

    $email;

    $myFile = fopen("../Resources/Text_Files/history.txt", "r") or 
    die("Unable to open file!");

    $email = fgets($myFile);
    fclose($myFile);

    $sql = "SELECT Book_Id, Title, Author, Publisher FROM books
            WHERE Book_Id = (SELECT Book_Id FROM wishlist WHERE
            wishlist.U_Email = '$email')";
    $result = mysqli_query($db, $sql);

    $asql = "SELECT Name FROM user WHERE Email = '$email'";
    $result2 = mysqli_query($db, $asql);
    $cell = mysqli_fetch_assoc($result2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reading-List</title>
    <link rel="stylesheet" type="text/css" href="../FrontEnd/CSS_Files/history.css">
    <style>
        .thetable{
            border: 3px solid #4e49b8;
            background-color: #4e49af;
            height: 45vh;
            overflow-y: auto;
            overflow-x: hidden;
        }
        table{
            width: 59vw;
        }
        td{
            padding: 5px 10px;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body style="background-color: #a8a4fa;">

    <div class="header">

        <div class="left-sidebar"></div>

        <span>
            <a href="" class="logo">Reading <br> List</a>
        </span>

        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="../FrontEnd/HTML_Files/UserPage.html"><u>Return to Dashboard</u></a></li>
                    <li><a href="../FrontEnd/HTML_Files/LOGIN.html"><u>Logout</u></a></li>
                </ul>
            </div>
        </nav>

        <span class="left-col">
            <img src="../Resources/Images/logo.png">
        </span>

        <div class="center">
            <div style="position: relative; top: -10px">
                <h3>Reading List:</h3> <br>
            </div>
            
            <div class="thetable">
                <table>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                    </tr>
                    <?php 
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>" . $row['Book_Id'] ."</td>";
                            echo "<td>" . $row['Title'] ."</td>";
                            echo "<td>" . $row['Author'] ."</td>";
                            echo "<td>" . $row['Publisher'] ."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>