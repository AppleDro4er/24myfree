<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/games.php");?>
<div class="WidthMain"><div class="MainSide">
<?php 
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number, $titles) {  
	$cases = array (2, 0, 1, 1, 1, 2);  
    return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
	}
$global_time = "";
$time = time();
$fdate = 1454191740;
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
$sql="SELECT col FROM newstbl WHERE id_news=8";
$qur = mysql_query($sql);if ($qur) {$kol = mysql_num_rows($qur);if ($kol) {while($rez = mysql_fetch_assoc($qur)) {
$setchik = $rez["col"] + 1;$update_setchik = mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=8");}}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\"><img src=\"/view.php?id=8\" width=\"784\" height=\"484\" alt=\"Skyrim - Расширение Кругозора от 31.01.2016\" title=\"Skyrim - Расширение Кругозора от 31.01.2016\"><div class=\"PopUpBlock\"><h3>Skyrim - Расширение Кругозора от 31.01.2016</h3>Конский хвост!</div><div class=\"AuthorPostBlock\"><div class=\"SectionName\"><a href=\"/games/The Elder Scrolls/8/\">The Elder Scrolls</a></div><div class=\"AuthorPost\"><a href=\"\">TopGar</a></div><div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div><div class=\"PostText\">Конечно же можно было сделать ещё один РК про великолепный Fallout, но он хорош, в каком-то смысле, а Скайрим вечен. Чувствуете разницу?</div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>