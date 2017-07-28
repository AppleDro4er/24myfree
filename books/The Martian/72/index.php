<?php include($_SERVER["DOCUMENT_ROOT"]."/include/books.php");
echo '<div class="MainMenuSkew"><ul class="MainMenu"><li class="SelectedMM"><a href="/books/">Свежее</a></li><li><a href="/books/top/">Топ</a></li><li><a href="/books/old/">Старое</a></li></ul></div>
</div><div class="WidthMain"><div class="MainSide">';
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number,$titles) {
$cases = array (2, 0, 1, 1, 1, 2);
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$global_time="";$time=time();$fdate=1458123083;
$tm=date("H:i",$fdate);$y=date("Y",$fdate);$d=date("d",$fdate);$m=date("m",$fdate);$i_fdate=date("d.m.Y H:i",$fdate);
$last=round(($time - $fdate)/60);$decl=declOfNum($last, array("минуту","минуты","минут"));
if($last<60)$global_time="$decl назад";
elseif($i_fdate==date("d.m.Y",$time))$global_time="Сегодня, $tm";
elseif($i_fdate==date("d.m.Y",strtotime("-1 day")))$global_time="Вчера, $tm";
elseif($y==date("d.m.Y",$time))$global_time="$tm $d/$m";
else $global_time="$i_fdate";
$qur=mysql_query("SELECT col FROM newstbl WHERE id_news=72");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
$setchik=$rez["col"]+1;$update_setchik=mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=72");}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\">
<img src=\"/view.php?id=72\" width=\"784\" height=\"484\" alt=\"The Martian - Марс атакует!\" title=\"The Martian - Марс атакует!\">
<div class=\"PopUpBlock\"><h3>The Martian - Марс атакует!</h3>Вы ещё не прочитали? А зря.</div>
<div class=\"AuthorPostBlock\">
<div class=\"SectionName\"><a href=\"/books/The Martian/72/\">The Martian</a></div>
<div class=\"AuthorPost\"><a href=\"/personal/1/\">AppleDro4er</a></div>
<div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div>
<div class=\"PostText\">";
echo "<p style=\"text-align: center;\">
	После премьерного показа “Марсианина” в Торонто появились <noindex><a href=\"https://tjournal.ru/p/why-watch-the-martian\" target=\"_blank\">первые отзывы</a></noindex> критиков на него. И, в общем-то, получается, что фильм получился как минимум хорошим (а на фоне Интерстеллара и вообще великолепным). До премьеры в России (8 октября) осталось меньше месяца, и это отличный повод прочесть книгу первоисточник. Зачем? Вот вам 4 причины, которые должны вас убедить в этом.
</p>
<iframe class=\"BigVideo\" width=\"784\" height=\"441\" src=\"//www.youtube.com/embed/IcfrZJ-0Yrw\" frameborder=\"0\" allowfullscreen=\"\">
</iframe>
<p>
	<strong><u>1. Помните</u></strong>, как в детстве зачитывались Робинзоном Крузо и погружались в его историю? Я помню. Борьба человека с окружающим миром и с самим собой в попытках не свихнуться от одиночества - в мои 10 лет это была классная история. Сейчас же, когда количество игр-сурвайволов просто зашкаливает и каждый может почувствовать себя Робинзоном, книжка не вызовет столько эмоций. Да и тот факт, что восприятие в 10 и в 20 лет сильно разнится, никуда не уходит. Зато сейчас можно открыть “Марсианина” и, прочитав о приключениях Марка Уотни, легко можно понять, что Робинзон сосёт эклер и его приключения на острове, полном еды и иных полезных ресурсов - лёгкая прогулка перед сном для Уотни. Последний реально борется с окружающей средой, на него сваливаются всевозможные испытания и он их проходит со скрежетом зубов, обилием синяков и улыбкой. Марк же всё-таки весёлый и обаятельный малый.
</p>
<p> <img width=\"784\" src=\"/upload/medialibrary/56f8103b4cdde214efdb138b58fc6c76.jpg\" class=\"ImgBig\">
</p>
<p><img src=\"\">
</p>
<p>
	<strong><u>2. Если вы</u></strong>, зачитываясь Жюлем Верном, удивлялись умению героев находить не очевидные выходы из сложных ситуаций и познавать мир с помощью знаний астрономии, геометрии и физики, то вы точно получите удовольствии от “Марсианина”. Каждый шаг Марка описывается максимально детально, каждое его действие служит определённой цели и не делается наобум. Нужно оросить картошку? Давайте набросаем несколько химический формул и поймём, как это можно получить при текущих условиях. То, что в школе вы могли посчитать ненужными навыками, потому что они не имели никакого отношения к реальности, здесь внезапно становится залогом выживания героя. Энди Вейер написал оду человеческому разуму, который может спасти человека даже из самой патовой ситуации.
</p>
<p> <img width=\"784\" src=\"/upload/medialibrary/1e68cb17185958dec065eb82c98601d6.jpg\" class=\"ImgBig\">
</p>
<p><img src=\"\">
</p>
<p>
	<strong><u>3. Если вам</u></strong> небезынтересна тема космоса, но вы ненавидите плавающие описания механизмов функционирования всего и вся, то книжный Марсианин станет для вас раем. В фильме большая часть технопорно будет опущена, а история сосредоточена на самих актах выживания Марка на протяжении почти двух лет. Правда, тут есть два пути. Первый - прочесть книгу и увидеть само действо, понимая, что за ним стоят расчёты и логика. Второй - посмотреть фильм, понять что некоторые вещи не были объяснены и полезть в книгу за ответами. Выбирать вам.
</p>
<p>
<strong><u>4. “Марсианин”</u></strong> - это первоклассное приключенческое чтиво. Книга читается на одном дыхании и действие не прекращается до самого финала. Но вот лично для меня финал, который становится очевиден страниц за 50 до конца книги, был смазан. Пафас “Спасения рядового Уотни” оказался сильным контрастом истории о том, как человек противостоял Марсу.
</p>
<p><img width=\"784\" src=\"/upload/medialibrary/90a9f70bb8fbbd3491300e298baaf67f.jpg\" class=\"ImgBig\">
</p></div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>