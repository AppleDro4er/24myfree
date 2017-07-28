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
$fdate = 1454191620;
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
$sql="SELECT col FROM newstbl WHERE id_news=6";
$qur = mysql_query($sql);if ($qur) {$kol = mysql_num_rows($qur);if ($kol) {while($rez = mysql_fetch_assoc($qur)) {
$setchik = $rez["col"] + 1;$update_setchik = mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=6");}}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\"><img src=\"/view.php?id=6\" width=\"784\" height=\"484\" alt=\"Бэтмен: Ноэль - Рождественская история\" title=\"Бэтмен: Ноэль - Рождественская история\"><div class=\"PopUpBlock\"><h3>Бэтмен: Ноэль - Рождественская история</h3>На DC-шный лад.</div><div class=\"AuthorPostBlock\"><div class=\"SectionName\"><a href=\"/books/DC/6/\">DC</a></div><div class=\"AuthorPost\"><a href=\"\">TopGar</a></div><div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div><div class=\"PostText\">Рождество - пора чудес. Люди дарят друг другу подарки, делают сюрпризы, совершают хорошие поступки. И конечно же, истории, когда плохие люди становятся хорошими, связаны с “Рождественской песнью” Диккенса. Вот и здесь у нас безумно красивая, но уже всем давным-давно знакомая история.</div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>