<?php include($_SERVER["DOCUMENT_ROOT"]."/include/games.php");
echo '<div class="MainMenuSkew"><ul class="MainMenu"><li class="SelectedMM"><a href="/games/">Свежее</a></li><li><a href="/games/top/">Топ</a></li><li><a href="/games/old/">Старое</a></li></ul></div>
</div><div class="WidthMain"><div class="MainSide">';
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number,$titles) {
$cases = array (2, 0, 1, 1, 1, 2);
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$global_time="";$time=time();$fdate=1458839383;
$tm=date("H:i",$fdate);$y=date("Y",$fdate);$d=date("d",$fdate);$m=date("m",$fdate);$i_fdate=date("d.m.Y H:i",$fdate);
$last=round(($time - $fdate)/60);$decl=declOfNum($last, array("минуту","минуты","минут"));
if($last<60)$global_time="$decl назад";
elseif($i_fdate==date("d.m.Y",$time))$global_time="Сегодня, $tm";
elseif($i_fdate==date("d.m.Y",strtotime("-1 day")))$global_time="Вчера, $tm";
elseif($y==date("d.m.Y",$time))$global_time="$tm $d/$m";
else $global_time="$i_fdate";
$qur=mysql_query("SELECT col FROM newstbl WHERE id_news=78");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
$setchik=$rez["col"]+1;$update_setchik=mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=78");}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\">
<img src=\"/view.php?id=78\" width=\"784\" height=\"484\" alt=\"Создатель серии X-COM анонсировал Phoenix Point\" title=\"Создатель серии X-COM анонсировал Phoenix Point\">
<div class=\"PopUpBlock\"><h3>Создатель серии X-COM анонсировал Phoenix Point</h3>Gollop'ом по Европам</div>
<div class=\"AuthorPostBlock\">
<div class=\"SectionName\"><a href=\"/games/Phoenix Point/78/\">Phoenix Point</a></div>
<div class=\"AuthorPost\"><a href=\"/personal/1/\">AppleDro4er</a></div>
<div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div>
<div class=\"PostText\">";
echo "<p><img width=\"217\" src=\"/upload/medialibrary/4da19b77beabfb7a5ca8173208d2de7d.png\" class=\"ImgRight\">
</p>
<p><strong><u>Джулиан Голлоп</u></strong> – один из создателей оригинальной серии X-COM, на днях анонсировал вторую игру, которую будет разрабатывать компания Snapshot Games – американская студия основанная в 2013 году Джулианом Голлопом и Дэвидом Кайе. Как рассказал Джулиан Голлоп, Phoenix Point будет представлена в жанре пошаговой тактической стратегии на глобальной карте мира.
</p>
<p>
Первый игрой компании был Chaos Reborn – наследник одноименной игры 1985 года, Chaos: The Battle of Wizards, успешно профинансированный на Kickstarter в 2014 году и выпущенный 26 октября 2015 года. Подробностей пока не сообщается, но уже сейчас можно подписаться на новости игры оформив подписку на <a href=\"http://www.phoenixpoint.info/\" rel=\"nofollow\" target=\"_blank\">этом сайте</a>
</p></div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>