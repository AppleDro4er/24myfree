<?php
require($_SERVER['DOCUMENT_ROOT']."/include/constants.php");
$con = mysql_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
mysql_select_db(DB_NAME) or die("Cannot select DB");
mysql_set_charset( 'utf8' );
?>