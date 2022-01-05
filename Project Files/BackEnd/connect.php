<?php

    $db = mysqli_connect("localhost", "root", "", "cse311.4 group 3 project");
    
    if(!$db)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>