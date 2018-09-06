<?php
$table = '
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#bio">Общая информация</a></li>
        <li class="tab col s3"><a href="#med">Страница медика</a></li>
        <li class="tab col s3"><a href="#psy">Страница психокорректора</a></li>
        <li class="tab col s3"><a href="#sb">Страница СБ</a></li>
      </ul>
    </div>
    <div id="bio" class="col s12">
        <div class="row">
        <div class="col s4 left">
		<form action="php/insert_fn.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s6">
			<input type="text" name="fn" value="'.$row["first_name"].'" onchange="$(\'#fn1\').removeClass(\'hide\'); $(\'#fn2\').removeClass(\'hide\');">
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="fn1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="fn2">
                            <i class="material-icons">undo</i>
                          </button>
		</form>
                <form action="php/insert_ln.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s6">
                        <input type="text" name="ln" value="'.$row["last_name"].'" onchange="$(\'#ln1\').removeClass(\'hide\'); $(\'#ln2\').removeClass(\'hide\');">
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="ln1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="ln2">
                            <i class="material-icons">undo</i>
                          </button>
                </form>



                <img width=100% src="'.$row["photo"].'">
                <h5>Дата рождения: '.$row["birth"].'</h5>
                '.$death_str.'
                '.$birth_place_str.'
        </div>
        <div class="col s8 right input-field">
                <p>
                <form action="php/insert_bio.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form">
                        <textarea type="text" name="bio" class="materialize-textarea" onchange="$(\'#bio1\').removeClass(\'hide\'); $(\'#bio2\').removeClass(\'hide\');">'.$row["bio"].'</textarea>
                          <button class="hide right send btn-small btn-floating waves-effect waves-light green" type="submit" id="bio1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="bio2">
                            <i class="material-icons">undo</i>
                          </button>
                </form>
                </p>
        </div>
        </div>
    </div>
    <div id="med" class="col s12">'.$med.'</div>
    <div id="psy" class="col s12">'.$psy.'</div>
    <div id="sb" class="col s12">'.$sb.'</div>
  </div>
';
echo $table;
?>
