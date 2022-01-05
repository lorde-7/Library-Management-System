<?php
include('connect.php');  
$p_name = $_POST['fname'];
$p_phone = $_POST['phone'];
$p_email = $_POST['email'];
$p_pass = $_POST['pass'];
$p_dob = $_POST['DOB'];

$sql = "INSERT INTO user ( Email, Name, DOB, Phone_no) VALUES ('$p_email', '$p_name', $p_dob, '$p_phone')";
$asql = "INSERT INTO authenticator ( Email, Password ) VALUES ('$p_email', '$p_pass')";

if(mysqli_query($db, $sql) && mysqli_query($db, $asql))
{
    {header("Location: ../FrontEnd/HTML_Files/LOGIN.html");
        exit();
    }
      
}
else
{
    ?>
     
    <div id="parent">
    <a href="http://localhost/CSE311.4_Group_3_Project/FrontEnd/HTML_Files/LOGIN.html" > <?php echo "Back to the signup page" ?></a>
         <!--form content here-->
        
    </div>
    
    
    
    
    <?php echo "<script>alert('This email already exists')</script>";

   
}

?>