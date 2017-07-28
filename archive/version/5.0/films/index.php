<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/films.php");
?>
<div class="MainMenuSkew">
    <ul class="MainMenu">              
        <li class="SelectedMM"><a href="/films/">Свежее</a></li>
        <li><a href="/films/top/">Топ</a></li>
        <li><a href="/films/old/">Старое</a></li>
    </ul>
</div>
</div>
<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/films-news.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-films.php");
?>