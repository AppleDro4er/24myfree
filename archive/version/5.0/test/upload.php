<?php
require_once("../include/connection.php");



	$sql = mysql_query("INSERT INTO newstbl SET img_name=\"$name\", img_original_name=\"$original_name\", img_type=\"$type\"");
	if (!$sql) {
    die('Неверный запрос: ' . mysql_error());
	}
	$id = mysql_query("SELECT LAST_INSERT_ID() FROM newstbl");
	echo "File is valid, and was successfully uploaded. You can view it <a href=\"view.php?id=$id\">here</a>\n";
} else {
   echo "File uploading failed.\n";
 }
?>