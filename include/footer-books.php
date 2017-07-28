<div class="B"></div>
<div id="sizen">
<?php $sql=mysql_query("SELECT * FROM newstbl WHERE newstbl.id_raz=2");$numrows=mysql_num_rows($sql);
if($numrows<=6){$num_pages=1;}
elseif($numrows%6==0){$num_pages=$numrows/6;}
else{$num_pages=$numrows/6+1;}
echo round($num_pages,0);
?></div>
<div class="MoreMain"><a href="#">Еще</a></div>
<div class="B"></div>
</div></div></div>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-60501568-4', 'auto');
ga('send', 'pageview');
</script>
<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter35301530 = new Ya.Metrika({ id:35301530, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/35301530" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
<script type="text/javascript" src="/js/main.js"></script>
</body>
</html>