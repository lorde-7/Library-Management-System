<?php
include 'connect.php'; 

$bookid = $_POST['Book_Id'];



$upsql = "UPDATE books 
        SET Available = 'Yes'
        WHERE Book_Id = '$bookid'";

$upQuery = mysqli_query($db, $upsql);

$date = date("Y-m-d");


$email;

    $myFile = fopen("../Resources/Text_Files/userPage.txt", "r") or 
    die("Unable to open file!");

    $email = fgets($myFile);
    fclose($myFile);

    
    $days = mysqli_query($db, "SELECT DATEDIFF('$date', Est_Return_Date) AS DateDiff FROM issued_books AS ib WHERE ib.Book_Id = $bookid AND ib.Email = '$email'");
    $row = mysqli_fetch_assoc($days);
    $row['DateDiff']."<br>";
    $fine = 20 * $row['DateDiff'];
    
    $retsql = " DELETE FROM issued_books
        WHERE Book_ID = '$bookid' AND Email = '$email'";
    $ret_book = mysqli_query($db, $retsql); 
    
    $datesql = " UPDATE fine_history 
SET 
    Return_Date = '$date'
WHERE
    Book_Id = '$bookid' AND Email = '$email'";
  
    
    $asql = "UPDATE books SET Return_Date = '$date', Book_Id = '$bookid', 
    Email = '$email',	Fine = '$fine') WHERE Book_Id = $bookid";

    
    // else{
    //     $asql = "INSERT INTO fine_history ( Return_Date, Book_Id,	Email ,	Fine) 
    //     VALUES ('$date', '$bookid', '$email', 0)";
    // }

if(mysqli_query($db, $sql))
{
    
    ?>
     
    <div id="parent">
    <a href="../FrontEnd/HTML_Files/ReturnBook.html"> <?php echo "Back to the previous page" ?></a>
         <!--form content here-->
        
    </div> 
    
    
    
    
    <?php echo "<script>alert('Book Returned')</script>";
    echo "<br>" . "$email";

      
}
else
{
    
     
    ?>
     
    <div id="parent">
    <a href="../FrontEnd/HTML_Files/ReturnBook.html" > <?php echo "Back to the previous page" ?></a>
         <!--form content here-->
        
    </div>
    
    
    
    
    <?php echo "<script>alert('This book is not borrowed yet')</script>";
  

   
}

?>