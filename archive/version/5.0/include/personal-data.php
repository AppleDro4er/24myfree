<div class="WidthMain">
<?php if(isset($_SESSION["session_username"])){
echo '<div class="PersonalProfile">
  <div class="LeftProfile">    
    <div class="ItemLP">
      <span class="Lk"></span>
      <br>Чертоги
    </div>
  </div>
  <div class="MainProfileWrap">
    <form method="post" name="form1" action="/personal/" enctype="multipart/form-data">
      <div class="MainProfile">
        <input type="hidden" name="lang" value="s1">
        <input type="hidden" name="ID" value="1399">
        <div class="ProfilePhoto">
                      <div class="ProfileImg">
              <img src="/img/no_profile.png" width="167" height="168" alt="NoPhotoProfile">
            </div>
            <div class="ProfileImgLoad">
              <label title="Удалить изображение">
                <div class="ProfileImgLoadIcon"></div>
                <div class="ProfileImgLoadText">Загрузить аватар</div>
                <input name="PERSONAL_PHOTO" class="typefile" onchange="this.previousSibling.previousSibling.innerHTML = "Аватар выбран"" size="20" type="file">
              </label>
            </div>
                  </div>
        <div class="ProfileInfo">
          <div class="ProfileBlock">
            <div class="ProfilePole">
              <div class="LoginInputBlack"></div>
              <input type="text" name="LOGIN" maxlength="50" placeholder="Логин (мин. 3 символа)" value="TopGar">
            </div>
            <div class="ProfilePole">
              <div class="MailInputBlack"></div>
              <input type="text" name="EMAIL" maxlength="50" placeholder="E-Mail" value="pooloz7@gmail.com">
            </div>
                
            <div class="ProfilePole">
              <div class="PassInputBlack"></div>
              <input type="password" name="NEW_PASSWORD" maxlength="50" placeholder="Новый пароль" value="" autocomplete="off" class="bx-auth-input">
            </div>
            <div class="ProfilePole">
              <div class="PassInputBlack"></div>
              <input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" placeholder="Подтверждение нового пароля" value="" autocomplete="off">
            </div>
                    </div>
                  </div>
        <div class="B"></div>
        <div class="ProfileSubmit">
          <div class="SaveInput"></div>
          <input type="submit" name="save" value="Сохранить">
        </div>
        <div class="B"></div>
        <div class="MessageProfile">
                    <input type="hidden" name="sessid" id="sessid" value="8a3104596afafb7d15c6c5dcecc027b2"></div>
      </div>
    </form>
      </div>
</div>';
} else {
echo '<div class="EroorAuth">Для доступа к данному разделу необходимо авторизоваться</div>';
}?>
<div class="B"></div>
</div>