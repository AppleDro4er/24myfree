<?php include($_SERVER["DOCUMENT_ROOT"]."/include/books.php");
echo '<div class="MainMenuSkew"><ul class="MainMenu"><li class="SelectedMM"><a href="/books/">Свежее</a></li><li><a href="/books/top/">Топ</a></li><li><a href="/books/old/">Старое</a></li></ul></div>
</div><div class="WidthMain"><div class="MainSide">';
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number,$titles) {
$cases = array (2, 0, 1, 1, 1, 2);
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$global_time="";$time=time();$fdate=1458124014;
$tm=date("H:i",$fdate);$y=date("Y",$fdate);$d=date("d",$fdate);$m=date("m",$fdate);$i_fdate=date("d.m.Y H:i",$fdate);
$last=round(($time - $fdate)/60);$decl=declOfNum($last, array("минуту","минуты","минут"));
if($last<60)$global_time="$decl назад";
elseif($i_fdate==date("d.m.Y",$time))$global_time="Сегодня, $tm";
elseif($i_fdate==date("d.m.Y",strtotime("-1 day")))$global_time="Вчера, $tm";
elseif($y==date("d.m.Y",$time))$global_time="$tm $d/$m";
else $global_time="$i_fdate";
$qur=mysql_query("SELECT col FROM newstbl WHERE id_news=73");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
$setchik=$rez["col"]+1;$update_setchik=mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news=73");}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\">
<img src=\"/view.php?id=73\" width=\"784\" height=\"484\" alt=\"Без игры жизни нет. Том 1 - Родной мир\" title=\"Без игры жизни нет. Том 1 - Родной мир\">
<div class=\"PopUpBlock\"><h3>Без игры жизни нет. Том 1 - Родной мир</h3>И не только для Соро и Сиро.</div>
<div class=\"AuthorPostBlock\">
<div class=\"SectionName\"><a href=\"/books/No Game No Life/73/\">No Game No Life</a></div>
<div class=\"AuthorPost\"><a href=\"/personal/1/\">AppleDro4er</a></div>
<div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div>
<div class=\"PostText\">";
echo "<p style=\"text-align: center;\">
	Любите ли вы No Game No Life точно так же, как люблю его я? Ну, чтобы до боли в кулачках сжимать оные во время сопереживаний персонажам так, что себе в жизни не будешь сопереживать. Чтобы вытирать платочком брызжущую кровь из глаз из-за кислотной палитры аниме и всё равно получать ну вот практически неописуемое удовольствие. Ну потому что братик Сора и сестрёнка Сиро очень обаятельные, забавные и их приключения стоят того, чтобы о них узнать. И не обязательно чтобы это была аниме-адаптация ранобе.
</p><p><a href=\"http://fast-anime.ru/\" rel=\"nofollow\"><img width=\"784\" src=\"/upload/medialibrary/fe1b4d74b272b84e8582a4fa2166dc06.jpg\" class=\"ImgBig\"></a>
</p><p><img width=\"217\" src=\"/upload/medialibrary/cebfbdf51fcc5a2533e8ac2980683ae7.jpg\" class=\"ImgRight\">
</p><p><strong><u>Читать мангу</u></strong> можно и нужно только по одной причине - вернуться на земли королевства людей Элькии и вообще вернуться на просторы Дисборда. История начнётся ровно оттуда же, откуда через год стартанёт аниме-адаптация (манга в Японии вышла в 2013 году) - Сора и Сиро гнут читеров на просторах пвп-арены очередной ММО, которая им уже наскучила своей простотой. Они всегда выбивались из общей массы людей, даже, когда были детьми, но чем старше они становятся, тем шире становиться эта пропасть. Это люди, которые выросли в масс-культуре, прославляющей юность, молодость и своеобразную форму гедонизма. И их жизнь суперкомпьютеров облачённых в тела двух подростков (ладно, окей, Сиро ещё не перешла в переходный возраст) обтянута плёнкой серого существования в условиях, когда невозможно просчитать все вероятности возможных событий, ведь как бы сильно не самоупорядочивалась социальная реальность, она структурируется в рамки закономерностей, а отнюдь не социальных законов. Точной статистики нет, да и вообще статистика уж больно условна и ограничена взглядом счетовода. И, что самое важное, количественными методами все особенности не просчитать, а правил, в рамках которых можно было бы всё упорядочить нет. Законы писанные людьми уже лет 200 как работают через раз (до этого просто не было столь ресурсов для столь объемлющей организации человеческих масс), а по неписанным законам расчёты получаются так себе. Ну разве это тот мир, в котором должны жить Сора и Сиро, м?
</p><p><img width=\"784\" src=\"/upload/medialibrary/58d0825b8c78b33f8e7e618e8dfcea3a.jpg\" class=\"ImgBig\">
</p><p><strong><u>С другой стороны</u></strong> есть Дисборд. Не то, чтобы герои попали туда по своей воле, но зато именно здесь их умения и навыки способны пригодиться, а их амбиции смогут быть удовлетворены. Правила, которые содержаться всего в 10-ти пунктах и должны быть соблюдены всеми без исключения соблюдаются и работают без какого-либо бюррократического аппарата. Есть бог. Есть силы. Он создал правила и весь мир работает по ним. Столь ли важно откуда эти силы, откуда боги, вообще как это работает, если перед глазами разворачивается история неосуществимая без этих условностей. Там, где тому же <a href=\"http://tydysh.tv/books/tate_no_yuusha_no_nariagari/2567/\" rel=\"nofollow\">Герою Щита</a> приходится ёрничать над бэком вселенной, здесь даже необходимости в этом не возникает. Да, это очередная история об избранных, которые ИЗБРАНЫ и которые не могут не дойти до конца и вырвать лавры победы из рук последнего босса, но, боже, какие это избранные, какой это конец (который был примерно обозначен в финале 12-ой серии первого сезона), и что вообще там твориться. Сколь бы пафосны и не самонадеянны не были речи героев, сколько бы они сами не блистали в лучах успеха (или не отражались в бликах своих неординарных способностей), они всё равно остаются фриками и хикканами, чьи желания прозрачны, а часть потребностей очевидна. Они способны ошибаться и ошибаются (ладно, только Соро), а потом авторским пером генерируют такие лулзы, что улыбка не исчезает с лица ещё очень долго. Изо всех щелей, в которые только можно впихнуть фансервис торчит он родимый, но это нисколечко не отчуждает и совсем не отвлекает от чтения (сиськи отдельно, буквы отдельно). Подавленная гиперсексуальность Соро приправленная отсутствием опыта социального взаимодействия с противоположным полом в рамках ролей “парень - девушка” легитимизирует и повышенную сексуальность Стеф и всё то, что крутиться вокруг этого. Выкинь это - придётся выкинуть и ещё половину истории, уж слишком много на этом завязано.
</p><p><img width=\"784\" src=\"/upload/medialibrary/d2db63d14f886666d82ccf5e36668285.jpg\" class=\"ImgBig\">
</p><p><strong><u>Главное огорчение</u></strong> манги No Game No Life в том, что она жутка короткая и в том, что прошло уже три года с выхода первого тома и второго на горизонте так и не видно. А жаль - если бы была возможность увидеть эту историю в таком формате до самого конца я был бы ну очень рад. Издательство <a href=\"https://vk.com/xlmedia\" rel=\"nofollow\">XL Media</a> сделало очень хорошее дело, выпустив эту мангу на российский рынок, и я не знаю кем надо быть, чтобы не приобрести себе данное произведение. Сделать это можно вот <a href=\"http://fast-anime.ru/Manga/1247\" rel=\"nofollow\">прямо тут по ссылке</a> в магазине <a href=\"http://fast-anime.ru/\" rel=\"nofollow\">Fast Anime</a>, тем более что совсем недавно туда завезли экземпляры с дополнительного тиража.
</p></div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>