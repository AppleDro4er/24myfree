<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
$uploaddir = 'upload/';
$id_news = $_GET["id"];

if(!is_numeric($id_news)) {
  die("File id must be numeric");
}

$sql = "SELECT img_name, img_type FROM newstbl WHERE id_news=\"$id_news\"";
$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
		if($qur && $kol) {
		$rez = mysql_fetch_assoc($qur);
		if(is_null($rez) || count($rez)==0) {
		die("File not found");
		}
		header("Content-Type: " . $rez['img_type']);
		readfile($uploaddir.$rez['img_name']);
		} else echo "<font color=\"red\">Ошибка запроса</font>";
?>