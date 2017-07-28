<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
$username=$_SESSION['session_username'];
$full_date = mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
$query=mysql_query("UPDATE usertbl SET last_logout=\"$full_date\" WHERE username='".$username."'");
unset($_SESSION['session_username']);
session_destroy();
header("Location: ".$_SERVER['HTTP_REFERER']);
?>