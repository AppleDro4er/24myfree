<div class='WidthMain'><div class='MainPage'>
<script type="text/javascript">
$(document).ready(function(){
  if ($("#sizen").text() <= 1 ) {
    $(".MoreMain").hide();
  }
  var next_page = 1;
  var totall_page = $("#sizen").text()*1;
  $(document).scroll(function(){
	if($(window).scrollTop()+$(window).height()>=$(document).height()){
    if (next_page < totall_page) {
      next_page++;
      $('.MoreMain').hide();
      $('.MainPage').append('<div class="LoaderAjaxLife"><img src="/img/loader.gif" width="30" height="30" alt="Img" /></div>');
      // «теневой» запрос к серверу
      $.ajax({
        type: "POST",
        url: '/version/5.0/index_ajax.php?page='+next_page,
        data: { FROM: '', SORT: 'new'},
        success:function (data){
          //добавляем полученные данные
          //в конец контейнера
          $('.MainPage .LoaderAjaxLife').remove();
		  //$('.MainPage').remove();
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
		};
	});
});
</script>
<?php
function declOfNum($number, $titles) {  
	$cases = array (2, 0, 1, 1, 1, 2);  
    return $number.' '.$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
	}
function news() {
$sql = 'SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN raztbl ON newstbl.id_raz = raztbl.id_raz LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user ORDER BY newstbl.id_news DESC LIMIT 6';
$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
if($qur&&$kol) {
while ($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
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
echo "<div class='PostHead' style='z-index:$kol'><a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img alt='$title' src='/view.php?id=$id_news' height='640' width='1036'></a><div class='PopUpBlock'><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div style='display: none;' class='PopUpText'>$description</div></div><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
$kol--;
if($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
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
echo "<div class='PostHead' style='z-index:$kol'><a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img alt='$title' src='/view.php?id=$id_news' height='640' width='1036'></a><div class='PopUpBlock'><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div style='display: none;' class='PopUpText'>$description</div></div><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
$kol--;
}

while ($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
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
echo "<div class='GameListWrap' style='z-index:$kol;'>";
$kol=$kol-2;
echo "<div class='GameList'><a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img alt='$title' src='/view_half2.php?id=$id_news' height='360' width='518'></a><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";

if($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
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
echo "<div class='GameList'><a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img alt='$title' src='/view_half2.php?id=$id_news' height='360' width='518'></a><h3><div class='PostLogo ".$title_raz."Site'><div class='IcoLink'></div></div><a href=\"/$title_lower_raz/$cat_title/$id_news/\"> $title</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/$title_lower_raz/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href='/personal/$id_author'>$name_author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
}echo "</div>";}}}}echo news();
?>
</div>