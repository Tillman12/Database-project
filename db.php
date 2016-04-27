<?php
$HOST = 'stardock.cs.virginia.edu';

$USERNAME = 'cs4750mst2jdc';
$PASSWORD = 'spring2016';

if (isset($_SESSION['type']) && $_SESSION['type']=='superuser'){
$USERNAME = 'cs4750mst2jd';
$PASSWORD = 'password';}
else if (isset($_SESSION['type']) &&$_SESSION['type']=='ad'){
$USERNAME = 'cs4750mst2jda';
$PASSWORD = 'spring2016';}
else if (isset($_SESSION['type']) &&$_SESSION['type']=='fan'){
$USERNAME = 'cs4750mst2jdb';
$PASSWORD = 'spring2016';}


$connection = mysql_connect($HOST, $USERNAME, $PASSWORD);
if (!$connection){
 die("Database Connection Failed" . mysql_error());
}
$select_db = mysql_select_db('cs4750mst2jd');
if (!$select_db){
 die("Database Selection Failed" . mysql_error());
}
?>
