<div class="RightSide">
	<div class="RightBannerBlock" id="bx_651765591_148">
    <noindex>
      <a href="" target="_blank" rel="nofollow">
      <img alt="Дешево. Сердито. Гоу Тру" title="Дешево. Сердито. Гоу Тру" src="/img/gotrue.jpg" width="240" height="400">
      </a>
    </noindex>
  </div>
<?php
	$sql = "SELECT * FROM newstbl LEFT JOIN catbl ON newstbl.id_cat = catbl.id_cat LEFT JOIN raztbl ON newstbl.id_raz = raztbl.id_raz LEFT JOIN usertbl ON newstbl.id_author = usertbl.id_user ORDER BY RAND() LIMIT 6";
	$qur = mysql_query($sql);
	if ($qur) {
		$kol = mysql_num_rows($qur);
		if ($kol) {
			while($rez = mysql_fetch_assoc($qur)) {
			$id_news = $rez['id_news'];
			$id_author = $rez['id_author'];
			$title = $rez['title'];
			$description = $rez['description'];
			$fdate = $rez['full_date'];
			$cat_title = $rez['title_cat'];
			$title_raz = $rez["title_raz"];
			$name_author = $rez["nickname"];
			$title_lower_raz = strtolower($title_raz);
			$global_time = "";
			$time = time();
			$fdate = $rez['full_date'];
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
			echo "<div class='RightNews' id='$id_news'>
			<a href=\"/$title_lower_raz/$cat_title/$id_news/\"><img src='/view_half2.php?id=$id_news' width='518' height='360' alt=\"$title\"></a>
			<div class='NameRN'><a href=\"/$title_lower_raz/$cat_title/$id_news/\">$title</a></div>
			<div class='DatePost'>$global_time</div>
			<div class='AuthorRN'><a href='/personal/$id_author'>$name_author</a></div>
			</div>";
			}
		}
	}
?>
</div>
	