<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/anime.php");
echo '<div class="WidthMain"><div class="MainSide">';
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number, $titles) {  
	$cases = array (2, 0, 1, 1, 1, 2);  
    return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
	}
$global_time = "";
$time = time();
$fdate = 1454022120;
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
$sql="SELECT col FROM newstbl WHERE id_news=1";
$qur = mysql_query($sql);if ($qur) {$kol = mysql_num_rows($qur);if ($kol) {while($rez = mysql_fetch_assoc($qur)) {
$setchik = $rez["col"] + 1;$update_setchik = mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=1");}}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\"><img src=\"/view_half.php?id=1\" width=\"784\" height=\"484\" alt=\"Dimension W - Измерение Ф(ансервиса)?\" title=\"Dimension W - Измерение Ф(ансервиса)?\"><div class=\"PopUpBlock\"><h3>Dimension W - Измерение Ф(ансервиса)?</h3>С катушек - долой! (на самом деле нет)</div><div class=\"AuthorPostBlock\"><div class=\"SectionName\"><a href=\"/anime/Dimension W/1/\">Dimension W</a></div><div class=\"AuthorPost\"><a href=\"/personal/1/\">AppleDro4er</a></div><div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div><div class=\"PostText\">Где-то в кронах елей сорока после затяжного карканья наконец-то поняла, что её песнь здесь слышать не желает никто, вспорхнула с ветки и улетела в чащу леса. Осыпающийся с ветки снег, был единственным, кто нарушал покой зимнего леса. Снежинки одна за другой опустились на голову Шпигеля, штатного борца с японской анимацией ныне занимающегося выслеживанием пригодной для просмотра дичи зимнего сезона. Он находился в засаде уже трое суток - по разговорам сторожил именно здесь примерно раз в неделю проходит один интересный экземпляр, привлёкший внимание Шпигеля. Боец, который ещё пол года назад мог вести охоту за тремя или даже пятью тайтлами нонче остался наедине с собой, зимним лесом и ходящем в лесах зверем с кличкой Dimension W.";
include($_SERVER["DOCUMENT_ROOT"]."/include/comment.php");
echo "</div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php");
?>