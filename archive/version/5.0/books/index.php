<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/books.php");
?>
<div class="MainMenuSkew">
    <ul class="MainMenu">              
        <li class="SelectedMM"><a href="/books/">Свежее</a></li>
        <li><a href="/books/top/">Топ</a></li>
        <li><a href="/books/old/">Старое</a></li>
    </ul>
</div>
</div>
<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/books-news.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-books.php");
?>