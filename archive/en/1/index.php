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
<script type="text/javascript">
$(document).ready(function(){
  if ($("#sizen").text() <= 1 ) {
    $(".MoreMain").hide();
  }
  var next_page = 1;
  var totall_page = $("#sizen").text()*1;
  $('.MoreMain').on('click', ' a', function() {
    if (next_page < totall_page) {
      next_page++;
      $('.MoreMain').hide();
      $('.MainPage').append('<div class="LoaderAjaxLife"><img src="/img/loader.gif" width="30" height="30" alt="Img" /></div>');
      // «теневой» запрос к серверу
      $.ajax({
        type:"POST",
        url: '/index_ajax.php?PAGEN_1='+next_page,
        data: { FROM: 'games', SORT: 'new' },
        success:function (data){
          //добавляем полученные данные
          //в конец контейнера
          $('.MainPage .LoaderAjaxLife').remove();
          $('.MainPage').append(data);
          if (next_page >= totall_page) {
            $('.MoreMain').hide();
          } else {
            $('.MoreMain').show();
          }
        }
      }); 
      } else {
        $('.MoreMain').hide();
      }
    return false;
    });
});
</script>
<?php
function declOfNum($number, $titles) {  
	/*
	* Получить правильную форму числа для количества элементов.     
	* @param integer $number - количество
	* @param array $wordsForms массив с 3-мя элементами, например такой: array('0'=>'Запись','1'=>'Записи','2'=>'Записей')
	* Элементы в нем - это формы слова для количеств соответствуенно 1, 2 и 5 
	* @return string возвращает правильную форму слова. Например, для входного числа 1021 вернет "Запись", для 12 вернет "Записей", для 652 вернет "Записи"
	*/
    $cases = array (2, 0, 1, 1, 1, 2);  
    return $number." ".$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
	}

function news() {
$sql = "SELECT * FROM newstbl ORDER BY id DESC";
$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
if($qur&&$kol) {
while ($rez = mysql_fetch_assoc($qur)) {
//$row = $row + mysql_num_rows($qur) / mysql_num_rows($qur); 
// Подсчет количества новостей со счетчиком
$global_time = "";
$time = time();
$id_id = $rez["id"];
$author = $rez["author"];
$title_t = $rez["title"];
$short_d = $rez["short_d"];
$fdate = $rez["full_date"];
$tm = date("H:i",$fdate);
$y = date("Y", $fdate);
$d = date("d", $fdate);
$m = date("m", $fdate);
$i_fdate = date("d.m.Y",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array('минуту', 'минуты', 'минут'));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date('d.m.Y',$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date('d.m.Y', strtotime('-1 day'))) $global_time = "Вчера, $tm";
elseif($y == date('d.m.Y',$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class=\"PostHead\" style=\"z-index:$id_id\"><a href=\"\"><img alt=\"$title_t\" src=\"/view.php?id=$id_id\" height=\"640\" width=\"1036\"></a><div class=\"PopUpBlock\"><h3><a href=\"ссылка\">$title_t</a></h3><div style=\"display: none;\" class=\"PopUpText\">$short_d</div></div><div class=\"AuthorPostBlock\"><div class=\"SectionName\"><a href=\"/games/batman_arkham_knight/\">Каталог игры</a></div><div class=\"AuthorPost\"><a href=\"/personal/7/\">$author</a></div><div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"><div class=\"Views\">Кол-во виюверов</div></div></div></div>";

if ($rez = mysql_fetch_assoc($qur)) {
$global_time = "";
$time = time();
$id_id = $rez["id"];
$author = $rez["author"];
$title_t = $rez["title"];
$fdate = $rez["full_date"];
$tm = date("H:i",$fdate);
$y = date("Y", $fdate);
$d = date("d", $fdate);
$m = date("m", $fdate);
$i_fdate = date("d.m.Y",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array('минуту', 'минуты', 'минут'));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date('d.m.Y',$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date('d.m.Y', strtotime('-1 day'))) $global_time = "Вчера, $tm";
elseif($y == date('d.m.Y',$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class=\"GameListWrap\" style=\"z-index:$id_id;\">";
echo "<div class=\"GameList\"><a href=\"\"><img alt=\"$title_t\" src=\"/view.php?id=$id_id\" height=\"360\" width=\"518\"></a><h3><a href=\"ссылка\">$title_t</a></h3><div class=\"AuthorPostBlock\"><div class=\"SectionName\"><a href=\"/games/the_elder_scrolls/\">Каталог игры</a></div><div class=\"AuthorPost\"><a href=\"/personal/16/\">$author</a></div><div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"><div class=\"Views\">Кол-во виюверов</div></div></div></div>";

if($rez = mysql_fetch_assoc($qur)) {
$global_time = "";
$time = time();
$id_id = $rez["id"];
$author = $rez["author"];
$title_t = $rez["title"];
$fdate = $rez["full_date"];
$tm = date("H:i",$fdate);
$y = date("Y", $fdate);
$d = date("d", $fdate);
$m = date("m", $fdate);
$i_fdate = date("d.m.Y",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array('минуту', 'минуты', 'минут'));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date('d.m.Y',$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date('d.m.Y', strtotime('-1 day'))) $global_time = "Вчера, $tm";
elseif($y == date('d.m.Y',$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class=\"GameList\"><a href=\"\"><img alt=\"$title_t\" src=\"/view.php?id=$id_id\" height=\"360\" width=\"518\"></a><h3><a href=\"ссылка\">$title_t</a></h3><div class=\"AuthorPostBlock\"><div class=\"SectionName\"><a href=\"/games/the_elder_scrolls/\">Каталог игры</a></div><div class=\"AuthorPost\"><a href=\"/personal/16/\">$author</a></div><div class=\"DatePost\">$global_time</div><div class=\"IcoBlock\"><div class=\"Views\">Кол-во виюверов</div></div></div></div>";
}
echo "</div>";
}
}
}
}
echo news();
?>
</div>
<div id="sizen">48</div>
<div class="MoreMain"><a href="#">Еще</a></div>
<div class="B"></div>
</div>	
</div>
</body>
</html>