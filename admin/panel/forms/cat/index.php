<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
if(!isset($_SESSION['session_username'])){header('Location: /admin/panel/login/');}
?>
<!DOCTYPE html>
<html><head>
<html><head><meta http-equiv="Content-Type" content="text/html">
<meta name="title" content="Панель управления">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/admin/panel/style.css" type="text/css" >
<link rel="stylesheet" href="/admin/panel/redactor/redactor.css" />
<script src="/admin/panel/jquery-2.2.3.min.js"></script>
<script src="/admin/panel/redactor/redactor.js"></script>
<!-- Plugin -->
<script src="/admin/panel/redactor/plugins/video/video.js"></script>
<script src="/admin/panel/redactor/plugins/table/table.js"></script>
<script src="/admin/panel/redactor/plugins/fullscreen/fullscreen.js"></script>
<!-- Language -->
<script src="/admin/panel/redactor/lang/ru.js"></script>
<script>
$(function() {
	$('#redactor').redactor({
		lang: 'ru',
		plugins: ['table', 'video','fullscreen'],
		imageUpload: '/upload/',
	});
});
</script><title>Панель управления</title></head><body><nav id="primary_nav"><ul>
<li class="nav_dashboard"><a href="/admin/panel/">Главная</a></li>
<li class="nav_graphs"><a href="/admin/panel/graphs/">Графики</a></li>
<li class="nav_forms active"><a href="/admin/panel/forms/">Формы</a></li>
<li class="nav_typography"><a href="/admin/panel/rules/">Правила</a></li>
<li class="nav_uielements"><a href="/admin/panel/others">Прочее</a></li>
<li class="nav_pages"><a href="/admin/panel/pages/">Страницы</a></li></ul></nav>
<section id="main_content"><nav id="secondary_nav"><dl class="user_info">
<?php
$qur=mysql_query("SELECT * FROM usertbl WHERE username='".$_SESSION['session_username']."'");$rez=mysql_fetch_assoc($qur);$id_user=$rez["id_user"];$nickname=$rez["nickname"];
$month_arr=array('01'=>'Янв','02'=>'Фев','03'=>'Мар','04'=>'Апр','05'=>'Мая','06'=>'Июн','07'=>'Июл','08'=>'Авг','09'=>'Сен','10'=>'Окт','11'=>'Ноя','12'=>'Дек');
$date=$rez["last_login"];$t=date("H:i",$date);$Y=date("Y",$date);$d=date("d",$date);$m=date("m",$date);echo '<a href="/personal/'.$id_user.'/">';
?><dd><?php echo '<a class="welcome_user" href="/personal/'.$id_user.'/">'; ?>
Здраствуйте, <strong><?php echo $nickname; ?></strong></a>
<?php
echo '<span class="log_data">Последний вход: '.$t.' '.$d.' '.$month_arr[$m].' '.$Y.'</span>'; ?>
<a class="logout" href="/admin/panel/logout/">Выйти</a></dd></dl><h2>Главная</h2><ul>
<li><a href="/admin/panel/forms/games/">Игры</a></li>
<li><a href="/admin/panel/forms/books/">Книги</a></li>
<li><a href="/admin/panel/forms/hardware/">Железо</a></li>
<li><a href="/admin/panel/forms/films/">Фильмы</a></li>
<li><a href="/admin/panel/forms/anime/">Аниме</a></li>
<li><a href="/admin/panel/forms/cat/">Добавить каталог</a></li></ul></nav>
<div id="content_wrap"><div class="widget_title"><a href="?des=add">
<h5>Добавить категорию</h5></a></div><div class="widget_body">
<?php 
function add_edit($id_cat=0,$id_raz=0,$title_cat="",$title_raz="") {
echo '<form id="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_cat" value="'.$id_cat.'">
<table class="activity_datatable" cellpadding="8" width="100%"><tbody><tr><td>Раздел</td><td><select name="id_raz">';
if($id_raz){
$qur=mysql_query("SELECT * FROM catbl WHERE id_raz=0 ORDER BY id_cat DESC");
if(mysql_num_rows($qur) > 0){
$cats = array();
while($rez=mysql_fetch_assoc($qur)){
$cats_ID[$rez['id_cat']][] = $rez;
$cats[$rez['id_raz']][$rez['id_cat']] = $rez;}}
function build_tree($cats,$parent_id,$only_parent){
if(is_array($cats) and isset($cats[$parent_id])){
foreach($cats[$parent_id] as $rez){
if($_GET["id_raz"]==$rez['id_cat']){
$tree .= '<option value="'.$_GET["id_raz"].'.'.$rez['title_cat'].'" selected>'.$rez['title_cat'].' ['.$_GET["id_raz"].']';
} else {
$tree .= '<option value="'.$rez['id_cat'].'.'.$rez['title_cat'].'">'.$rez['title_cat'].' ['.$rez['id_cat'].']';
}
$tree .= build_tree($cats,$rez['id_cat'],true);
$tree .= '</option>';}}
else return null;
return $tree;}
echo build_tree($cats,0);
}else{
$qur=mysql_query("SELECT * FROM catbl WHERE id_raz=0 ORDER BY id_cat DESC");
if(mysql_num_rows($qur) > 0){
$cats = array();
while($rez = mysql_fetch_assoc($qur)){
$cats_ID[$rez['id_cat']][] = $rez;
$cats[$rez['id_raz']][$rez['id_cat']] = $rez;}}
function build_tree($cats,$parent_id,$only_parent){
if(is_array($cats) and isset($cats[$parent_id])){
foreach($cats[$parent_id] as $rez){
$tree .= '<option value="'.$rez['id_cat'].'.'.$rez['title_cat'].'">'.$rez['title_cat'].' ['.$rez['id_cat'].']';
$tree .= build_tree($cats,$rez['id_cat'],true);
$tree .= '</option>';}}
else return null;
return $tree;}
echo build_tree($cats,0);}
echo '</select></td></tr>
<tr><td>Название категории</td><td><input type="text" name="title_cat" value="'.$title_cat.'"></td></tr>';
if($id_cat) echo '<tr><td colspan="2" align="center">
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
$qur=mysql_query("SELECT * FROM catbl ORDER BY catbl.id_cat");
$kol=mysql_num_rows($qur);if($qur&&$kol) {
echo '<table class="activity_datatable" cellpadding="8" width="100%"><tbody><tr>
<th align="center" width="140px">ID категории</th>
<th align="center" width="140px">ID раздела</th>
<th align="center" width="360px">Заголовок раздела</th>
<th align="center" width="360px">Заголовок категории</th>
<th align="center" width="140px">Действия</th>
</tr>';
while($rez=mysql_fetch_assoc($qur)) {
$id_cat=$rez['id_cat'];
$id_raz=$rez['id_raz'];
$title_cat=$rez['title_cat'];
$title_raz=$rez['title_raz'];
echo '<tr><td>'.$id_cat.'</td><td>'.$id_raz.'</td>
<td align="center"><a href="/'.strtolower($title_raz).'/">'.$title_raz.'</a></td>
<td align="center"><a href="/'.strtolower($title_raz).'/'.$title_cat.'/">'.$title_cat.'</a></td>
<td align="center"><span class="data_actions">
<a class="tip_north" title="Edit" href="?des=edit&id_cat='.$id_cat.'&id_raz='.$id_raz.'">Ред.</a>
<a class="tip_north" title="Delete" href="?des=del&id_cat='.$id_cat.'">Удалить</a></span></td>';
} echo '</tr></tbody></table>';}}
if(isset($_POST["add"])){
$id_cat=$_POST["id_cat"];
$str=$_POST["id_raz"];
$explode=array_filter(explode(".", $str));
$id_raz=$explode[0];
$title_raz=$explode[1];
$title_cat=$_POST["title_cat"];
$qur=mysql_query("INSERT INTO catbl VALUES (0,\"$id_raz\",\"$title_cat\",\"$title_raz\")");
$qur=mysql_query("SELECT * FROM catbl ORDER BY catbl.id_cat DESC LIMIT 1");
$kol=mysql_num_rows($qur);if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
mkdir($_SERVER["DOCUMENT_ROOT"]."/".strtolower($rez["title_raz"])."/".$rez["title_cat"]."/",0777,true);
$text='Тест';
$fp=fopen($_SERVER["DOCUMENT_ROOT"]."/".strtolower($rez["title_raz"])."/".$rez["title_cat"]."/index.php","w+");fwrite($fp,$text);fclose($fp);}}
}
if(isset($_POST["edit"])){
$id_cat=$_POST["id_cat"];
$id_raz=$_POST["id_raz"];
$title_cat=$_POST["title_cat"];
$qur=mysql_query("UPDATE catbl SET id_cat=\"$id_cat\",id_raz=\"$id_raz\",title_cat=\"$title_cat\",title_raz=\"$title_raz\" WHERE id_cat = ".$_POST["id_cat"]."");
header('Location: /admin/forms/cat/');
}
if(isset($_POST["cancel"])){header('Location: /admin/forms/cat/');}
if(isset($_GET["des"])){
if($_GET["des"]=="edit"){
$qur=mysql_query("SELECT * FROM catbl WHERE id_cat=".$_GET["id_cat"]."");
$kol=mysql_num_rows($qur);if($qur&&$kol){$rez=mysql_fetch_assoc($qur);
echo add_edit($rez["id_cat"],$rez["id_raz"],$rez["title_cat"],$rez["title_raz"]);
}else echo "<font color=\"red\">Ошибка запроса</font>";}
if($_GET["des"]=="add"){echo add_edit();}if($_GET["des"]=="del"){
$qur=mysql_query("SELECT * FROM catbl WHERE id_cat=".$_GET["id_cat"]." LIMIT 1");
$kol=mysql_num_rows($qur);if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
function removeDir($path){return is_file($path)?unlink($path):array_map('removeDir',glob($path."/*"))==rmdir($path);}
$path=$_SERVER["DOCUMENT_ROOT"]."/".strtolower($rez["title_raz"])."/".$rez["title_cat"]."/";
removeDir($path);}}
$qur=mysql_query("DELETE FROM catbl WHERE id_cat=".$_GET["id_cat"]." LIMIT 1");echo show();}
}else echo show(); ?>
</section></div></div></body></html>