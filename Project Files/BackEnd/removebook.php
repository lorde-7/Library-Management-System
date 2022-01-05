
<?php
include('connect.php');  
$bookid = $_POST['Book_Id'];



$sql = " DELETE FROM books
WHERE Book_ID = '$bookid'";


if(mysqli_query($db, $sql))
{
    
    ?>
     
    <div id="parent">
    <a href="../FrontEnd/HTML_Files/RemoveBook.html" > <?php echo "Back to the previous page" ?></a>
         <!--form content here-->
        
    </div>
    
    
    
    
    <?php echo "<script>alert('Book Removed')</script>";

      
}
else
{
    
     
    ?>
     
    <div id="parent">
    <a href="../FrontEnd/HTML_Files/RemoveBook.html" > <?php echo "Back to the previous page" ?></a>
         <!--form content here-->
        
    </div>
    
    
    
    
    <?php echo "<script>alert('This id doesnt exist')</script>";
  

   
}

?>