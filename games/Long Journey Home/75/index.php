<?php include($_SERVER["DOCUMENT_ROOT"]."/include/games.php");
echo '<div class="MainMenuSkew"><ul class="MainMenu"><li class="SelectedMM"><a href="/games/">Свежее</a></li><li><a href="/games/top/">Топ</a></li><li><a href="/games/old/">Старое</a></li></ul></div>
</div><div class="WidthMain"><div class="MainSide">';
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number,$titles) {
$cases = array (2, 0, 1, 1, 1, 2);
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$global_time="";$time=time();$fdate=1458164160;
$tm=date("H:i",$fdate);$y=date("Y",$fdate);$d=date("d",$fdate);$m=date("m",$fdate);$i_fdate=date("d.m.Y H:i",$fdate);
$last=round(($time - $fdate)/60);$decl=declOfNum($last, array("минуту","минуты","минут"));
if($last<60)$global_time="$decl назад";
elseif($i_fdate==date("d.m.Y",$time))$global_time="Сегодня, $tm";
elseif($i_fdate==date("d.m.Y",strtotime("-1 day")))$global_time="Вчера, $tm";
elseif($y==date("d.m.Y",$time))$global_time="$tm $d/$m";
else $global_time="$i_fdate";
$qur=mysql_query("SELECT col FROM newstbl WHERE id_news=75");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
$setchik=$rez["col"]+1;$update_setchik=mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=75");}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\">
<img src=\"/view.php?id=75\" width=\"784\" height=\"484\" alt=\"Long Journey Home – исследование космического пространства с элементами RPG\" title=\"Long Journey Home – исследование космического пространства с элементами RPG\">
<div class=\"PopUpBlock\"><h3>Long Journey Home – исследование космического пространства с элементами RPG</h3>Вдохновленная Farscape и Firefly.</div>
<div class=\"AuthorPostBlock\">
<div class=\"SectionName\"><a href=\"/games/Long Journey Home/75/\">Long Journey Home</a></div>
<div class=\"AuthorPost\"><a href=\"/personal/0/\"></a></div>
<div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div>
<div class=\"PostText\">";
echo "<p style=\"text-align: center;\">Long Journey Home игра про исследование космоса, которая обещает собрать в себе самое лучшее из такой старой классики как Starflight и Star Control 2 с мультиплеером и современным жанром Roguelike в процедурно генерируемой бесконечной и удивительно живой вселенной, а вдохновением стали Farscape и Firefly.
</p>
<p><img width=\"784\" src=\"/upload/medialibrary/2974e08fb7608592020b6f62bd460490.jpg\" class=\"ImgBig\">
</p>
<p>Это ужасно тяжёлая задача является шагом в сторону от Point-and-click адвенчур, которые немецким разработчикам из компании Deadalic знакомы больше всего, но тизер и скриншоты, выпущенные 16 марта, выглядят очень многообещающими.
</p>
<p>
<iframe class=\"BigVideo\" width=\"784\" height=\"441\" src=\"//www.youtube.com/embed/yr2NMdxU8PE\" frameborder=\"0\" allowfullscreen=\"\"></iframe>
</p>
<p><strong><u>Итак, немного вводной:</u></strong> вы – командир, управляющий маленьким межзвездным кораблем, и вы только что потерпели провал мисси, в которой человечество должно было испытать первый варп-двигатель, испытать-то испытало, однако в результате вас выбросило на край галактики, и теперь вам и вашей команде предстоит долгий и трудный путь домой.
</p>
<p><img width=\"784\" src=\"/upload/medialibrary/5b6f4ad52a765e3eae3056a718a1dfea.jpg\" class=\"ImgBig\">
</p>
<p><strong><u>Игра обещает сложные задания</u></strong>, а также время от времени представиться возможность делать сложный моральный выбор. Вам предстоит исследовать новые миры в поисках союзников и поддержки или приключений на пятую точку. Изучать технологии и грабить караваны, попутно следя за жизнипригодностью своего персонала, конечно же на протяжении всего путешествия домой на каждом шагу вас будет подстерегать о-о-опасность.
</p>
<p><img width=\"784\" src=\"/upload/medialibrary/aac85da911e704eb3d2b995ea66a983c.jpg\" class=\"ImgBig\">
</p>
<p><strong><u>Можно заметить сходство</u></strong> с FTL: Faster Than Light, и оно весьма очевидно, однако данный проект не постеснялся бросить вызов таким играм старой школы как Starflight. Как отметил в своем Твиттере, один из авторов статей на PC Gamer’e Ричард Коббет (Richard Cobbett) – «Эта игра действительно заботиться о персонаже – твой экипаж постоянно ссориться, спорит и дразнит друг-друга». От чего становиться тепло на душе.
</p>
<p style=\"text-align: center;\">
	Long Journey Home, как ожидается выйдет в релиз во второй половине 2016 года на PC, MAC, PS4 и Xbox One
</p></div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>