<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
if(isset($_SESSION['session_username'])){header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");}
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html">
<meta name="title" content="Панель управления">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/admin/panel/style.css" type="text/css">
<title>Панель управления</title></head><body><nav id="primary_nav"><ul>
<li class="nav_dashboard active"><a href="/admin/panel/">Главная</a></li>
<li class="nav_graphs"><a href="/admin/panel/graphs/">Графики</a></li>
<li class="nav_forms"><a href="/admin/panel/forms/">Формы</a></li>
<li class="nav_typography"><a href="/admin/panel/rules/">Правила</a></li>
<li class="nav_uielements"><a href="/admin/panel/others">Прочее</a></li>
<li class="nav_pages"><a href="/admin/panel/pages/">Страницы</a></li></ul></nav>
<section id="main_content">
<nav id="secondary_nav">
<dl class="user_info">
<?php
$qur=mysql_query("SELECT * FROM usertbl WHERE username='".$_SESSION['session_username']."'");
$kol=mysql_num_rows($qur);$rez = mysql_fetch_assoc($qur);$id_user=$rez["id_user"];$username=$rez["username"];
$month_arr=array('01'=>'Янв','02'=>'Фев','03'=>'Мар','04'=>'Апр','05'=>'Мая','06'=>'Июн','07'=>'Июл','08'=>'Авг','09'=>'Сен','10'=>'Окт','11'=>'Ноя','12'=>'Дек');
$date=$rez["last_login"];$t = date("H:i",$date);$Y=date("Y", $date);$d = date("d", $date);$m = date("m", $date);
echo '<a href=/admin/panel/'.$id_user.'/><dd><a class="welcome_user" href="/admin/panel/'.$id_user.'/">Здраствуйте, <strong>'.$username.'</strong></a>';
echo "<span class='log_data'>Последний вход: $t $d $month_arr[$m] $Y</span>";
?>
<a class="logout" href="/admin/panel/logout.php">Выйти</a>
</dd>
</dl>
<h2>Главная</h2>
<ul>
<li><a href="/admin/panel/profiles/">Пользователи</a></li>
<li><a href="/admin/panel/tools/">Инструменты</a></li>
<li><a href="/admin/panel/other/">Прочее</a></li>
<li><a href="/admin/panel/logs/">Лог-файлы</a></li>
</ul>
</nav>
<div id="content_wrap"><div class="widget_title"><h5>Список пользователей</h5></div>
<table class="activity_datatable" cellpadding="8" width="100%"><tbody><tr>
<th align="center">Ник</th><th align="center">Логин</th>
<th align="center" width="140px">Группа пользователей</th>
<th align="center" width="150px">Дата рождения</th>
<th align="center" width="150px">Дата регистрации</th>
<th align="center" width="200px">Статус</th>
<th align="center" width="100px">Действия</th></tr>
<?php 
function declOfNum($number, $titles) {
$cases = array (2, 0, 1, 1, 1, 2);
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$qur=mysql_query("SELECT * FROM usertbl LEFT JOIN grouptbl ON usertbl.id_group = grouptbl.id_group ORDER BY usertbl.id_user DESC");
$kol=mysql_num_rows($qur);if($qur&&$kol){
while ($rez=mysql_fetch_assoc($qur)){
$month_arr=array('01'=>'Января','02'=>'Февраля','03'=>'Марта','04'=>'Апреля','05'=>'Мая','06'=>'Июня','07'=>'Июля','08'=>'Августа','09'=>'Сентября','10'=>'Октября','11'=>'Ноября','12'=>'Декабря');
$day_arr=array('01'=>'1','02'=>'2','03'=>'3','04'=>'4','05'=>'5','06'=>'6','07'=>'7','08'=>'8','09'=>'9');
$date = $rez["birthday"];
$Y = date("Y", $date);
$d = date("d", $date);
$m = date("m", $date);
echo '<tr>
<td align="center">'.$rez["nickname"].'</td>
<td align="center">'.$rez["username"].'</td>
<td align="center">'.$rez["name_group"].'</td>';
if($d < 10){echo '<td align="center">'.$day_arr[$d];}else{echo '<td align="center">'.$d;}
echo ' '.$month_arr[$m].' '.$Y.'</td>';
$date = $rez["reg_time"];
$Y = date("Y", $date);
$d = date("d", $date);
$m = date("m", $date);
if($d < 10){echo '<td align="center">'.$day_arr[$d];}else{echo '<td align="center">'.$d;}
echo ' '.$month_arr[$m].' '.$Y.'</td><td align="center">';
if($rez["last_login"] <= $rez["last_logout"]) {
echo 'Был в сети: ';
$date = $rez["last_login"];
$t = date("H:i",$date);
$Y = date("Y", $date);
$d = date("d", $date);
$m = date("m", $date);
$dmY = date("d.m.Y",$date);
$last = round((time() - $date)/60);
$decl = declOfNum($last, array('минуту', 'минуты', 'минут'));
if($last < 60) echo "$decl назад";
elseif($dmY == date('d.m.Y',time())) echo "Сегодня в $t";
elseif($dmY == date('d.m.Y', strtotime('-1 day'))) echo "Вчера в $t";
elseif($Y == date('d.m.Y',time())) echo "$t $d/$m";
else echo "$dmY";echo '</td>';
}else{echo "ONLINE";}
echo '<td align="center"><span class="data_actions">
<a class="tip_north" title="User" href="/personal/'.$rez['id_user'].'">Автор</a>
<a class="tip_north" title="Edit" href="?des=edit&_user='.$rez['id_user'].'">Ред.</a>
<a class="tip_north" title="Delete" href="?des=del&_user='.$rez['id_user'].'">Удалить</a></span></td></tr>';
}}
?>
</tbody></table></div></section></body></html>