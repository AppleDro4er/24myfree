<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
if(isset($_SESSION['session_username'])){header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html">
<meta name="title" content="Панель управления">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/admin/panel/style.css" type="text/css">
<title>Панель управления</title>
</head>
<body>
<nav id="primary_nav">
<ul>
<li class="nav_dashboard active"><a href="/admin/panel/">Главная</a></li>
<li class="nav_graphs"><a href="/admin/panel/graphs/">Графики</a></li>
<li class="nav_forms"><a href="/admin/panel/forms/">Формы</a></li>
<li class="nav_typography"><a href="/admin/panel/rules/">Правила</a></li>
<li class="nav_uielements"><a href="/admin/panel/others/">Прочее</a></li>
<li class="nav_pages"><a href="/admin/panel/pages/">Страницы</a></li>
</ul>
</nav>
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
<div id="content_wrap"><div class="widget_title"><h5>Виджет</h5></div>
<table class="activity_datatable" cellpadding="8" width="100%"><tbody><tr>
<th align="center" width="40px">ID</th>
<th align="center" width="360px">Заголовок</th>
<th align="center" width="140px">Дата</th>
<th align="center" width="180px">Категория</th>
<th align="center" width="100px">Действия</th>
<th align="center" width="90px">Просмотров</th></tr>
<?php 
function declOfNum($number, $titles){
$cases = array (2, 0, 1, 1, 1, 2);
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];
}
$qur=mysql_query("SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user ORDER BY newstbl.id_news DESC");
$kol=mysql_num_rows($qur);if($kol&&$qur){
while($rez = mysql_fetch_assoc($qur)){
$global_time = "";
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
echo '<tr><td align="center">'.$id_news.'</td>
<td align="center"><a href="'.$title_lower_raz.'/'.$cat_title.'/'.$id_news.'/">'.$title.'</a></td>
<td align="center">'.$global_time.'</td>
<td align="center"><span class="green_highlight pj_cat">'.$cat_title.'</span></td>
<td align="center"><span class="data_actions">
<a class="tip_north" title="User" href="profiles/'.$id_author.'">Автор</a>
<a class="tip_north" title="Edit" href="?des=edit&id_news='.$id_news.'">Ред.</a>
<a class="tip_north" title="Delete" href="?des=del&id_news='.$id_news.'">Удалить</a></span></td>
<td align="center">'.$col.'</td></tr>';
}}
?>
</tbody></table></div></section></body></html>