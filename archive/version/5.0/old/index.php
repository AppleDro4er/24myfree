<?php 
include($_SERVER["DOCUMENT_ROOT"]."/include/main.php");
?>
<div class="MainMenuSkew">
    <ul class="MainMenu">              
        <li><a href="/">Свежее</a></li>
        <li><a href="/top/">Топ</a></li>
        <li class="SelectedMM"><a href="/old/">Старое</a></li>
    </ul>
</div>
</div>
<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/old-news.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-main.php");
?>