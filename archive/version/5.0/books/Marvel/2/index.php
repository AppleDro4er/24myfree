<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/books.php");?>
<div class="WidthMain"><div class="MainSide">
<?php 
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number, $titles) {  
	$cases = array (2, 0, 1, 1, 1, 2);  
    return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
	}
$global_time = "";
$time = time();
$fdate = 1454022180;
$tm = date("H:i",$fdate);
$y = date("Y", $fdate);
$d = date("d", $fdate);
$m = date("m", $fdate);
$i_fdate = date("d.m.Y H:i",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
$sql="SELECT col FROM newstbl WHERE id_news=2";
$qur = mysql_query($sql);if ($qur) {$kol = mysql_num_rows($qur);if ($kol) {while($rez = mysql_fetch_assoc($qur)) {
$setchik = $rez["col"] + 1;$update_setchik = mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=2");}}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\"><img src=\"/view.php?id=2\" width=\"784\" height=\"484\" alt=\"Новые Люди Икс. Том 1. Первые Люди Икс - Всё по-старому\" title=\"Новые Люди Икс. Том 1. Первые Люди Икс - Всё по-старому\"><div class=\"PopUpBlock\"><h3>Новые Люди Икс. Том 1. Первые Люди Икс - Всё по-старому</h3>Мы из прошлого.</div><div class=\"AuthorPostBlock\"><div class=\"SectionName\"><a href=\"/books/Marvel/2/\">Marvel</a></div><div class=\"AuthorPost\"><a href=\"\">TopGar</a></div><div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div><div class=\"PostText\">Этот комикс является прямым продолжением сюжета Мстители против Людей Икс, так что если вы все еще не, то сейчас самое время. Ну а всех, кто знаком с событиями предыдущей глобальной арки - милости прошу в мир Новых Людей Икс.</div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>