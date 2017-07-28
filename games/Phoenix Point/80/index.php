<?php include($_SERVER["DOCUMENT_ROOT"]."/include/games.php");
echo "<div class=\"WidthMain\"><div class=\"MainSide\">";
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number,$titles) {
$cases = array (2, 0, 1, 1, 1, 2);
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$global_time="";$time=time();$fdate=1465144740;
$tm=date("H:i",$fdate);$y=date("Y",$fdate);$d=date("d",$fdate);$m=date("m",$fdate);$i_fdate=date("d.m.Y H:i",$fdate);
$last=round(($time - $fdate)/60);$decl=declOfNum($last, array("минуту","минуты","минут"));
if($last<60)$global_time="$decl назад";
elseif($i_fdate==date("d.m.Y",$time))$global_time="Сегодня, $tm";
elseif($i_fdate==date("d.m.Y",strtotime("-1 day")))$global_time="Вчера, $tm";
elseif($y==date("d.m.Y",$time))$global_time="$tm $d/$m";
else $global_time="$i_fdate";
$qur=mysql_query("SELECT col FROM newstbl WHERE id_news=80");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
$setchik=$rez["col"]+1;$update_setchik=mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=80");}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\">
<img src=\"/view.php?id=80\" width=\"784\" height=\"484\" alt=\"Первый скриншот игры Phoenix Point или Джулиан Голлоп выходит в массы.\" title=\"Первый скриншот игры Phoenix Point или Джулиан Голлоп выходит в массы.\">
<div class=\"PopUpBlock\"><h3>Первый скриншот игры Phoenix Point или Джулиан Голлоп выходит в массы.</h3>Наряду с большим количеством произведений искусства.</div>
<div class=\"AuthorPostBlock\">
<div class=\"SectionName\"><a href=\"/games/Phoenix Point/80/\">Phoenix Point</a></div>
<div class=\"AuthorPost\"><a href=\"/personal/3/\"></a></div>
<div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div>
<div class=\"PostText\">";
echo "<p style=\"text-align: justify;\">Наконец-то дождались первого скриншота из пошаговой стратегии за семью печатями – Phoenix Point. В глаза сразу бросаются, как и следовало ожидать от создателя серии, знакомые по XCOM элементы, например, «VATS», но вишенкой являются, заставляющие краснеть DOOM, колоритные монстры, которые обещают сойти с артов представ перед игроками во всей красе на грядущем Е3.
</p><p style=\"text-align: center;\"><img src=\"/upload/medialibrary/13510b8a930c2dec8f5b09e334532bfb.jpg\" style=\"line-height: 1.6em;\">
</p><p style=\"text-align: justify;\">Гигантские бестии с очевидным перебором нижних конечностей, напоминающие этим многоножек и пауков, заставляют задаться вопросом, можем ли мы ожидать своего рода XCOM, но такой в котором противник не является превосходящими силами, а индивидуальной угрозой, типа неудавшимся или вышедшими из-под контроля экспериментами? Но тогда это может означать, что левый верхний угол с заданиями будет опять разрывать от огромного количества заданий.
</p><p style=\"text-align: center;\"><img src=\"/upload/medialibrary/fbf449741f25340a6d368e108928605f.jpg\"><br>
</p></div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>