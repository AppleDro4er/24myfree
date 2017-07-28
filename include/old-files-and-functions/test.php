<?php ob_start(); ?>
<!DOCTYPE html>
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php");
if(isset($_POST["login"])){require_once($_SERVER["DOCUMENT_ROOT"]."/include/login.php");}
if(isset($_POST["register"])){require_once($_SERVER["DOCUMENT_ROOT"]."/include/register.php");}
?>
<html>

<body class="Main"><div class="PromoOverlay"><a name="up"></a>
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
if (!empty($msg_login)){echo '<div class="ErrorAuth"><p><font class="errortext">'.$msg_login.'</font></p></div>';}
echo '<form name="loginform" id="loginform" method="post" target="_top">
<div class="PoleLF"><div class="LoginInput"></div><input name="username" id="username" placeholder="логин" type="text"></div>
<div class="PoleLF LodtPass"><div class="PassInput"></div><input name="password" id="password" placeholder="пароль" type="password"><noindex>забыли?</noindex></div>
<div class="LoginButton"><input name="login" value="Войти" type="submit"><div class="LoginSubmit"></div></div>
</form></div><div id="reg">';
if (!empty($msg_register)){echo '<div class="ErrorAuth"><p><font class="errortext">'.$msg_register.'</font></p></div>';}
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