<!DOCTYPE html>
<?php session_start();require_once("../include/connection.php");if(isset($_POST["login"])){if(!empty($_POST['username'])&&!empty($_POST['password'])){$username=$_POST['username'];$password=$_POST['password'];$query=mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");$numrows=mysql_num_rows($query);if($numrows!=0){while($row=mysql_fetch_assoc($query)){$dbusername=$row['username'];$dbpassword=$row['password'];}if($username == $dbusername && $password == $dbpassword) {$_SESSION['session_username']=$username;}} else { $message1 = "Неправильное имя пользователя или пароль!"; }} else {	$message1 = "Все поля обязательны для заполнения!";	}}

if(isset($_POST["register"])) {
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
		$full_name=$_POST['full_name'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
	
		$query=mysql_query("SELECT * FROM usertbl WHERE username='".$username."'");
		$numrows=mysql_num_rows($query);
	
		if($numrows==0) {
			$sql="INSERT INTO usertbl
			(full_name, email, username,password) 
			VALUES('$full_name','$email', '$username', '$password')";
		$result=mysql_query($sql);
		
			if($result) {
				$message = "Вы успешно зарегистрированы!";
			} else {
				$message2 = "Возникла непредвиденная ошибка!";
			}

		} else {
			$message2 = "Это имя пользователя уже существует! Пожалуйста, попробуйте еще раз!";
		}
		
	} else {
		$message2 = "Все поля обязательны для заполнения!";
	}
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="title" content="Главная страница сайта">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&amp;subset=cyrillic-ext,vietnamese,latin-ext,latin,cyrillic" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/main.js"></script>
	<link href="/style.css" type="text/css" rel="stylesheet">
	<title>Главная страница сайта</title>
</head>
<body class="Games">
<div class="PromoOverlay">
	<a name="up"></a>
	<div class="BottomPanel">
		<noindex>
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
        </div>
		</noindex>
    </div>
	<div class="SiteSelect">
        <div class="MenuItem HardwareSite LeftAlign">
			<div class="NameItem"><div class="IcoLink"></div><a href="/hardware/">Железо</a></div>
        <div class="RightCorner"></div>
        </div>
        <div class="MenuItem FilmsSite">
			<div class="LeftCorner"></div>              
            <div class="NameItem"><div class="IcoLink"></div><a href="/films/">Кино</a></div>
            <div class="RightCorner"></div>
        </div>
        <div class="MenuItem BooksSite RightAlign">
            <div class="LeftCorner"></div>
            <div class="NameItem"><div class="IcoLink"></div><a href="/books/">Книги</a></div>
        </div>
        <div class="MenuItem AnimeSite RightSecond">
            <div class="RightBackCorner"></div>
            <div class="NameItem"><div class="IcoLink"></div><a href="/anime/">Аниме</a></div>
            <div class="RightCorner"></div>
        </div>
        <div class="GamesSite CenterSite">
            <div class="IcoLink"></div><a href="/games/">Игры</a>
        </div>
    </div>
	<div class="BannerBlock">
		<div class="WidthMain">
		<div class="B"></div>
		</div>
	</div>
<div class="WidthPage">
	<div class="MainMenuBlock">
		<div class="Logo">
		
<?php if(isset($_SESSION["session_username"])) {
		echo "<div class=\"LoginPersonal\"><a href=\"/personal/\" title=\"Личный кабинет\">" . "Чертоги" . "</a></div><div class=\"LoginPopUp\"><a href=\"logout.php\" title=\"Выйти\">" . "ИЗЫДИ" . "</div></a><div class=\"LogoImg\"><img style=\"display: inline;\" src=\"/img/logo.png\" alt=\"Logo\" height=\"206\" width=\"206\"><img style=\"display: none;\" class=\"LogoSkew\" src=\"/img/logo_skew.png\" alt=\"Logo\" height=\"206\" width=\"206\"></div>";
} else {
		echo "<div class=\"LoginPopUp\" id=\"login_main\">" . "Вход" . "</div><div class=\"LoginForm\"><ul><li class=\"SelectLogin\"><div class=\"LoginSkew\">" . "Вход" . "</div></li><li>" . "Регистрация" . "</li></ul><div id=\"login\">"?><?php if (!empty($message1)) {echo "<div class=\"ErrorAuth\"><p><font class=\"errortext\">" . $message1 . "</font></p></div>";}?><?php echo "<form name=\"loginform\" id=\"loginform\" method=\"post\" target=\"_top\"><div class=\"PoleLF\"><div class=\"LoginInput\"></div><input name=\"username\" id=\"username\" placeholder=\"логин\" type=\"text\"></div><div class=\"PoleLF LodtPass\"><div class=\"PassInput\"></div><input name=\"password\" id=\"password\" placeholder=\"пароль\" type=\"password\"><noindex>" . "забыли?" . "</noindex></div><div class=\"LoginButton\"><input name=\"login\" value=\"Войти\" type=\"submit\"><div class=\"LoginSubmit\"></div></div></form></div><div id=\"reg\">"?><?php if (!empty($message2)) {echo "<div class=\"ErrorAuth\"><p><font class=\"errortext\">" . $message2 . "</font></p></div>";}?><?php echo "<form class=\"FormValidation\" method=\"post\" name=\"registerform\" id=\"registerform\"><div class=\"PoleLF\"><div class=\"LoginInput\"></div><input name=\"username\" id=\"username\" placeholder=\"логин\" type=\"text\"></div><div class=\"PoleLF\"><div class=\"MailInput\"></div><input name=\"email\" id=\"email\" placeholder=\"почта\" type=\"text\"></div><div class=\"PoleLF\"><div class=\"PassInput\"></div><input name=\"full_name\" id=\"full_name\" placeholder=\"пароль\" type=\"text\"></div><div class=\"PoleLF\"><div class=\"PassInput\"></div><input name=\"password\" id=\"password\" placeholder=\"пароль повторно\" type=\"password\"></div><div class=\"LoginButton\"><input name=\"register\" id=\"register\" value=\"Зарегистрироваться\" type=\"submit\"><div class=\"LoginInput\"></div></div></form></div></div><div class=\"LogoImg\"><img style=\"display: inline;\" src=\"/img/logo.png\" alt=\"Logo\" height=\"206\" width=\"206\"><img style=\"display: none;\" class=\"LogoSkew\" src=\"/img/logo_skew.png\" alt=\"Logo\" height=\"206\" width=\"206\"></div>";
}?>
<!--action=\"register.php\" -->
</div>

</div>
<div class="MainMenuSkew">
    <ul class="MainMenu">              
        <li class="SelectedMM"><a href="/games/new/">Свежее</a></li>
        <li><a href="/games/top/">Топ</a></li>
        <li><a href="/games/best/">Лучшее</a></li>
    </ul>
</div>
</div>
<div class="WidthMain"><div class="MainPage">
<?php

function add_edit($id=0,$cat=""){
	echo "<form style=\"margin:75px;\" method=\"POST\"><input type=\"hidden\" name=\"id\" value=\"$id\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\"><tr><td><b>Заголовок:</b></td><td><input type=\"text\" name=\"cat_t\" style=\"width:100%\" value=\"$cat\"></td></tr>";
	if($id) echo "<tr><td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"edit\" value=\"Редактировать\"></td></tr></table></form>";
	else echo "<tr><td colspan=\"2\" align=\"center\"><input type=\"submit\" name=\"add\" value=\"Добавить\"></td></tr></table></form>";
}

function show() {
	$sql = "SELECT * FROM catbl ORDER BY id DESC";
	$qur = mysql_query($sql);
	if ($qur) {
		$kol = mysql_num_rows($qur);
		if ($kol) {
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" style=\"margin:15px 0 0 0;\"><tr><td colspan=\"3\" align=\"right\"><b><a href=\"?des=add\">Добавить категорию</a></b></td></tr><tr><td width=\"55%\" align=\"center\"><b>Заголовок</b></td><td width=\"20%\" align=\"center\"><b>Действия</b></td></tr>";
			while($rez = mysql_fetch_assoc($qur)) {
				echo "<tr>";
				echo "<td>".$rez["cat_t"]."</td>";
				echo "<td align=\"right\"><a href=\"?des=edit&id=".$rez["id"]."\">РЕД.</a> | <a href=\"?des=del&id=".$rez["id"]."\">УДАЛИТЬ.</a></td></tr>";
			}
			echo "</table>";
		}
	}
}

if(isset($_POST["add"])) {
	$cat = mysql_real_escape_string(htmlspecialchars($_POST["cat_t"]));
	$sql = "INSERT INTO catbl VALUES (0, \"$cat\")";
	$qur = mysql_query($sql);
}		
if(isset($_POST["edit"])) {
	$cat = mysql_real_escape_string(htmlspecialchars($_POST["cat_t"]));
	$sql = "UPDATE catbl SET cat_t=\"$cat\" WHERE id = ".$_POST["id"]."";
	$qur = mysql_query($sql);
}

if(isset($_GET["des"])) {
	if($_GET["des"] == "edit"){
		$sql = "SELECT * FROM catbl WHERE id=".$_GET["id"]."";
		$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
		if($qur && $kol) {
			$rez = mysql_fetch_assoc($qur);
			echo add_edit($rez["id"],stripslashes($rez["cat_t"]));
		}
		else echo "<font color=\"red\">Ошибка запроса</font>";
	}
	if($_GET["des"] == "add"){
		echo add_edit();
	}
	if($_GET["des"] == "del"){
		$sql = "DELETE FROM catbl WHERE id = ".$_GET["id"]." LIMIT 1";
		$qur = mysql_query($sql);
		echo show();
	}
}else echo show();
?>
</div>
<div class="B"></div>
</div>	
</div>
</body>
</html>