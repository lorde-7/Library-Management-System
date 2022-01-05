<?php
include('connect.php');  
$bookid = $_POST['Book_Id'];
$title = $_POST['Title'];
$author = $_POST['Author'];
$edition = $_POST['Edition'];
$publisher = $_POST['Publisher'];

$email;

    $myFile = fopen("../Resources/Text_Files/adminPage.txt", "r") or 
    die("Unable to open file!");

    $email = fgets($myFile);
    fclose($myFile);

$sql = "INSERT INTO books ( Book_Id, Title,	Author,	Edition , Publisher, A_Email, Available	) VALUES ('$bookid', '$title', '$author', '$edition', '$publisher', '$email', 'Yes')";


if(mysqli_query($db, $sql))
{
    
    ?>
     
    <div id="parent">
    <a href="../FrontEnd/HTML_Files/AddBook.html" > <?php echo "Back to the previous page" ?></a>
         <!--form content here-->
        
    </div>
    
    
    
    
    <?php echo "<script>alert('Book Added')</script>";

      
}
else
{
    
     
    ?>
     
    <div id="parent">
    <a href="../FrontEnd/HTML_Files/AddBook.html" > <?php echo "Back to the previous page" ?></a>
         <!--form content here-->
        
    </div>
    
    
    
    
    <?php echo "<script>alert('This id already exists')</script>";
  

   
}

?>