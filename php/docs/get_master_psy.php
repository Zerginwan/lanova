<?php
if (!$_SESSION["psy_master"]){
$psy = '
    <div class="container">
	<br>
      <div class="row center">
        <button class="btn-large waves-effect waves-light light-green darken-4modal-trigger"  onclick="$(\'#psy_master\').modal(\'open\')">Подтверждение от специалиста</button>
      </div>
    </div>

<!-- Modals (pop-ups) -->
  <div id="psy_master" class="modal">
    <div class="modal-content">
    <center>
      <div class="section"></div>
      <h5 class="indigo-text">Введите ваши данные.</h5>
      <div class="section"></div>
      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form action="php/docs/get_master.php?id='.$_GET["id"].'" class="col s12" method="post">
            <div class="row">
              <div class="col s12">
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input type="text" name="psy_login" id="psy_login" />
                <label class="active" for="psy_login">Логин психокорректора</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input type="password" name="psy_password" id="psy_password" />
                <label for="psy_password">Пароль</label>
              </div>
            </div>

              <div class="row">
                <button type="submit" name="btn_psy" class="modal-close btn btn-small waves-effect light-green darken-4white=text">Подтвердить</button>
              </div>
          </form>
        </div>
      </div>
    </center>
    </div>
  </div>
<!-- End Modal -->
';
}else{
	require "psy_view.php";
}
?>
