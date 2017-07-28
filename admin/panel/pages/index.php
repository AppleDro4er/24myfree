<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
if(!isset($_SESSION['session_username'])){
header('Location: /admin/login/');
}
ob_start(); ?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html">
<meta name="title" content="Панель управления">
<link rel="icon" href="/admin/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/admin/style.css" type="text/css">
<title>Панель управления</title></head><body><nav id="primary_nav"><ul>
<li class="nav_dashboard"><a href="/admin/">Главная</a></li>
<li class="nav_graphs"><a href="/admin/graphs/">Графики</a></li>
<li class="nav_forms"><a href="/admin/forms/">Формы</a></li>
<li class="nav_typography"><a href="/admin/rules/">Правила</a></li>
<li class="nav_uielements"><a href="/admin/others">Прочее</a></li>
<li class="nav_pages active"><a href="/admin/pages/">Страницы</a></li></ul></nav>
<section id="main_content"><nav id="secondary_nav"><dl class="user_info">
<?php
$qur=mysql_query("SELECT * FROM usertbl WHERE username='".$_SESSION['session_username']."'");
$kol=mysql_num_rows($qur);$rez = mysql_fetch_assoc($qur);$id_user=$rez["id_user"];$nickname=$rez["nickname"];
$month_arr = array('01'=>'Янв','02'=>'Фев','03'=>'Мар','04'=>'Апр','05'=>'Мая','06'=>'Июн','07'=>'Июл','08'=>'Авг','09'=>'Сен','10'=>'Окт','11'=>'Ноя','12'=>'Дек');
$date = $rez["last_login"];$t = date("H:i",$date);
$Y = date("Y", $date);$d = date("d", $date);$m = date("m", $date);
echo "<a href=/personal/$id_user/>";?><dd>
<?php echo "<a class=\"welcome_user\" href=\"/personal/$id_user/\">"; ?>
Здраствуйте, <strong><?php echo $nickname; ?></strong></a>
<?php echo "<span class='log_data'>Последний вход: $t $d $month_arr[$m] $Y</span>"; ?>
<a class="logout" href="/admin/logout/">Выйти</a></dd></dl><h2>Главная</h2><ul>
<li><a href="/admin/profiles/">Пользователи</a></li>
<li><a href="/admin/tools/">Инструменты</a></li>
<li><a href="/admin/other/">Прочее</a></li>
<li><a href="/admin/logs/">Лог-файлы</a></li></ul></nav>
<div id="content_wrap">
<div class="one_wrap">
В разработке
</section></div></body></html>