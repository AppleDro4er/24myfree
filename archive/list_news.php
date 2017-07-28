<!DOCTYPE html>
<?php session_start();require_once("include/connection.php");if(isset($_POST["login"])){if(!empty($_POST['username'])&&!empty($_POST['password'])){$username=$_POST['username'];$password=$_POST['password'];$query=mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");$numrows=mysql_num_rows($query);if($numrows!=0){while($row=mysql_fetch_assoc($query)){$dbusername=$row['username'];$dbpassword=$row['password'];}if($username == $dbusername && $password == $dbpassword) {$_SESSION['session_username']=$username;}} else { $message1 = "Неправильное имя пользователя или пароль!"; }} else {	$message1 = "Все поля обязательны для заполнения!";	}}
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
function add_edit($id=0,$title="",$text_t="",$short_d="",$id_cat="") {
	echo "<form style=\"margin:75px;\" method=\"POST\" ENCTYPE=\"multipart/form-data\"><input type=\"hidden\" name=\"id\" value=\"$id\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\"><tr><td>Категория</td><td><select name=\"id_cat\">";
	$sql = "SELECT * FROM catbl";
	$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
	if ($qur&&$kol) {
	while($rez = mysql_fetch_assoc($qur)) {
		echo "<option value=\"".$rez["id_cat"]."\">".$rez["title_cat"]."</option>";
	}}
	echo "</select></td></tr><tr><td><b>Заголовок:</b></td><td><input type=\"text\" name=\"title\" style=\"width:100%\" value=\"$title\"></td></tr><tr><td colspan=\"2\"><b>Текст новости:</b></td></tr><tr><td colspan=\"2\"><textarea name=\"text_t\" style=\"width:100%;height:200px;\">$text_t</textarea></td></tr><tr><td colspan=\"2\"><textarea name=\"short_d\" style=\"width:100%;height:28px;\">$short_d</textarea></td></tr><tr><td><input name=\"userfile\" type=\"file\" /></td></tr>";
	if($id) echo "<tr><td colspan=\"2\" align=\"center\"><input style=\"margin:15px;\" type=\"submit\" name=\"edit\" value=\"Редактировать\"></td></tr></table></form></form>";
	else echo "<tr><td colspan=\"2\" align=\"center\"><input style=\"margin:15px;\" type=\"submit\" name=\"add\" value=\"Добавить\"></td></tr></table>";
}

function declOfNum($number, $titles) {  
    $cases = array (2, 0, 1, 1, 1, 2);  
    return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
	}
function show() {
	$sql = "SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat ORDER BY newstbl.id DESC";
	$qur = mysql_query($sql);
	if ($qur) {
		$kol = mysql_num_rows($qur);
		if ($kol) {
			echo "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"95%\" style=\"margin:15px 0 0 0;\"><tr><td colspan=\"4\" align=\"right\"><b><a href=\"?des=add\">Добавить новость</a></b></td></tr><tr><td align=\"center\"><b>Заголовок</b></td><td align=\"center\"><b>Дата</b></td><td align=\"center\"><b>Действия</b></td><td align=\"center\"><b>Категория</b></td></tr>";
			while($rez = mysql_fetch_assoc($qur)) {
				echo "<tr>";
				echo "<td>".$rez["title"]."</td>";
				$time = time();
				$fdate = $rez["full_date"];
				$tm = date("H:i",$fdate);
				$y = date("Y", $fdate);
				$d = date("d", $fdate);
				$m = date("m", $fdate);
				$i_fdate = date("d.m.Y",$fdate);
				$last = round(($time - $fdate)/60);
				$decl = declOfNum($last, array('минуту', 'минуты', 'минут'));
				if($last < 60) echo "<td>$decl назад</td>";
				elseif($i_fdate == date('d.m.Y',$time)) echo "<td>Сегодня, $tm</td>";
				elseif($i_fdate == date('d.m.Y', strtotime('-1 day'))) echo "<td>Вчера, $tm</td>";
				elseif($y == date('d.m.Y',$time)) echo "<td>$tm $d/$m</td>";
				else echo "<td>$i_fdate</td>";
				echo "<td align=\"right\"><a href=\"?des=edit&id=".$rez["id"]."\">РЕД.</a> | <a href=\"?des=del&id=".$rez["id"]."\">УДАЛИТЬ.</a></td>";
				echo "<td>".$rez["title_cat"]."</td></tr>";
			}
			echo "</table>";
		} else echo "<div align=\"right\">Не удается получить список новостей<br><b><a href=\"?des=add\">Добавить новость</a></b></div>"; 
	} else echo "<font color=\"green\">Ошибка запроса</font>";
}

if(isset($_POST["add"])) {
	$uploaddir = 'upload/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	$name = basename($uploadfile);
	$original_name = basename($_FILES['userfile']['name']);
	$type = $_FILES['userfile']['type'];
	$title_t = $_POST["title"];
	$text_t = $_POST["text_t"];	
	$id_cat = $_POST["id_cat"];
	$short_d = $_POST["short_d"];
	$author = $_SESSION["session_username"];
	$full_date = mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		$sql = "INSERT INTO newstbl VALUES (0, \"$id_cat\",\"$title_t\",\"$text_t\",\"$short_d\",\"$full_date\",\"$author\",\"$name\",\"$original_name\",\"$type\")";
		$qur = mysql_query($sql);
		$sql = "SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat ORDER BY newstbl.id DESC";
		$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
		if ($qur&&$kol) {
			while($rez = mysql_fetch_assoc($qur)) {
			$cat_title = $rez["title_cat"];
			$id_id = $rez["id"];
			mkdir("games/" .$cat_title . "/" .$id_id. "/", 0700, true);
			$text = "";
			$filestart = fopen("games/" .$cat_title. "/" .$id_id. "/index.html", "a+");
			fwrite($fp, $text);
			$text = "$text_t";
			$fp = fopen("games/" .$cat_title. "/" .$id_id. "/index.html", "w+");
			fwrite($fp, $text);
			fclose($fp);
			}
		}
	}
}
if(isset($_POST["edit"])) {
	$uploaddir = 'upload/';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
	$name = basename($uploadfile);
	$original_name = basename($_FILES['userfile']['name']);
	$type = $_FILES['userfile']['type'];
	$title_t = mysql_real_escape_string(htmlspecialchars($_POST["title"]));
	$text_t = mysql_real_escape_string(htmlspecialchars($_POST["text_t"]));
	$short_d = mysql_real_escape_string(htmlspecialchars($_POST["short_d"]));
	$author = $_SESSION["session_username"];
	$full_date = mktime(date("H"),date("i"),0,date("m"),date("d"),date("Y"));
	$sql = "UPDATE newstbl SET title=\"$title_t\",text_t=\"$text_t\",short_d=\"$short_d\",full_date=\"$full_date\", author=\"$author\", img_name=\"$name\", img_original_name=\"$original_name\", img_type=\"$type\" WHERE id = ".$_POST["id"]."";
	$qur = mysql_query($sql);
}
if(isset($_GET["des"])) {
	if($_GET["des"] == "edit"){
		$sql = "SELECT * FROM newstbl WHERE id=".$_GET["id"]."";
		$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
		if($qur && $kol) {
			$rez = mysql_fetch_assoc($qur);
			echo add_edit($rez["id"],stripslashes($rez["title"]),stripslashes($rez["text_t"]));
		}
		else echo "<font color=\"red\">Ошибка запроса</font>";
	}
	if($_GET["des"] == "add") {
		echo add_edit();
	}
	if($_GET["des"] == "del") {
		$sql = "DELETE FROM newstbl WHERE id = ".$_GET["id"]." LIMIT 1";
		$qur = mysql_query($sql);
		echo show();
	}
} else echo show();
?>
</div>
<div class="B"></div>
</div>	
</div>
</body>
</html>