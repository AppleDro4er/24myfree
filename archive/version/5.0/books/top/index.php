<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/books.php");
?>
<div class="MainMenuSkew">
    <ul class="MainMenu">              
        <li><a href="/books/">Свежее</a></li>
        <li class="SelectedMM"><a href="/books/top/">Топ</a></li>
        <li><a href="/books/old/">Старое</a></li>
    </ul>
</div>
</div>
<?php
include($_SERVER["DOCUMENT_ROOT"]."/include/top-books-news.php");
include($_SERVER["DOCUMENT_ROOT"]."/include/footer-books.php");
?>