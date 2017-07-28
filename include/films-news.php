<div class='WidthMain'><div class='MainPage'>
<script type="text/javascript">
$(document).ready(function(){$("#sizen").text()<=1&&$(".MoreMain").hide();var e=1,i=1*$("#sizen").text();$(document).scroll(function(){return $(window).scrollTop()+$(window).height()>=$(document).height()?(i>e?(e++,$(".MoreMain").hide(),$(".MainPage").append('<div class="LoaderAjaxLife"><img src="/img/loader.gif" width="30" height="30" alt="Img" /></div>'),$.ajax({type:"POST",url:"/index_ajax.php?page="+e,data:{FROM:"films",SORT:"new"},success:function(a){$(".MainPage .LoaderAjaxLife").remove(),$(".MainPage").append(a),e>=i?$(".MoreMain").hide():$(".MoreMain").show()}})):$(".MoreMain").hide(),!1):void 0})});
</script>
<?php
function declOfNum($number, $titles) {  
	$cases = array (2, 0, 1, 1, 1, 2);  
    return $number.' '.$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
	}
function news() {
$sql = 'SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user WHERE catbl.id_raz = 4 ORDER BY newstbl.id_news DESC LIMIT 6';
$sql_two='SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat WHERE id_raz = 4';
$kol_two=mysql_num_rows(mysql_query($sql_two));
$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
if($qur&&$kol&&$kol_two) {
while ($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
$col = $rez['col'];
$time = time();
$id_news = $rez['id_news'];
$id_author = $rez['id_author'];
$title = $rez['title'];
$description = $rez['description'];
$fdate = $rez['full_date'];
$cat_title = $rez['title_cat'];
$title_raz = $rez["title_raz"];
$name_author = $rez["nickname"];
$title_lower_raz = strtolower($title_raz);
$tm = date('H:i',$fdate);
$y = date('Y', $fdate);
$d = date('d', $fdate);
$m = date('m', $fdate);
$i_fdate = date("d.m.Y H:i",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class='PostHead' style='z-index:$kol_two'><a href=\"/$title_lower_raz/$cat_title/$id_news/\">
<style>.svg-image_$id_news { clip-path: url(#clip-triangle_$id_news); }</style>
<svg width='1130' height='640'>
<image class='svg-image_$id_news' alt='$title' xlink:href='/view.php?id=$id_news' width='1130' height='640' />
<defs>
	<clipPath id='clip-triangle_$id_news'>
              <polygon points='0 0, 1036 0, 1036 638.08, 0 558.08'/>
	</clipPath>
</defs>
</svg>
</a><div class='PopUpBlock'><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div style='display: none;' class='PopUpText'>$description</div></div><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
$kol_two--;
if($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
$col = $rez['col'];
$time = time();
$id_news = $rez['id_news'];
$id_author = $rez['id_author'];
$title = $rez['title'];
$description = $rez['description'];
$fdate = $rez['full_date'];
$cat_title = $rez['title_cat'];
$title_raz = $rez["title_raz"];
$name_author = $rez["nickname"];
$title_lower_raz = strtolower($title_raz);
$tm = date('H:i',$fdate);
$y = date('Y', $fdate);
$d = date('d', $fdate);
$m = date('m', $fdate);
$i_fdate = date("d.m.Y H:i",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class='PostHead' style='z-index:$kol_two'><a href=\"/$title_lower_raz/$cat_title/$id_news/\">
<style>.svg-image_$id_news { clip-path: url(#clip-triangle_$id_news); }</style>
<svg width='1130' height='640'>
<image class='svg-image_$id_news' alt='$title' xlink:href='/view.php?id=$id_news' width='1130' height='640' />
<defs>
	<clipPath id='clip-triangle_$id_news'>
              <polygon points='0 0, 1036 0, 1036 638.08, 0 558.08'/>
	</clipPath>
</defs>
</svg>
</a><div class='PopUpBlock'><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div style='display: none;' class='PopUpText'>$description</div></div><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
$kol_two--;
}

while ($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
$col = $rez['col'];
$time = time();
$id_news = $rez['id_news'];
$id_author = $rez['id_author'];
$title = $rez['title'];
$description = $rez['description'];
$fdate = $rez['full_date'];
$cat_title = $rez['title_cat'];
$title_raz = $rez["title_raz"];
$name_author = $rez["nickname"];
$title_lower_raz = strtolower($title_raz);
$tm = date('H:i',$fdate);
$y = date('Y', $fdate);
$d = date('d', $fdate);
$m = date('m', $fdate);
$i_fdate = date("d.m.Y H:i",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class='GameListWrap' style='z-index:$kol_two;'>";
$kol_two=$kol_two-2;
echo "<div class='GameList'><a href=\"/$title_lower_raz/$cat_title/$id_news/\">
<style>.svg-image_$id_news { clip-path: url(#clip-triangle_$id_news); }</style>
<svg width='600' height='400'>
<image class='svg-image_$id_news' alt='$title' xlink:href='/view.php?id=$id_news' width='600' height='400' />
<defs>
	<clipPath id='clip-triangle_$id_news'>
	<polygon points='0 0, 518 0, 518 358.92, 0 313.92'/>
	</clipPath>
</defs>
</svg>
</a><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";

if($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
$col = $rez['col'];
$time = time();
$id_news = $rez['id_news'];
$id_author = $rez['id_author'];
$title = $rez['title'];
$description = $rez['description'];
$fdate = $rez['full_date'];
$cat_title = $rez['title_cat'];
$title_raz = $rez["title_raz"];
$name_author = $rez["nickname"];
$title_lower_raz = strtolower($title_raz);
$tm = date('H:i',$fdate);
$y = date('Y', $fdate);
$d = date('d', $fdate);
$m = date('m', $fdate);
$i_fdate = date("d.m.Y H:i",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class='GameList'><a href=\"/$title_lower_raz/$cat_title/$id_news/\">
<style>.svg-image_$id_news { clip-path: url(#clip-triangle_$id_news); }</style>
<svg width='600' height='400'>
<image class='svg-image_$id_news' alt='$title' xlink:href='/view.php?id=$id_news' width='600' height='400' />
<defs>
	<clipPath id='clip-triangle_$id_news'>
	<polygon points='0 0, 518 0, 518 358.92, 0 313.92'/>
	</clipPath>
</defs>
</svg>
</a><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
}echo "</div>";}}}}echo news();
?>
</div>