!СТАРАЯ ФОРМА!
<!--<div class='WidthMain'><div class='MainPage'>
<script type='text/javascript'>
$(document).ready(function(){
  if ($('#sizen').text() <= 1 ) {
    $('.MoreMain').hide();
  }
  var next_page = 1;
  var totall_page = $('#sizen').text()*1;
  $('.MoreMain').on('click', ' a', function() {
    if (next_page < totall_page) {
      next_page++;
      $('.MoreMain').hide();
      $('.MainPage').append("<div class='LoaderAjaxLife'><img src='/img/loader.gif' width='30' height='30' alt='Img' /></div>");
      // «теневой» запрос к серверу
      $.ajax({
        type:'POST',
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
	/*function declOfNum($number, $titles) {  
 Получить правильную форму числа для количества элементов.     
	* @param integer $number - количество
	* @param array $wordsForms массив с 3-мя элементами, например такой: array('0'=>'Запись','1'=>'Записи','2'=>'Записей')
	* Элементы в нем - это формы слова для количеств соответствуенно 1, 2 и 5 
	* @return string возвращает правильную форму слова. Например, для входного числа 1021 вернет 'Запись', для 12 вернет 'Записей', для 652 вернет 'Записи'
    $cases = array (2, 0, 1, 1, 1, 2);  
    return $number.' '.$titles[ ($number%100 > 4 && $number %100 < 20) ? 2 : $cases[min($number%10, 5)] ];  
	}
function news() {
$sql = 'SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat ORDER BY newstbl.id DESC';
$qur = mysql_query($sql); $kol = mysql_num_rows($qur);
if($qur&&$kol) {
while ($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
$col = $rez['col'];
$time = time();
$id_id = $rez['id'];
$author = $rez['author'];
$title_t = $rez['title'];
$short_d = $rez['short_d'];
$fdate = $rez['full_date'];
$cat_title = $rez['title_cat'];
$tm = date('H:i',$fdate);
$y = date('Y', $fdate);
$d = date('d', $fdate);
$m = date('m', $fdate);
$i_fdate = date("d.m.Y",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class='PostHead' style='z-index:$kol'><a href=\"/games/$cat_title/$id_id/\"><img alt='$title_t' src='/view.php?id=$id_id' height='640' width='1036'></a><div class='PopUpBlock'><h3><a href=\"/games/$cat_title/$id_id/\">$title_t</a></h3><div style='display: none;' class='PopUpText'>$short_d</div></div><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/games/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href=''>$author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
$kol--;
if ($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
$col = $rez['col'];
$time = time();
$id_id = $rez['id'];
$author = $rez['author'];
$title_t = $rez['title'];
$fdate = $rez['full_date'];
$cat_title = $rez['title_cat'];
$tm = date('H:i',$fdate);
$y = date('Y', $fdate);
$d = date('d', $fdate);
$m = date('m', $fdate);
$i_fdate = date("d.m.Y",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class='GameListWrap' style='z-index:$kol;'>";
$kol=$kol-2;
echo "<div class='GameList'><a href=\"/games/$cat_title/$id_id/\"><img alt='$title_t' src='/view.php?id=$id_id' height='360' width='518'></a><h3><a href=\"/games/$cat_title/$id_id/\">$title_t</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/games/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href=''>$author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
}
if($rez = mysql_fetch_assoc($qur)) {
$global_time = '';
$col = $rez['col'];
$time = time();
$id_id = $rez['id'];
$author = $rez['author'];
$title_t = $rez['title'];
$fdate = $rez['full_date'];
$cat_title = $rez['title_cat'];
$tm = date('H:i',$fdate);
$y = date('Y', $fdate);
$d = date('d', $fdate);
$m = date('m', $fdate);
$i_fdate = date("d.m.Y",$fdate);
$last = round(($time - $fdate)/60);
$decl = declOfNum($last, array("минуту", "минуты", "минут"));
if($last < 60) $global_time = "$decl назад";
elseif($i_fdate == date("d.m.Y",$time)) $global_time = "Сегодня, $tm";
elseif($i_fdate == date("d.m.Y", strtotime("-1 day"))) $global_time = "Вчера, $tm";
elseif($y == date("d.m.Y",$time)) $global_time = "$tm $d/$m";
else $global_time = "$i_fdate";
echo "<div class='GameList'><a href=\"/games/$cat_title/$id_id/\"><img alt='$title_t' src='/view.php?id=$id_id' height='360' width='518'></a><h3><a href=\"/games/$cat_title/$id_id/\">$title_t</a></h3><div class='AuthorPostBlock'><div class='SectionName'><a href=\"/games/$cat_title/\">$cat_title</a></div><div class='AuthorPost'><a href=''>$author</a></div><div class='DatePost'>$global_time</div><div class='IcoBlock'><div class='Views'>$col</div></div></div></div>";
echo "</div>";
}
}}}
echo news();
?>
</div>