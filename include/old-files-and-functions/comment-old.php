<script type="text/javascript">
    $(document).ready(function(){
      $('body').on('click', '.CommetsSort a', function() {
        $('#axajComments').html('');
        $('#axajComments').append('<div class="LoaderAjaxLife"><img src="/img/loader.gif" width="30" height="30" alt="Img" /></div>');
        // «теневой» запрос к серверу
        $.ajax({
          type:"POST",
          url: '/comments_'+$(this).attr("id")+'.php',
          data: { ELEMENT_ID: '2210' },
          success:function (data){
            //добавляем полученные данные
            //в конец контейнера
            $('.CommentsBlock').html('');
            $('.CommentsBlock').append(data);
          }
        }); 
        return false;
      });
    });
    </script>
	
<div class="CommentsBlock">
      <script type="text/javascript">
 $(document).ready(function() {
  
  $('.ComMessage').each(function() {
    $(this).width($(this).width()-$(this).parent('.Comment').find('.DepthLevel').length*30);
  });
	$('#new_comment_form').submit(function() {
		if($('#TEXT').val() == '') {
			alert('Вы не ввели комментарий');	
			return false;
		} else {
			$(this).find("button[type=submit]").attr("disabled","disabled");
			return true;
		}
	});
  $('body').on('click', '#CancelReply', function() {
    $('.ReplyBlock').hide();
    $(".leave_comment_link").show();
  });

  $('.Comment').hover(
    function() {
      $(this).find('.ComReplyBlock').css('visibility','visible');
    }, function() {
      $(this).find('.ComReplyBlock').css('visibility','hidden');
    }
  );

});
function scrollToComment(comment_id) {
  $('html,body').animate({scrollTop: $('#comment_'+comment_id).offset().top}, 200); 
}

function ReplyToComment(id, scroll) {
  if ($("#comment_"+id).find('input[name="depth"]').val() < 5) {
    $(".leave_comment_link").hide();
    $(".answer_link").show();
    $("#comment_"+id).append($(".ReplyBlock").show());
    $(".ReplyBlock input[name=PARENT_ID]").val(id);
    $(".ReplyText").width($("#comment_"+id+' .ComMessage').width());
    $(".ReplyText textarea").width($(".ReplyText").width()-22);
    if (scroll) {
     $('html,body').animate({scrollTop: $('.ReplyBlock').offset().top}, 100); 
    }
  }
}
</script>

<div class="CommetsSort">
  <a href="#" id="asc">Сначала старые</a>
  <a class="CommetsBySelect" href="#" id="desc">Сначала новые</a>
  <a href="#" id="rating">По рейтингу</a>
</div>
<div id="axajComments">

    <div id="comment_0" class="NewComment">
    <div class="ComMessage" style="width: 643px;">
      <input type="hidden" name="depth" value="0">
      <a href="javascript:ReplyToComment(0, false);" class="leave_comment_link" style="display: inline;">Добавить комментарий</a>
    </div>
  <div class="ReplyBlock" style="display: none;">
    <form method="post" action="" id="new_comment_form"> 
            <input type="hidden" name="PARENT_ID" value="0"><br>
      <div class="ComIco">
        <a href="/personal/1056/">
                        <img src="/img/no_profile_smal.png" width="70" height="70" alt="No profile id1399">
						</a>
      </div>
      <div class="ReplyText" style="width: 643px;"><textarea rows="3" name="TEXT" id="TEXT" style="width: 621px;"></textarea></div>
      <div class="B"></div>
      <div class="ComReply">
        <input type="submit" name="submit" value="Комментировать">
      </div>
      <a id="CancelReply">Закрыть</a>
    </form>
  </div></div>
      
  
    <noindex>      
              <div id="bx_941796797_2213">

      <div class="Comment" id="comment_2213">
        <input type="hidden" name="depth" value="0">
              <div class="ComIco">
          <a href="/personal/486/">
           
              <img src="/upload/resize_cache/main/930/70_70_2/930028ac7a6ebb6a45a250c18c1339d2.png" width="70" height="70" alt="aidan_cousland">
                                </a>
        </div>
        <div class="ComMessage" style="width: 643px;">
          <div class="ComSys">
            <a href="/personal/486/">aidan_cousland</a>
            <a href="/games/fallout/2210/#comment_2213" class="ComDate">вчера, 22:42</a>
          </div>
            <div class="ComText">Как у гуля очки не падают?</div>
                          <div class="ComReplyBlock" style="visibility: visible;">
                                <link href="/bitrix/js/main/core/css/core_popup.css?143446451528664" type="text/css" rel="stylesheet">
<script type="text/javascript" src="/bitrix/js/main/core/core_popup.js?143446451539406"></script>
<span class="ilike"><span class="bx-ilike-button " id="bx-ilike-button-IBLOCK_ELEMENT-2213-1454881012"><span class="bx-ilike-left-wrap "><span class="bx-ilike-left"></span><span class="bx-ilike-text">Нравится</span></span><span class="bx-ilike-right-wrap"><span class="bx-ilike-right">0</span></span></span><span class="bx-ilike-wrap-block" id="bx-ilike-popup-cont-IBLOCK_ELEMENT-2213-1454881012" style="display:none;"><span class="bx-ilike-popup"><span class="bx-ilike-wait"></span></span></span></span>
<script type="text/javascript">
BX.ready(function() {	
		if (!window.RatingLike && top.RatingLike)
			RatingLike = top.RatingLike;
		RatingLike.Set(
			'IBLOCK_ELEMENT-2213-1454881012',
			'IBLOCK_ELEMENT',
			'2213',
			'Y',
			'1399',
			{'LIKE_Y' : 'Не нравится', 'LIKE_N' : 'Нравится', 'LIKE_D' : 'Это нравится'},
			'standart',
			'/auth/'
		);

		if (typeof(RatingLikePullInit) == 'undefined')
		{
			RatingLikePullInit = true;
			BX.addCustomEvent("onPullEvent-main", function(command,params) {
				if (command == 'rating_vote')
				{
					RatingLike.LiveUpdate(params);
				}
			});
		}
});	
</script>
                                                <div class="ComReply" id="reply_to_2213">
                  <a href="javascript:ReplyToComment(2213, false);" class="answer_link">Ответить</a>
                </div>
                              </div>
                    </div>
      </div>
      </div>
      <!-- ФОРМА ДОБАВЛЕНИЯ КОММЕНТАРИЯ -->
</noindex>
</div>
</div>