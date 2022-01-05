<?php 

$base = 'http://'.$_SERVER['HTTP_HOST'].'/CSE311.4_Group_3_Project';

$landing_page = '/FrontEnd/HTML_Files/LOGIN.html';

header('Location: '.$base. $landing_page);
