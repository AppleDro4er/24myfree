<?php ob_start(); ?>
<!DOCTYPE html>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
if(isset($_POST["login"])){
	if(!empty($_POST['username'])&&!empty($_POST['password'])){
		$username=strtolower($_POST['username']);
		$password=$_POST['password'];
		$qur=mysql_query("SELECT username, password FROM usertbl WHERE username='".$username."' AND password='".$password."'");
		$row=mysql_num_rows($qur);
		if($row!=0){
			while($rez=mysql_fetch_assoc($qur)){
				$dbusername=$rez['username'];
				$dbpassword=$rez['password'];}
			if($username == $dbusername && $password == $dbpassword){
				$_SESSION['session_username']=$username;
				$full_date = mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
				$query=mysql_query("UPDATE usertbl SET last_login=\"$full_date\" WHERE username='".$username."'");}
		}else{
			$message1 = "Неправильное имя пользователя или пароль!";}
	}else{
		$message1 = "Все поля обязательны для заполнения!";}}
if(isset($_POST["register"])) {
	if(!empty($_POST['email'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['password_again'])){
		if($_POST['password']==$_POST['password_again']) {
		$email=strtolower($_POST['email']);
		$username=strtolower($_POST['username']);
		$password=$_POST['password'];
		$reg_time = mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
		$qur=mysql_query("SELECT * FROM usertbl WHERE username='".$username."'");
		$row=mysql_num_rows($qur);
		if($row==0) {
			$sql="INSERT INTO usertbl VALUES('0', '0', '0','$email', '$username', '$password', '0', '0', '$reg_time', '0')";
			$qur=mysql_query($sql);
			$sql="SELECT id_user, username FROM usertbl WHERE username='$username'";
			$qur=mysql_query($sql); $kol=mysql_num_rows($qur);
			if ($qur&&$kol) {
				while($rez = mysql_fetch_assoc($qur)) {
					mkdir($_SERVER["DOCUMENT_ROOT"]."/personal/".$rez["id_user"]."/", 0777, true);
					$text = '<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/include/personal.php");
?>
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
$sql = "SELECT * FROM usertbl WHERE id='.$rez["id_user"].'";
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
					$fp = fopen($_SERVER["DOCUMENT_ROOT"]."/personal/".$rez["id_user"]."/index.php", "w+");
					fwrite($fp, $text);
					fclose($fp);
				}
			}
			if($qur){
				$message2 = "Вы успешно зарегистрированы!";
			}else{
				$message2 = "Возникла непредвиденная ошибка!";}
		}else{
			$message2 = "Это имя пользователя уже существует! Пожалуйста, попробуйте еще раз!";}
	}else{
		$message2 = "Неверное подтверждение пароля.";}
	}else{
		$message2 = "Все поля обязательны для заполнения!";}}
?>
<html><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="robots" content="index, follow">
<meta property="og:title" content="AppleDro4er - весело о играх, фильмах, комиксах, книгах, аниме и кино">
<meta name="title" content="AppleDro4er - весело о играх, фильмах, комиксах, книгах, аниме и кино">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="/style.css" type="text/css" >
<link rel="stylesheet" href="/fonts/css.css" type="text/css">
<!--[if lte IE 7]>
      <li nk href="/css/ie7_fix.css" rel="stylesheet" type="text/css" />
    <![endif]-->
<!--[if IE]>
      <sc ript type="text/javascript" src="/js/html5.js"></sc ript>
      <li nk href="/css/ie_fix.css" rel="stylesheet" type="text/css" />
    <![endif]-->
<meta name="keywords" content="тыдыщ, tydysh, tydyshtv, тыдыщтв, тыдыщ.тв, tydysh.tv, игры онлайн, компьютерные игры, рпг, игра, мморпг, mmorpg, онлайн игры бесплатно, бесплатные игры онлайн, rpg, играть в онлайн игры, браузерные онлайн игры, флеш игры бесплатно, онлайн игра, консоли xbox, ps 3, pc, игра, геймеры, плохие игры, тупая игра, раки, днина, безумие, диградируем, скрестим струи, быков, ща победим">
<meta property="og:keywords" content="тыдыщ, tydysh, tydyshtv, тыдыщтв, тыдыщ.тв, tydysh.tv, игры онлайн, компьютерные игры, рпг, игра, мморпг, mmorpg, онлайн игры бесплатно, бесплатные игры онлайн, rpg, играть в онлайн игры, браузерные онлайн игры, флеш игры бесплатно, онлайн игра, консоли xbox, ps 3, pc, игра, геймеры, плохие игры, тупая игра, раки, днина, безумие, диградируем, скрестим струи, быков, ща победим">
<meta name="description" content="Удивительный мир невероятных штук, о которых ты даже мечтать не мог! Но тут, вдруг как в скаааазке скрипнула дверь! Брызнула кровь! Умерли все! Но воскресли и расскажут тебе обо всём том, что творится там! В выдуманных мирах... Почти каждый из которых, хоть немножко, но лучше этого =3 И не важно Кино это, Игры, Аниме или Книги.">
<meta property="og:description" content="Удивительный мир невероятных штук, о которых ты даже мечтать не мог! Но тут, вдруг как в скаааазке скрипнула дверь! Брызнула кровь! Умерли все! Но воскресли и расскажут тебе обо всём том, что творится там! В выдуманных мирах... Почти каждый из которых, хоть немножко, но лучше этого =3 И не важно Кино это, Игры, Аниме или Книги.">
<title>AppleDro4er - весело о играх, фильмах, комиксах, книгах, аниме и кино</title></head>
<body class="Main"><div class="PromoOverlay"><a name="up"></a><div class="BottomPanel"><noindex>
<div style="width: 689px;" class="BottomButtons">
<a rel="nofollow" target="_blank" title="Наши сервера" href="#" class="IconsBP OurServers"></a>
<a rel="nofollow" target="_blank" title="ЧАВО?! Часто Задаваемые Вопросы." href="#" class="IconsBP FaqBP"></a>
<a rel="nofollow" target="_blank" title="TheTydysh TV" href="#" class="IconsBP YoutubeBP"></a>
<a rel="nofollow" target="_blank" title="TydyshTVLive" href="#" class="IconsBP LiveBP"></a>
<a rel="nofollow" target="_blank" title="Twitch" href="#" class="IconsBP TwitchBP"></a>
<a href="#up" title="Наверх" class="IconsBP UpBP"></a>
<a rel="nofollow" target="_blank" title="RSS" href="#" class="IconsBP RssBP"></a>
<a rel="nofollow" target="_blank" title="Группа в Вконтакте" href="#" class="IconsBP VkBP"></a>
<a rel="nofollow" target="_blank" title="Группа в Steam" href="#" class="IconsBP SteamBP"></a>
<a rel="nofollow" target="_blank" title="Наш TeamSpeak" href="#" class="IconsBP TsBP"></a>
</div></noindex></div>
<div class="SiteSelect"><div class="MenuItem HardwareSite LeftAlign">
<div class="NameItem"><div class="IcoLink"></div><a href="/hardware/">Железо</a></div>
<div class="RightCorner"></div></div><div class="MenuItem FilmsSite">
<div class="LeftCorner"></div>
<div class="NameItem"><div class="IcoLink"></div><a href="/films/">Кино</a></div>
<div class="RightCorner"></div></div>
<div class="MenuItem BooksSite RightAlign"><div class="LeftCorner"></div>
<div class="NameItem"><div class="IcoLink"></div><a href="/books/">Книги</a></div></div>
<div class="MenuItem AnimeSite RightSecond">
<div class="RightBackCorner"></div>
<div class="NameItem"><div class="IcoLink"></div><a href="/anime/">Аниме</a></div>
<div class="RightCorner"></div></div><div class="GamesSite CenterSite">
<div class="IcoLink"></div><a href="/games/">Игры</a></div></div>
<?php include_once($_SERVER["DOCUMENT_ROOT"]."/include/header.php"); ?>
<div class="WidthPage"><div class="MainMenuBlock"><div class="Logo">
<?php if(isset($_SESSION["session_username"])){
$sql = "SELECT id_user, username FROM usertbl WHERE username='".$_SESSION["session_username"]."'";
$qur = mysql_query($sql); $kol=mysql_num_rows($qur);
if($qur&&$kol) {
	while($rez = mysql_fetch_assoc($qur)){
		$id_name = $rez['id_user'];
		echo '<div class="LoginPersonal"><a href="/personal/'.$id_name.'/" title="Личный кабинет">Чертоги</a></div>';
	}
}
echo '<div class="LoginPopUp"><a href="/logout.php" title="Выйти">ИЗЫДИ</a></div><div class="LogoImg">
<img style="display: inline;" src="/img/logo_m.png" alt="Logo" height="206px" width="206px">
<img style="display: none;" class="LogoSkew" src="/img/logo_m_skew.png" alt="Logo" height="206px" width="206px"></div>';
}else{
echo '<div class="LoginPopUp" id="login_main">Вход</div>
<div class="LoginForm"><ul>	<li class="SelectLogin"><div class="LoginSkew">Вход</div></li>
<li>Регистрация</li></ul><div id="login">';
if (!empty($message1)){echo '<div class="ErrorAuth"><p><font class="errortext">'.$message1.'</font></p></div>';}
echo '<form name="loginform" id="loginform" method="post" target="_top">
<div class="PoleLF"><div class="LoginInput"></div><input name="username" id="username" placeholder="логин" type="text"></div>
<div class="PoleLF LodtPass"><div class="PassInput"></div><input name="password" id="password" placeholder="пароль" type="password"><noindex>забыли?</noindex></div>
<div class="LoginButton"><input name="login" value="Войти" type="submit"><div class="LoginSubmit"></div></div>
</form></div><div id="reg">';
if (!empty($message2)){echo '<div class="ErrorAuth"><p><font class="errortext">'.$message2.'</font></p></div>';}
echo '<form class="FormValidation" method="post" name="registerform" id="registerform">
<div class="PoleLF"><div class="LoginInput"></div><input name="username" id="username" placeholder="логин" type="text"></div>
<div class="PoleLF"><div class="MailInput"></div><input name="email" id="email" placeholder="почта" type="text"></div>
<div class="PoleLF"><div class="PassInput"></div><input name="password_again" id="password" placeholder="пароль" type="password"></div>
<div class="PoleLF"><div class="PassInput"></div><input name="password" id="password" placeholder="пароль повторно" type="password"></div>
<div class="LoginButton"><input name="register" id="register" value="Зарегистрироваться" type="submit"><div class="LoginInput"></div></div>
</form></div></div><div class="LogoImg"><img style="display: inline;" src="/img/logo_m.png" alt="Logo" height="206px" width="206px">
<img style="display: none;" class="LogoSkew" src="/img/logo_m_skew.png" alt="Logo" height="206px" width="206px"></div>';}
?>
</div></div>