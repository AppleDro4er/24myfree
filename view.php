<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");$uploaddir = 'upload/';$id_news = $_GET["id"];$qur = mysql_query("SELECT img_name, img_type FROM newstbl WHERE id_news=$id_news");$kol = mysql_num_rows($qur);if($qur && $kol) {$rez = mysql_fetch_assoc($qur);header("Content-Type: " . $rez['img_type']);readfile($uploaddir.$rez['img_name']);}
?>