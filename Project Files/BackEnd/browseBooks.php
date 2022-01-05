<?php

    include 'connect.php';

    $email;

    $myFile = fopen("../Resources/Text_Files/userPage.txt", "r") or 
    die("Unable to open file!");

    $email = fgets($myFile);
    fclose($myFile);

    if(isset($_POST['submit_BB'])) 
    { 
        $bookID1 = $_POST['BB-Field'];
        $bbdate = $_POST['date-Field'];
        $issuedate = date('Y-m-d');
        $bbsql = "INSERT INTO issued_books (Book_Id, Email, Issue_Date,
        Est_Return_Date) VALUES ('$bookID1', '$email', '$issuedate', '$bbdate')";

        $issQuery = mysqli_query($db, $bbsql);
        
        if (!$issQuery) {
            echo "<script>alert('Error')</script>";
        }

        $hissql = "INSERT INTO history (Book_Id, Email, Issue_Date) 
        VALUES ('$bookID1', '$email', '$issuedate')";

        $hisQuery = mysqli_query($db, $hissql);

        $finhsql = "INSERT INTO fine_history (Book_Id, Email) 
        VALUES ('$bookID1', '$email')";

        $finhQuery = mysqli_query($db, $finhsql);

        $upsql = "UPDATE books 
        SET Available = 'No'
        WHERE Book_Id = '$bookID1'";

        $upQuery = mysqli_query($db, $upsql);

        echo "<script>alert('Book Borrowed')</script>";
    }

    if(isset($_POST['submit_RL'])) 
    { 
        $bookID2 = $_POST['RL-Field'];

        $rlsql = "INSERT INTO wishlist (Book_Id, U_Email) VALUES ('$bookID2', '$email')";

        $rlQuery = mysqli_query($db, $rlsql);

        echo "<script>alert('Added to Reading List')</script>";
    }

    $sql = "SELECT Book_Id, Title, Author, 
            Edition, Publisher, Available FROM books";
    $result = mysqli_query($db, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>
    <link rel="stylesheet" type="text/css" href="../FrontEnd/CSS_Files/browse_books.css">
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
            height: 30vh;
            overflow-y: auto;
        }
        th{
            
            background-color: solid #4e49af;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }
        td {
            background-color: #6660e2;
        }
        button{
            background-color: #6660e2;
            border: 3px solid #4e49af;
        }
        button:active{
            background-color: #4f4aa5;
        }
        
    </style>
</head>
<body style="background-color: #a8a4fa;">

    <div class="header">

        <div class="left-sidebar"></div>

        <span>
            <a href="" class="logo">Browse Books</a>
        </span>

        <nav>
            <div class="nav-links">
                <ul>
                    <li><a href="../FrontEnd/HTML_Files/UserPage.html"><u>Return to Dashboard</u></a></li>
                    <li><a href="../FrontEnd/HTML_Files/ReturnBook.html"><u>Return a book</u></a></li>
                    <li><a href="../FrontEnd/HTML_Files/LOGIN.html"><u>Logout</u></a></li>
                </ul>
            </div>
        </nav>

        <span class="left-col">
            <img src="../Resources/Images/logo.png">
        </span>

        <div id="book_history" class="center">
            <div style="position: relative; top: -10px">
                <h3>Browse Books:</h3><br>
            </div>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Book Titles..">
            <div style="overflow-y: auto; height: 30vh;">
                <table>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Edition</th>
                        <th>Publisher</th>
                        <th>Available</th>
                    </tr>
                    <?php 
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>" . $row['Book_Id'] ."</td>";
                            echo "<td>" . $row['Title'] ."</td>";
                            echo "<td>" . $row['Author'] ."</td>";
                            echo "<td>" . $row['Edition'] ."</td>";
                            echo "<td>" . $row['Publisher'] ."</td>";
                            echo "<td>" . $row['Available'] ."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="borrow_read">
            <div style="padding-left: 40px; padding-top: 30px;">
                <h4 style="font-size: 30px;">For Borrowing A Book:</h4> <br>

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="number" name="BB-Field" style="width: 33%;" placeholder="Enter the Book ID..." required>
                    <input type="date" name="date-Field" style="width: 32%;" placeholder="Pick the Return Date..." required>
                    <button type="submit" name="submit_BB">Borrow</button>
                </form>

            </div>
            <div style="padding-left: 55px; padding-top: 30px; border-left: 5px solid #4e49af;">
                <h4 style="font-size: 30px;">For Adding to Reading list:</h4> <br>
                
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="number" name="RL-Field" style="width:85%;" placeholder="Enter the Book ID..." required>
                    <button type="submit" name="submit_RL">Add</button>
                </form>

            </div>
        </div>
    </div>
    <script src="../FrontEnd/JS_Files/browse_books.js"></script>
</body>
</html>