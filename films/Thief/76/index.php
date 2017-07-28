<?php include($_SERVER["DOCUMENT_ROOT"]."/include/films.php");
echo '<div class="MainMenuSkew"><ul class="MainMenu"><li class="SelectedMM"><a href="/films/">Свежее</a></li><li><a href="/films/top/">Топ</a></li><li><a href="/films/old/">Старое</a></li></ul></div>
</div><div class="WidthMain"><div class="MainSide">';
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number,$titles) {
$cases = array (2, 0, 1, 1, 1, 2);
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$global_time="";$time=time();$fdate=1458173593;
$tm=date("H:i",$fdate);$y=date("Y",$fdate);$d=date("d",$fdate);$m=date("m",$fdate);$i_fdate=date("d.m.Y H:i",$fdate);
$last=round(($time - $fdate)/60);$decl=declOfNum($last, array("минуту","минуты","минут"));
if($last<60)$global_time="$decl назад";
elseif($i_fdate==date("d.m.Y",$time))$global_time="Сегодня, $tm";
elseif($i_fdate==date("d.m.Y",strtotime("-1 day")))$global_time="Вчера, $tm";
elseif($y==date("d.m.Y",$time))$global_time="$tm $d/$m";
else $global_time="$i_fdate";
$qur=mysql_query("SELECT col FROM newstbl WHERE id_news=76");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
$setchik=$rez["col"]+1;$update_setchik=mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=76");}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\">
<img src=\"/view.php?id=76\" width=\"784\" height=\"484\" alt=\"Thief муви – начало\" title=\"Thief муви – начало\">
<div class=\"PopUpBlock\"><h3>Thief муви – начало</h3>Прямиком в ад</div>
<div class=\"AuthorPostBlock\">
<div class=\"SectionName\"><a href=\"/films/Thief/76/\">Thief</a></div>
<div class=\"AuthorPost\"><a href=\"/personal/1/\">AppleDro4er</a></div>
<div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div>
<div class=\"PostText\">";
echo "<p style=\"text-align: center;\">История фильмов, основанных на играх не так радужна, как кажется. Не имеет значения на сколько игра популярна и как хорошо срежиссирован фильм, конечный результат почти всегда – неизбежно плохо. Поэтому скорее всего решение основывать фильм на франшизе Thief и ее четвертой части является попыткой переломить эту тенденцию.
</p><p><img width=\"217\" src=\"/upload/medialibrary/c3e8210fdbf979ca42240c461281b606.jpg\" class=\"ImgRight\">
</p><p><strong><u>The Hollywood Reporter</u></strong> <a href=\"http://www.hollywoodreporter.com/heat-vision/thief-video-game-film-works-872873\" target=\"_blank\">сообщает</a>, что фильм снимается в Лос-Анджелесе кинокомпанией Straight Up Films, которая приобрела права на экранизацию франшизы у Square Enix. Сценарием будет заниматься Адам Мейсон (Adam Mason) и Саймон Бойс (Simon Boyes), которые работали над сценарием фильмов <a href=\"http://www.kinopoisk.ru/film/893535/\" target=\"_blank\">\"Хуже, чем ложь\"</a> (Misconduct) и <a href=\"http://www.kinopoisk.ru/film/666763/\" rel=\"nofollow\" target=\"_blank\">\"Небезопасно для работы\"</a> (Not Safe for Work). Действие будет происходить в классической тёмной стилистике игры, где мастер-вор попытается вернуть свободу слова и мысли людей.
</p><p><strong><u>На сегодняшний момент</u></strong> по данным IMDB кинокомпания Straight Up Films выпустила десять фильмов, среди которых такие неплохие картины как <a href=\"http://www.kinopoisk.ru/film/687670/\" target=\"_blank\">\"Превосходство\"</a> (Transcendence), <a href=\"http://www.kinopoisk.ru/film/262886/\" rel=\"nofollow\" target=\"_blank\">\"Образование Чарли Бэнкса\"</a> (The Education of Charlie Banks), <a href=\"http://www.kinopoisk.ru/film/664855/\" rel=\"nofollow\" target=\"_blank\">\"Поженить Бэрри\"</a> (Someone Marry Barry), наиболее запоминающимся из которых является фильм <a href=\"http://www.kinopoisk.ru/film/687670/\" rel=\"nofollow\" target=\"_blank\">\"Превосходство\"</a> и скорее всего из-за участия в нем Джонии Деппа (Johnny Depp). В то время как лучшей работой Мейсона и Бойза является сценарий фильма <a href=\"http://www.kinopoisk.ru/film/893535/\" target=\"_blank\">\"Хуже, чем ложь\"</a> (Misconduct), юридическая драма / триллер с довольно впечатляющим бюджетом.
</p><p><img width=\"217\" src=\"/upload/medialibrary/41c610a437bbf320062e4b561d59daf9.jpg\" class=\"ImgLeft\">
</p><p><strong><u>Принимая во внимание</u></strong> все это возникает вопрос: стоит ли снимать фильм, основанный на вселенной Thief именно сейчас? Не то что бы мне были не интересны истории жанра фантастики, но она вряд ли будет настолько уникальна, что ее стоит привязывать именно к этой игровой вселенной и называть именем франшизы – Вор, тем более, что эта история уже попахивает мейнстримом, однако в жанре фантастики приветствуются определенные риски.
</p></div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>