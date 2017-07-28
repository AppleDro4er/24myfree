<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/games.php");
?>
<div class="MainMenuSkew">
    <ul class="MainMenu">              
        <li class="SelectedMM"><a href="/games/">Свежее</a></li>
        <li><a href="/games/top/">Топ</a></li>
        <li><a href="/games/old/">Старое</a></li>
    </ul>
</div>
</div>
<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/games-news.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-games.php");
?>