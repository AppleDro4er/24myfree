<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection-only.php");
$from = $_POST['FROM'];
$sort = $_POST['SORT'];
$page = $_GET['page'];
if($page) {
$sql = "SELECT * FROM newstbl";
$cur_page = $page;
$per_page = 6;
$results = mysql_query($sql) or die("MySQL Error:" .mysql_error());
$num_rows = mysql_num_rows($results);
$prev_page = $page-1;
$next_page = $page+1;
$page_start = (($per_page * $page)-$per_page);
if($num_rows<=$per_page){
$num_pages = 1;
}else if(($num_rows % $per_page)==0){
$num_pages = ($num_rows/$per_page);
}else{
$num_pages = ($num_rows/$per_page)+1;
$num_pages = (int)$num_pages;
}
if(!empty($from)) {
if($from == "games") {$from = 5; $sort = "DESC"; $top = "id_news";}
if($from == "films") {$from = 4; $sort = "DESC"; $top = "id_news";}
if($from == "hardware") {$from = 3; $sort = "DESC"; $top = "id_news";}
if($from == "books") {$from = 2; $sort = "DESC"; $top = "id_news";}
if($from == "anime") {$from = 1; $sort = "DESC"; $top = "id_news";}
$sql = "SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN raztbl ON newstbl.id_raz = raztbl.id_raz LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user WHERE newstbl.id_raz = $from ORDER BY newstbl.$top $sort LIMIT $page_start, $per_page";
}
if(!empty($sort)) {
if($sort == "new") {$sort = "DESC"; $top = "id_news";}
if($sort == "old") {$sort = "ASC"; $top = "id_news";}
if($sort == "top") {$sort = "DESC"; $top = "col";}
$sql = "SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN raztbl ON newstbl.id_raz = raztbl.id_raz LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user ORDER BY newstbl.$top $sort LIMIT $page_start, $per_page";
}
if(!empty($sort)&&!empty($from)) {
if($from == "games") {$from = 5;}
if($from == "films") {$from = 4;}
if($from == "hardware") {$from = 3;}
if($from == "books") {$from = 2;}
if($from == "anime") {$from = 1;}
if($sort == "new") {$sort = "DESC"; $top = "id_news";}
if($sort == "old") {$sort = "ASC"; $top = "id_news";}
if($sort == "top") {$sort = "DESC"; $top = "col";}
$sql = "SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN raztbl ON newstbl.id_raz = raztbl.id_raz LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user WHERE newstbl.id_raz = $from ORDER BY newstbl.$top $sort LIMIT $page_start, $per_page";
}
function declOfNum($number, $titles) {
$cases = array (2, 0, 1, 1, 1, 2);  
return $number.' '.$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
}
$result = mysql_query($sql); $kol = mysql_num_rows($result);
if($result&&$kol) {
while ($rez = mysql_fetch_assoc($result)) {
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
echo "<div class='GameListWrap' style='z-index:$kol;'>";
$kol=$kol-2;
echo "<div class='GameList'><a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img alt='$title' src='/view_half2.php?id=$id_news' height='360' width='518'></a><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";

if($rez = mysql_fetch_assoc($result)) {
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
echo "<div class='GameList'><a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img alt='$title' src='/view_half2.php?id=$id_news' height='360' width='518'></a><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
}echo "</div>";
}}
} else {
function declOfNum($number, $titles) {
$cases = array (2, 0, 1, 1, 1, 2);  
return $number.' '.$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
}
$sql = "SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN raztbl ON newstbl.id_raz = raztbl.id_raz LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user ORDER BY newstbl.id_news DESC LIMIT 6";
$result = mysql_query($sql);$kol = mysql_num_rows($result);
if($result&&$kol) {
while ($rez = mysql_fetch_assoc($result)) {
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
echo "<div class='GameListWrap' style='z-index:$kol;'>";
$kol=$kol-2;
echo "<div class='GameList'><a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img alt='$title' src='/view_half2.php?id=$id_news' height='360' width='518'></a><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
if($rez = mysql_fetch_assoc($result)) {
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
echo "<div class='GameList'><a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img alt='$title' src='/view_half2.php?id=$id_news' height='360' width='518'></a><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
}echo "</div>";
}}
}
?>