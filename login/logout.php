<?php
session_start();//Start session
//Check if user id session exists
if(session_is_registered('id')){
session_destroy();//Destroy session
header('Location: index.php');//Redirect to home page
}else{
header('Location: index.php');//Redirect to home page
}
?>