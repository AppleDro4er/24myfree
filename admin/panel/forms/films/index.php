<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
if(!isset($_SESSION['session_username'])){header('Location: /admin/login/');}
ob_start(); ?>
<!DOCTYPE html>
<html><head>
<html><head><meta http-equiv="Content-Type" content="text/html">
<meta name="title" content="Панель управления">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/admin/style.css" type="text/css" >
<link rel="stylesheet" href="/admin/redactor/redactor.css" />
<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/redactor/redactor.js"></script>
<!-- Plugin -->
<script src="/admin/redactor/plugins/video/video.js"></script>
<script src="/admin/redactor/plugins/table/table.js"></script>
<script src="/admin/redactor/plugins/fullscreen/fullscreen.js"></script>
<!-- Language -->
<script src="/admin/redactor/lang/ru.js"></script>
<script>
$(function() {
	$('#redactor').redactor({
		lang: 'ru',
		plugins: ['table', 'video','fullscreen'],
		imageUpload: '/upload/',
	});
});
</script><title>Панель управления</title></head><body><nav id="primary_nav"><ul>
<li class="nav_dashboard"><a href="/admin/">Главная</a></li>
<li class="nav_graphs"><a href="/admin/graphs/">Графики</a></li>
<li class="nav_forms active"><a href="/admin/forms/">Формы</a></li>
<li class="nav_typography"><a href="/admin/rules/">Правила</a></li>
<li class="nav_uielements"><a href="/admin/others">Прочее</a></li>
<li class="nav_pages"><a href="/admin/pages/">Страницы</a></li></ul></nav>
<section id="main_content"><nav id="secondary_nav"><dl class="user_info">
<?php
$qur=mysql_query("SELECT * FROM usertbl WHERE username='".$_SESSION['session_username']."'");$rez=mysql_fetch_assoc($qur);$id_user=$rez["id_user"];$nickname=$rez["nickname"];
$month_arr=array('01'=>'Янв','02'=>'Фев','03'=>'Мар','04'=>'Апр','05'=>'Мая','06'=>'Июн','07'=>'Июл','08'=>'Авг','09'=>'Сен','10'=>'Окт','11'=>'Ноя','12'=>'Дек');
$date=$rez["last_login"];$t=date("H:i",$date);$Y=date("Y",$date);$d=date("d",$date);$m=date("m",$date);echo '<a href="/admin/profiles/'.$id_user.'/">';
echo '<dd><a class="welcome_user" href="/admin/profiles/'.$id_user.'/">'; ?>
Здраствуйте, <strong><?php echo $nickname; ?></strong></a>
<?php
echo '<span class="log_data">Последний вход: '.$t.' '.$d.' '.$month_arr[$m].' '.$Y.'</span>'; ?>
<a class="logout" href="/admin/logout/">Выйти</a></dd></dl><h2>Главная</h2><ul>
<li><a href="/admin/forms/games/"><span class="iconsweet">+</span>Игры</a></li>
<li><a href="/admin/forms/books/"><span class="iconsweet">+</span>Книги</a></li>
<li><a href="/admin/forms/hardware/"><span class="iconsweet">+</span>Железо</a></li>
<li><a href="/admin/forms/films/"><span class="iconsweet">+</span>Фильмы</a></li>
<li><a href="/admin/forms/anime/"><span class="iconsweet">+</span>Аниме</a></li></ul></nav>
<div id="content_wrap"><div class="widget_title"><a href="?des=add"><span class="iconsweet">+</span>
<h5>Добавить новость</h5></a></div><div class="widget_body">
<?php 
function add_edit($id_news=0,$id_cat=0,$id_author=0,$id_raz=4,$title="",$description="",$full_date="",$img_name="",$img_half_name="",$img_half2_name="",$img_type="",$col="") {
echo '<form id="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="'.$id_news.'">
<table class="activity_datatable" cellpadding="8" width="100%"><tbody><tr><td>Категория</td><td><select name="id_cat">';
if($id_news){$qur=mysql_query("SELECT * FROM catbl WHERE id_raz=4");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
if($id_cat==$rez["id_cat"]){
echo '<option value="'.$id_cat.'" selected>'.$rez["title_cat"].' ['.$id_cat.']</option>';}else{
echo '<option value="'.$rez["id_cat"].'">'.$rez["title_cat"].' ['.$rez["id_cat"].']</option>';}}}}else{
$qur=mysql_query("SELECT * FROM catbl WHERE id_raz=4");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)) {
echo '<option value='.$rez["id_cat"].'>'.$rez["title_cat"].' ['.$rez["id_cat"].']</option>';}}}
echo '</select></td></tr>
<tr><td>Заголовок</td><td><input type="text" name="title" value="'.$title.'"></td></tr>
<tr><td>Подзаголовок</td><td><input type="text" name="description" value="'.$description.'"></td></tr>
<tr><td colspan="2"><textarea id="redactor" name="text_news">'.$text_news.'</textarea></td></tr>
<tr><td><input name="userfile" type="file" value="'.$img_name.'"></td></tr>';
if($id_news) echo '<tr><td colspan="2" align="center">
<footer><button class="redactor-modal-btn" style="width: 49%;" name="cancel">Отменить</button>
<button class="redactor-modal-btn redactor-modal-action-btn" style="width: 49%;" name="edit">Добавить</button></footer>
</td></tr></table></form>';
else echo '<tr><td colspan="2" align="center">
<footer><button class="redactor-modal-btn" style="width: 49%;" name="cancel">Отменить</button>
<button class="redactor-modal-btn redactor-modal-action-btn" style="width: 49%;" name="add">Добавить</button></footer>
</td></tr></table></form>';}
function declOfNum($number, $titles) {
	$cases = array (2, 0, 1, 1, 1, 2);  
	return $number.' '.$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
}
function show() {
$qur=mysql_query("SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN raztbl ON newstbl.id_raz = raztbl.id_raz LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user WHERE newstbl.id_raz = 4 ORDER BY newstbl.id_news");
$kol=mysql_num_rows($qur);if($qur&&$kol) {
echo '<table class="activity_datatable" cellpadding="8" width="100%"><tbody><tr>
<th align="center" width="40px">ID</th>
<th align="center" width="360px">Заголовок</th>
<th align="center" width="140px">Дата</th>
<th align="center" width="180px">Категория</th>
<th align="center" width="100px">Действия</th>
<th align="center" width="90px">Просмотров</th></tr>';
while($rez=mysql_fetch_assoc($qur)) {
$global_time='';$col=$rez['col'];$time=time();$id_news=$rez['id_news'];$id_author=$rez['id_author'];$title=$rez['title'];
$description=$rez['description'];$fdate=$rez['full_date'];$cat_title=$rez['title_cat'];$title_raz=$rez["title_raz"];
$name_author=$rez["nickname"];$title_lower_raz=strtolower($title_raz);
$tm=date('H:i',$fdate);$y=date('Y',$fdate);$d=date('d',$fdate);$m=date('m',$fdate);$i_fdate=date('d.m.Y H:i',$fdate);
$last=round(($time - $fdate)/60);$decl=declOfNum($last,array('минуту','минуты','минут'));
if($last < 60)$global_time="$decl назад";
elseif($i_fdate==date("d.m.Y",$time))$global_time="Сегодня, $tm";
elseif($i_fdate==date("d.m.Y", strtotime("-1 day")))$global_time="Вчера, $tm";
elseif($y==date("d.m.Y",$time))$global_time="$tm $d/$m";
else $global_time=$i_fdate;
echo '<tr><td>'.$id_news.'</td>
<td align="center"><a href="/'.$title_lower_raz.'/'.$cat_title.'/'.$id_news.'/">'.$title.'</a></td>
<td align="center">'.$global_time.'</td>
<td align="center"><span class="green_highlight pj_cat">'.$cat_title.'</span></td>
<td align="center"><span class="data_actions iconsweet">
<a class="tip_north" original-title="User" href="/admin/profiles/'.$id_author.'/">a</a>
<a class="tip_north" original-title="Edit" href="?des=edit&id_news='.$id_news.'">C</a>
<a class="tip_north" original-title="Delete" href="?des=del&id_news='.$id_news.'">X</a></span></td>
<td align="center">'.$col.'</td>';
} echo '</tr></tbody></table>';}}
if(isset($_POST["add"])){
$uploaddir=$_SERVER["DOCUMENT_ROOT"].'/upload/';
$uploadfile=$uploaddir.basename($_FILES['userfile']['name']);
$img_name=basename($uploadfile);$img_half_name=basename($uploadfile);$img_half2_name=basename($uploadfile);
$img_type=$_FILES['userfile']['type'];$title=$_POST["title"];$text_news=$_POST["text_news"];$id_cat=$_POST["id_cat"];$id_raz=4;
$description=$_POST["description"];$id_author=$rez["id_user"];$full_date=mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
if(move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile)){
$qur=mysql_query("INSERT INTO newstbl VALUES (0, \"$id_cat\",\"$id_raz\",\"$id_author\",\"$title\",\"$description\",\"$full_date\",\"$img_name\",\"$img_half_name\",\"$img_half2_name\",\"$img_type\",0)");
$qur=mysql_query("SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN raztbl ON newstbl.id_raz = raztbl.id_raz LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user WHERE newstbl.id_raz = 4 ORDER BY newstbl.id_news DESC LIMIT 1");
$kol=mysql_num_rows($qur);if($qur&&$kol){while($rez = mysql_fetch_assoc($qur)){
mkdir($_SERVER["DOCUMENT_ROOT"]."/films/".$rez["title_cat"]."/".$rez["id_news"]."/",0777,true);
$text='<?php include($_SERVER["DOCUMENT_ROOT"]."/include/films.php");
echo "<div class=\"WidthMain\"><div class=\"MainSide\">";
include($_SERVER["DOCUMENT_ROOT"]."/include/right-side.php");
function declOfNum($number,$titles) {
	$cases = array (2, 0, 1, 1, 1, 2);
	return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$global_time="";$time=time();$fdate='.$rez["full_date"].';
$tm=date("H:i",$fdate);$y=date("Y",$fdate);$d=date("d",$fdate);$m=date("m",$fdate);$i_fdate=date("d.m.Y H:i",$fdate);
$last=round(($time - $fdate)/60);$decl=declOfNum($last, array("минуту","минуты","минут"));
if($last<60)$global_time="$decl назад";
elseif($i_fdate==date("d.m.Y",$time))$global_time="Сегодня, $tm";
elseif($i_fdate==date("d.m.Y",strtotime("-1 day")))$global_time="Вчера, $tm";
elseif($y==date("d.m.Y",$time))$global_time="$tm $d/$m";
else $global_time="$i_fdate";
$qur=mysql_query("SELECT col FROM newstbl WHERE id_news='.$rez["id_news"].'");$kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
$setchik=$rez["col"]+1;$update_setchik=mysql_query("UPDATE newstbl SET col=\"$setchik\" WHERE id_news='.$rez["id_news"].'");}}
echo "<div class=\"Post\"><div class=\"PostHead PostDetail\"><div class=\"BigPicture\">
<img src=\"/view_half.php?id='.$rez["id_news"].'\" width=\"784\" height=\"484\" alt=\"'.$rez["title"].'\" title=\"'.$rez["title"].'\">
<div class=\"PopUpBlock\"><h3>'.$rez["title"].'</h3>'.$rez["description"].'</div>
<div class=\"AuthorPostBlock\">
<div class=\"SectionName\"><a href=\"/films/'.$rez["title_cat"].'/'.$rez["id_news"].'/\">'.$rez["title_cat"].'</a></div>
<div class=\"AuthorPost\"><a href=\"/personal/'.$rez["id_author"].'/\">'.$rez["nickname"].'</a></div>
<div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"></div></div></div></div>
<div class=\"PostText\">";
echo "'.addcslashes($text_news,'"').'</div></div>";
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-news.php"); ?>';
$fp=fopen($_SERVER["DOCUMENT_ROOT"]."/films/".$rez["title_cat"]."/".$rez["id_news"]."/index.php","w+");fwrite($fp,$text);fclose($fp);}}}}
if(isset($_POST["edit"])){
$uploaddir=$_SERVER["DOCUMENT_ROOT"].'/upload/';
$uploadfile=$uploaddir.basename($_FILES['userfile']['name']);
$img_name=basename($uploadfile);$img_half_name=basename($uploadfile);$img_half2_name=basename($uploadfile);
$img_type=$_FILES['userfile']['type'];$title=$_POST["title"];$id_cat=$_POST["id_cat"];$id_raz=4;
$description=$_POST["description"];$id_author=$rez["id_user"];
$full_date=mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
$qur=mysql_query("UPDATE newstbl SET id_cat=\"$id_cat\",id_author=\"$id_author\",id_raz=\"$id_raz\",title=\"$title\",description=\"$description\",full_date=\"$full_date\",img_name=\"$img_name\",img_half_name=\"$img_half_name\",img_half2_name=\"$img_half2_name\",img_type=\"$img_type\" WHERE id_news = ".$_POST["id_news"]."");}
if(isset($_POST["cancel"])){header('Location: /admin/forms/films/');}
if(isset($_GET["des"])){
if($_GET["des"]=="edit"){
$qur=mysql_query("SELECT * FROM newstbl WHERE id_news=".$_GET["id_news"]."");
$kol=mysql_num_rows($qur);if($qur&&$kol){$rez=mysql_fetch_assoc($qur);
echo add_edit($rez["id_news"],$rez["id_cat"],$rez["id_author"],$rez["id_raz"],$rez["title"],$rez["description"],$rez["full_date"],$rez["img_name"],$rez["img_half_name"],$rez["img_half2_name"],$rez["img_type"],$rez["col"]);
}else echo "<font color=\"red\">Ошибка запроса</font>";}
if($_GET["des"]=="add"){echo add_edit();}if($_GET["des"]=="del"){
$qur=mysql_query("SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat WHERE id_news=".$_GET["id_news"]." LIMIT 1");
$kol=mysql_num_rows($qur);if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
function removeDir($path){return is_file($path)?unlink($path):array_map('removeDir',glob($path."/*"))==rmdir($path);}
$path=$_SERVER["DOCUMENT_ROOT"]."/films/".$rez["title_cat"]."/".$_GET["id_news"]."/";
removeDir($path);}}
$qur=mysql_query("DELETE FROM newstbl WHERE id_news=".$_GET["id_news"]." LIMIT 1");
echo show();}}else echo show(); ?>
</section></div></div></div></body></html>