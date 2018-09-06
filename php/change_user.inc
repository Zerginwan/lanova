<?php
if($_SESSION["level"] == "6" || $_SESSION["level"] == "9"){

$query = "SELECT * FROM level WHERE id < '9' ;";
if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {
			$level_options .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
		}
}

$query = "SELECT level, active FROM users WHERE id = '".$_GET['id']."';";
if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {
			$level = $row['level'];
			$active = $row['active'];
		}
}

if ($active == 'true'){
	$checked='checked';
}

$query = "SELECT * FROM docs WHERE id = '".$_GET['id']."';";
if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) { 

$level_name=nameoflevel($level);
                                                        


$table = '
  <div class="row">
    <div id="bio" class="col s12">
        <div class="row">
        <div class="col s4 left">
	<br>
		<form action="php/insert_fn.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12">
                        <label>Имя: </label>

			<input type="text" name="fn" value="'.$row["first_name"].'" onchange="$(\'#fn1\').removeClass(\'hide\'); $(\'#fn2\').removeClass(\'hide\');">
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="fn1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="fn2">
                            <i class="material-icons">undo</i>
                          </button>
		</form>
                <form action="php/insert_ln.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12">
                        <label>Фамилия: </label>

                        <input type="text" name="ln" value="'.$row["last_name"].'" onchange="$(\'#ln1\').removeClass(\'hide\'); $(\'#ln2\').removeClass(\'hide\');">
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="ln1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="ln2">
                            <i class="material-icons">undo</i>
                          </button>
                </form>



               <form action="php/insert_birth.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12 m6">
                        <label>Дата рождения: </label>
			<div class="input-field">
                        <input type="text" class="datepicker" name="birth" value="'.$row["birth"].'" onchange="$(\'#birth1\').removeClass(\'hide\'); $(\'#birth2\').removeClass(\'hide\');">
			</div>
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="birth1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="birth2">
                            <i class="material-icons">undo</i>
                          </button>
                </form>    
                <form action="php/insert_death.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12 m6">
			<label>Дата смерти: </label>
                        <div class="input-field">
                        <input type="text" class="datepicker" name="death" value="'.$row["death"].'" onchange="$(\'#death1\').removeClass(\'hide\'); $(\'#death2\').removeClass(\'hide\');">
			</div>
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="death1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="death2">
                            <i class="material-icons">undo</i>
                          </button>
                </form>
                <form action="php/insert_bp.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12">
			<label>Место рождения:</label>
                        <input type="text" name="bp" value="'.$row["birth_place"].'" onchange="$(\'#bp1\').removeClass(\'hide\'); $(\'#bp2\').removeClass(\'hide\');">
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="bp1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="bp2">
                            <i class="material-icons">undo</i>
                          </button>
                </form>

                <form action="php/insert_position.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12">
                        <label>Должность:</label>
                        <input type="text" name="position" value="'.$row["position"].'" onchange="$(\'#position1\').removeClass(\'hide\'); $(\'#position2\').removeClass(\'hide\');">
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="position1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="position2">
                            <i class="material-icons">undo</i>
                          </button>
                </form>

                <form action="php/insert_level.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12">
                    <label for="select" class="active">Уровень доступа</label>
		  <div class="col s12">
		    <select id="select" onchange="$(\'#level1\').removeClass(\'hide\');">
                      <option value="'.nameoflevel(levelofid($row['id'])).'" disabled selected>'.$level_name.'</option> 
			'.$level_options.'
		    </select>
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="level1">
                            <i class="material-icons">send</i>
                          </button>

		  </div>
		</form>

                <form action="php/insert_pass.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12"> 
                  <div class="input-field">         
                        <input type="password" name="bp" value="" onchange="$(\'#pass1\').removeClass(\'hide\'); $(\'#pass2\').removeClass(\'hide\');">
			<label>Сбросить пароль</label>
                          <button class="right hide send btn-small btn-floating waves-effect waves-light green" type="submit" id="pass1">
                            <i class="material-icons">send</i>
                          </button>


		</div>
                </form>

                <form action="php/insert_lab_num.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12">
                        <label>Лаборатория №</label>

                        <input type="number" name="lab_num" value="'.$row["lab_num"].'" onchange="$(\'#lab_num1\').removeClass(\'hide\'); $(\'#lab_num2\').removeClass(\'hide\');">
                          <button class="hide send right btn-small btn-floating waves-effect waves-light green" type="submit" id="lab_num1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="lab_num2">
                            <i class="material-icons">undo</i>
                          </button>
                </form>  

		<div class="switch">
                <form action="php/insert_active.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form col s12">
		
                        <label><h5>Аккаунт активен</h5>
			<input type="checkbox" name="active" onChange="this.form.submit()" '.$checked.'/>
			<span class="lever"></span> 
			</label>

                </form>
		</div>
        </div>
        <div class="col s8 right input-field">
                <p>
                <form action="php/insert_bio.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form">
		<label for="bio">Биография</label>
                        <textarea type="text" id="bio" name="bio" class="materialize-textarea" onchange="$(\'#bio1\').removeClass(\'hide\'); $(\'#bio2\').removeClass(\'hide\');">'.$row["bio"].'</textarea>
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
  </div>
';
echo $table;

	}
}
}
?>
