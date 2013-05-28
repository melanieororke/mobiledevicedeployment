<?php
$host = 'localhost';
$user = 'abandond_easykee';
$pass = 'easyKeepr./2013';

$sqlconnect = mysql_connect($host, $user, $pass) or die('Error connecting to mysql');
mysql_select_db("abandond_easykeepr") or die("Unable to select database");
?>