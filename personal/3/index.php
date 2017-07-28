<?php include_once($_SERVER["DOCUMENT_ROOT"]."/include/personal.php"); ?>
<div class="MainMenuSkew">
<ul class="MainMenu">
<li class="SelectedMM"><a href="/">Свежее</a></li>
<li><a href="/top/">Топ</a></li>
<li><a href="/old/">Старое</a></li>
</ul>
</div>
</div>
<div class="WidthMain"><div class="UserProfile">
<div class="ProfilePhoto">
<div class="ProfileImg">
<div class="ProfileImgOverlay"></div>
<?php
function show(){
function declOfNum($number, $titles) {
$cases=array (2, 0, 1, 1, 1, 2);  
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
}
$sql="SELECT * FROM usertbl WHERE id_user=3";
$qur=mysql_query($sql); $kol=mysql_num_rows($qur);
if ($qur&&$kol) {
while($rez=mysql_fetch_assoc($qur)) {
$global_time="";
$time=time();
$user_name=$rez["username"];
$first_name=$rez["first_name"];
$last_name=$rez["last_name"];
$sex=$rez['sex'];
$reg_time=date("d.m.Y H:i",$rez["reg_time"]);
$birthday=date("d.m.Y",$rez['birthday']);
$fdate=$rez["last_login"];
$tm=date("H:i",$fdate);
$y=date("Y", $fdate);
$d=date("d", $fdate);
$m=date("m", $fdate);
$i_fdate=date("d.m.Y H:i",$fdate);
$last=round(($time - $fdate)/60);
$decl=declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time="$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time="Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time="Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time="$tm $d/$m";
else $global_time="$i_fdate";
echo '<svg width="170" height="170">
<image clip-path="url(#clip-cirlce)" class="svg-image" alt="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="';
if($rez['photo']=="0") echo '/img/no_profile.png'; else echo $rez['photo'];
echo '" width="170" height="170"></image>
<defs>
<clipPath id="clip-cirlce">
<circle r="85" cx="85" cy="85" fill="orangered" stroke="crimson" stroke-width="5" />
</clipPath>
</defs>
</svg>
</div>
</div>
<div class="ProfileInfo">
<div class="gender"><p>Псевдоним: '.$user_name.'</p><img src="';
if($sex=="2"){echo 'male.svg" alt="Мужчина"';}
if($sex=="1"){echo 'female.svg" alt="Женщина"';}
echo ' width="15" height="15"></div>
<p>Имя: '.$first_name.'</p>
<p>Фамилия: '.$last_name.'</p>
<p>День рождения: '.$birthday.'</p>
<p>Зарегистрирован: '.$reg_time.'</p>
<p>Последний раз был: '.$global_time.'</p>
<br>Тут "в среду" будет много всего...';
if(strtolower($_SESSION['session_username'])==strtolower($user_name)){
	echo '<p><a href="?des=edit">Редактировать данные</a></p>';
}
}}
}
if(isset($_GET['des'])){
if($_GET['des']=="edit"){
$qur=mysql_query("SELECT * FROM usertbl WHERE id_user=3");
if($qur&&$kol){
while($rez=mysql_fetch_assoc($qur)) {
echo '
<input name="userfile" type="file" value="'.$img_name.'">

<svg width="170" height="170">
<image clip-path="url(#clip-cirlce)" class="svg-image" alt="" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="';
if($rez['photo']=="0") echo '/img/no_profile.png'; else echo $rez['photo'];
echo '" width="170" height="170"></image>
<defs>
<clipPath id="clip-cirlce">
<circle r="85" cx="85" cy="85" fill="orangered" stroke="crimson" stroke-width="5" />
</clipPath>
</defs>
</svg>
<span>Choose a file&hellip;</span>

</div>
</div>
<div class="ProfileInfo">
<form method="post">
<table class="activity_datatable" cellpadding="8" width="100%">
<tbody>
<tr>
<th>E-mail</th>
<td>'.$rez["email"].'</td>
</tr>
<tr>
<th>Имя</th>
<td><input type="text" name="first_name" value="'.$rez["first_name"].'"></td>
</tr>
<tr>
<th>Фамилия</th>
<td><input type="text" name="last_name" value="'.$rez["last_name"].'">
</td>
</tr>
<tr>
<th>Пол</th>
<td>
<input type="radio" name="gender" value="male"';
if($rez['sex']=="2"){echo "checked";}
echo '>Male
<input type="radio" name="gender" value="female"';
if($rez['sex']=="1"){echo "checked";}
echo '>Female</td>
</tr>
<tr>
<th>День рождения</th>
<td><input id="date" type="text" name="birthday" value="'.date("d.m.Y",$rez['birthday']).'"></td>
</tr>
<tr>
<th colspan="2"><footer><button class="redactor-modal-btn redactor-modal-action-btn" style="width: 50%;" name="add">Сохранить</button></footer></th>
</tr>
</tbody>
</table>
</form>';
if(isset($_POST["add"])){
//if($_POST["userfile"]!==$rez["photo"]){
//	$photo=$_POST["userfile"];
	$uploaddir=$_SERVER["DOCUMENT_ROOT"].'/avatar/';
	$uploadfile=$uploaddir.basename($_FILES['userfile']['name']);
	$img_name=basename($uploadfile);
	$img_type=$_FILES['userfile']['type'];

	if(move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile)){
		$qur=mysql_query("UPDATE usertbl SET photo='".$img_name."' WHERE id_user=3");
	}

if($_POST["first_name"]!==$rez["first_name"]){
	$first_name=$_POST["first_name"];
	$qur=mysql_query("UPDATE usertbl SET first_name='$first_name' WHERE id_user=3");
}
if($_POST["last_name"]!==$rez["last_name"]){
	$last_name=$_POST["last_name"];
	$qur=mysql_query("UPDATE usertbl SET last_name='$last_name' WHERE id_user=3");
}
if($_POST["gender"]=="male"){
	$qur=mysql_query("UPDATE usertbl SET sex='2' WHERE id_user=3");
}
if($_POST["gender"]=="female"){
	$qur=mysql_query("UPDATE usertbl SET sex='1' WHERE id_user=3");
}
if($_POST["birthday"]!==$rez["birthday"]){
	$birthday=strtotime($_POST["birthday"]);
	$qur=mysql_query("UPDATE usertbl SET birthday='$birthday' WHERE id_user=3");
}
echo '<meta http-equiv="refresh" content="0; url=http://appledro4er.pw/personal/3/">';
}
}}
}
}else {echo show();}
?>
</div></div>
<div class="B"></div>
</div>
<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/include/footer.php");
?>