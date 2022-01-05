<?php
  include 'connect.php';
$username = $_POST['username'];
$password = $_POST['pass'];

/*if($username != "saad.alvee@gmail.com" || "sanjana.rahman@gmail.com" || "masud.hassan@gmail.com")*/
$sql= "SELECT Email FROM user WHERE Email = '$username'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0)
{
  $username = stripcslashes($username);
  $password = stripcslashes($password);
  $username = mysqli_real_escape_string($db, $username);
  $password = mysqli_real_escape_string($db, $password);

  $sql = "select *from authenticator where Email = '$username' and Password = '$password'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);

  $myFile = fopen("../Resources/Text_Files/userPage.txt", "w") or 
            die("Unable to open file!");

            fwrite($myFile, $username);
            fclose($myFile);

  if($count == 1){


    {header("Location: ../FrontEnd/HTML_Files/UserPage.html");
      exit();
  }

  }
  else{
      echo "<h1> Login failed. Invalid username or password.</h1>";
      {header("Location: ../FrontEnd/HTML_Files/LOGIN.html");
        exit();}
  }

}


else{
//to prevent from mysqli injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($db, $username);
$password = mysqli_real_escape_string($db, $password);

$sql = "select *from authenticator where Email = '$username' and Password = '$password'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
$myFile = fopen("../Resources/Text_Files/adminPage.txt", "w") or
          die("Unable to open file!");

          fwrite($myFile, $username);
          fclose($myFile);


if($count == 1){



  {header("Location: ../FrontEnd/HTML_Files/AdminPage.html");
    exit();
}

}
else{
    echo "<h1> Login failed. Invalid username or password.</h1>";
}

}
?>
