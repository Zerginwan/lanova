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
                <span class="flow-text">'.$row["first_name"].' '.$row["last_name"].'</span>
                <img width=100% src="'.$row["photo"].'">
                <span class="flow-text">Дата рождения: '.$row["birth"].'</span>
                <span class="flow-text">'.$death_str.'</span>
                <span class="flow-text">'.$birth_place_str.'</span>
		<span class="flow-text">'.$position_str.'</span>
		<span class="flow-text">'.$lab_str.'</span>
        </div>
        <div class="col s8 right">
                <p class="flow-text">
                        '.$row["bio"].'
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
