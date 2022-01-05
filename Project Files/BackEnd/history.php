<?php

    include 'connect.php';

    $email;

    $myFile = fopen("../Resources/Text_Files/history.txt", "r") or 
    die("Unable to open file!");

    $email = fgets($myFile);
    fclose($myFile);

    $sql = "SELECT H.Book_Id, Title, Author, Publisher, Issue_Date, 
            H.Email, Return_Date, Fine
            FROM books AS B JOIN history AS H ON H.Book_Id = B.Book_Id
            JOIN fine_history AS F ON F.Book_Id = H.Book_Id 
            AND F.Email = H.Email
            WHERE H.Email = '$email'";
    $result = mysqli_query($db, $sql);

    $asql = "SELECT Name FROM user WHERE Email = '$email'";
    $result2 = mysqli_query($db, $asql);
    $cell = mysqli_fetch_assoc($result2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
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
            <a href="" class="logo">History</a>
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
                <h3>History:</h3> <br>
            </div>
            
            <div class="thetable">
                <table>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Fine</th>
                    </tr>
                    <?php 
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>" . $row['Book_Id'] ."</td>";
                            echo "<td>" . $row['Title'] ."</td>";
                            echo "<td>" . $row['Author'] ."</td>";
                            echo "<td>" . $row['Publisher'] ."</td>";
                            echo "<td>" . $row['Issue_Date'] ."</td>";
                            echo "<td>" . $row['Return_Date'] ."</td>";
                            echo "<td>" . $row['Fine'] ."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>