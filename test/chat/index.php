<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="title" content="Главная страница сайта">
</head>
<body>
<?php 
require_once 'simple_html_dom.php'; //подключили библиотеку

$curl_handle=curl_init();
curl_setopt($curl_handle, CURLOPT_URL,'https://www.coinexchange.io/chat/undocked/');
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Google Chrome');
$query = curl_exec($curl_handle);
curl_close($curl_handle);

echo $query;
echo "<br>Filter:<br />";

/*
$pattern = "/DNR/";
$replacement = "<p style=\"display: inline;color:red;\">DNR</p>";
echo preg_replace($pattern, $replacement, $string);
*/
$string = var_export($query, true);
$explode = explode("<div id=chat-line>",$string);

$array = array(string($explode));
foreach($array as $k=>$v) {
		echo $v;
}

?>
</body>
</html>