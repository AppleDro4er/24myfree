<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
if(!empty($_POST['email'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['password_again'])){
	if($_POST['password']==$_POST['password_again']){
	$email=strtolower($_POST['email']);
	$username=strtolower($_POST['username']);
	$password=$_POST['password'];
	$reg_time=time();
	$row_two=mysql_num_rows(mysql_query("SELECT * FROM usertbl WHERE username='".$username."'"));
	$row_one=mysql_num_rows(mysql_query("SELECT * FROM usertbl WHERE email='".$email."'"));
	if($row_one==0){
		if($row_two==0){
		$password=password_hash($password,PASSWORD_DEFAULT);
		$qur=mysql_query("INSERT INTO usertbl VALUES('0','0','0','$email','$username','$password','0','0','$reg_time','0','0','0')");
		$qur=mysql_query("SELECT id_user, username FROM usertbl WHERE username='$username'");$kol=mysql_num_rows($qur);
		if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){
mkdir($_SERVER["DOCUMENT_ROOT"]."/personal/".$rez["id_user"]."/",0777,true);
$text='<?php include_once($_SERVER["DOCUMENT_ROOT"]."/include/personal.php"); ?>
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
<img src="/img/no_profile.png" width="170" height="170" alt="">
</div>
</div>
<div class="ProfileInfo">
<?php
function declOfNum($number, $titles) {
$cases = array (2, 0, 1, 1, 1, 2);  
return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
}
$sql = "SELECT * FROM usertbl WHERE id_user='.$rez["id_user"].'";
$qur=mysql_query($sql); $kol=mysql_num_rows($qur);
if ($qur&&$kol) {
while($rez = mysql_fetch_assoc($qur)) {
$global_time = "";
$time = time();
$user_name = $rez["username"];
$reg_time = date("d.m.Y H:i",$rez["reg_time"]);
$fdate = $rez["last_login"];
$tm = date("H:i",$fdate);
$y = date("Y", $fdate);
$d = date("d", $fdate);
$m = date("m", $fdate);
$i_fdate = date("d.m.Y H:i",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<p>Псевдоним: $user_name</p>
<p>Зарегистрирован: $reg_time</p>
<p>Последний раз был: $global_time</p>
<br>Тут \"в среду\" будет много всего...";
}}
?>
</div></div>
<div class="B"></div>
</div>
<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/include/footer.php");
?>';
$fp=fopen($_SERVER["DOCUMENT_ROOT"]."/personal/".$rez["id_user"]."/index.php", "w+");
fwrite($fp,$text);
fclose($fp);
}}
if($qur){$msg_register="Вы успешно зарегистрированы!";
}else{$msg_register="Возникла непредвиденная ошибка!";}
}else{$msg_register="Это имя пользователя уже существует! Пожалуйста, попробуйте еще раз!";}
}else{$msg_register="Этот E-mail уже используется! Пожалуйста, попробуйте еще раз!";}
}else{$msg_register="Неверное подтверждение пароля.";}
}else{$msg_register="Все поля обязательны для заполнения!";}
}
?>