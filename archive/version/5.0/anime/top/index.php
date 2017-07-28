<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/anime.php");
?>
<div class="MainMenuSkew">
    <ul class="MainMenu">              
        <li><a href="/anime/">Свежее</a></li>
        <li class="SelectedMM"><a href="/anime/top/">Топ</a></li>
        <li><a href="/anime/old/">Старое</a></li>
    </ul>
</div>
</div>
<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/top-anime-news.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-anime.php");
?>