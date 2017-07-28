<?php require_once($_SERVER["DOCUMENT_ROOT"]."/include/connection.php"); ?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="title" content="AppleDro4er">
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="/style.css" type="text/css">
<title>AppleDro4er</title></head>
<body class="Films"><div class="PromoOverlay"><a name="up"></a>
<div class="SiteSelect"><div class="MenuItem BooksSite LeftAlign">
<div class="NameItem"><div class="IcoLink"></div><a href="/books/">Книги</a></div>
<div class="RightCorner"></div></div><div class="MenuItem HardwareSite">
<div class="LeftCorner"></div>
<div class="NameItem"><div class="IcoLink"></div><a href="/hardware/">Железо</a></div>
<div class="RightCorner"></div></div>
<div class="MenuItem AnimeSite RightAlign"><div class="LeftCorner"></div>
<div class="NameItem"><div class="IcoLink"></div><a href="/anime/">Аниме</a></div></div>
<div class="MenuItem GamesSite RightSecond">
<div class="RightBackCorner"></div>
<div class="NameItem"><div class="IcoLink"></div><a href="/games/">Игры</a></div>
<div class="RightCorner"></div></div><div class="FilmsSite CenterSite">
<div class="IcoLink"></div><a href="/films/">Кино</a></div></div>
<div class="BannerBlock"><div class="WidthMain"></div></div>
<div class="WidthPage"><div class="MainMenuBlock"><div class="Logo">
<?php if(isset($_SESSION["session_username"])){
$sql = "SELECT id_user, username FROM usertbl WHERE username='".$_SESSION["session_username"]."'";
$qur = mysql_query($sql); $kol=mysql_num_rows($qur);
if($qur&&$kol){while($rez=mysql_fetch_assoc($qur)){$id_name = $rez['id_user'];
echo '<div class="LoginPersonal"><a href="/personal/'.$id_name.'/" title="Личный кабинет">Чертоги</a></div>';
}}
echo '<div class="LogoutPopUp"><a href="/logout.php" title="Выйти">Выйти</a></div>
<div class="LogoImg"><a href="//24myfree.ru/"><img src="/img/logo_m.svg" alt="Logo" height="270px" width="270px"></a></div>';
}else{
echo '<div class="LoginPersonal"><a href="/login/?do=register">Регистрация</a></div>
<div class="LoginPopUp"><a href="/login/?do=auth">Вход</a></div>
<div class="LogoImg"><a href="//24myfree.ru/"><img src="/img/logo_m.svg" alt="Logo" height="270px" width="270px"></a></div>';}
?>
</div></div>