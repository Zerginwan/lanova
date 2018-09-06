<?php
if($_SESSION["level"] == "6" || $_SESSION["level"] == "9"){


$query = "SELECT * FROM level WHERE id < '9' ;";
if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {
                        $level_options .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                }
}                                                        


$table = '
  <div class="row">
    <div id="bio" class="col s12">
    <form action="php/insert_all.php?id2='.$_SESSION["auth_id"].'" method="post" class="form col s12">    
        <div class="row">
        <div class="col s12 l4 left">
                <div class="input-field col s12">         
			<label>Имя</label>
			<input type="text" name="fn" value="" onchange="$(\'#fn1\').removeClass(\'hide\'); $(\'#fn2\').removeClass(\'hide\');">
                </div>
                <div class="input-field col s12">         
			<label>Фамилия</label>
                        <input type="text" name="ln" value="" onchange="$(\'#ln1\').removeClass(\'hide\'); $(\'#ln2\').removeClass(\'hide\');">
                </div>
                <div class="input-field col s12">         
                        <label>Дата рождения: </label> 
                        <input type="text" name="birth" class="datepicker" id="birth" value="01-01-2480">
                </div>
                <div class="input-field col s12">       
                        <label>Дата смерти: </label>
                        <input type="text" class="datepicker" name="death" id="death">
                </div>
                <div class="input-field col s12">         
			<label>Место рождения:</label>
                        <input type="text" name="bp" value="" >
                </div>
                <div class="input-field col s12">
                        <label>Должность: </label>
                        <input type="text" name="position" value="" >
                </div>
                <div class="input-field col s12">
                        <label>Лаборатория № </label>
                        <input type="number" name="lab_num" value="" >
                </div>            

                    <label for="select">Уровень доступа</label>
		  <div class="input-field col s12">
		    <select name="level"  id="select">
                      <option value="" disabled selected></option> 
			'.$level_options.'
		    </select>
		  </div>
		<div class="input-field col s12">
                        <label>Логин</label>
                        <input type="text" name="login" value="">  
		</div>
                  <div class="input-field col s12">         
                        <input type="password" name="bp" value="" >
			<label>Пароль</label>
		</div>

        </div>
        <div class="col s12 l8 right input-field">
        <label>Биография</label>         
                <p>
                        <textarea type="text" name="bio" class="materialize-textarea" ></textarea>
                </p>
        </div>
        </div>
	
	<div class="col s12 m8 l4 offset-m2 offset-l4 center input-field">
		<button type="submit" class="btn btn-large blue darken-2 white-text wave-effect">Отправить данные<i class="right material-icons">send</i></button>
	</div>
    </form>
    </div>
  </div>
';
echo $table;

}
?>
