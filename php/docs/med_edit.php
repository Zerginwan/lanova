<?php
//уровень медика
        $med = ' 
        <div class="row">


        <form action="php/insert_blood.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form">

                <div class="col s2 left blue-text">Группа крови:</div>
                <div id="blood" class="col s4 left">
			<input type="text" name="blood" value="'.$row["blood"].'" onchange="$(\'#blood1\').removeClass(\'hide\'); $(\'#blood2\').removeClass(\'hide\');">
		          <button class="hide right btn-small btn-floating waves-effect waves-light green submit" type="submit" id="blood1">
		            <i class="material-icons">send</i>
          		  </button>
		          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="blood2">
		            <i class="material-icons">undo</i>
		          </button>
		</div>
         </form>
         <form action="php/insert_genetic.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form">

                <div class="col s2 left blue-text">Генетический код:</div>
                <div id="blood" class="col s4 left">
                        <input type="text" name="genetic" value="'.$row["genetic"].'" onchange="$(\'#genetic1\').removeClass(\'hide\'); $(\'#genetic2\').removeClass(\'hide\');">
                          <button class="hide right btn-small btn-floating waves-effect waves-light green submit" type="submit" id="genetic1">
                            <i class="material-icons">send</i>
                          </button>
                          <button class="hide right btn-small btn-floating  waves-effect waves-light deep-light-green darken-3" type="reset" id="genetic2">
                            <i class="material-icons">undo</i>
                          </button>
                </div>
         </form>

	</div>
        <div class="row">
        <form action="php/insert_med_diagnose.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form">

                <div class="col s3 left blue-text">Основной диагноз:</div>
                <div id="diagnose" class="col s12 left input-field"><textarea type="text" name="med_diagnose" class="materialize-textarea" onChange="$(\'#med_diagnose1\').removeClass(\'hide\'); $(\'#med_diagnose2\').removeClass(\'hide\');">'.$row["med_diagnose"].'</textarea></div>
		
        </div>
	  <button class="hide btn-small btn-floating right waves-effect waves-light green submit" type="submit" id="med_diagnose1">
	    <i class="material-icons">send</i>
	  </button>
          <button class="hide btn-small btn-floating right waves-effect waves-light deep-light-green darken-3" type="reset" id="med_diagnose2">
            <i class="material-icons">undo</i>
          </button>

	</form>
	<br><br>
	<div class="center">
		<button class="btn-large btn-floating waves-effect waves-light blue" onclick="$(\'#add_form\').removeClass(\'hide\'); $(this).addClass(\'hide\');">
			<i class="material-icons">add</i>
		</button>
	</div>
	
	<form action="php/insert_new_med.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form hide" id="add_form">
		  <div class="row">

		    
		      <div class="row">
		        <div class="input-field col s12 m8 offset-m2">
                          <label for="complaint">Жалоба</label>
		          <input id="complaint" class="materialize-textarea" name="complaint">
		        </div>
		      </div>
                      <div class="row">
                        <div class="input-field col s12 m8 offset-m2">
                          <input id="anamnesis" class="materialize-textarea" name="anamnesis">
                          <label for="anamnesis">Анамнез</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12 m8 offset-m2">
                          <input id="recomendations" class="materialize-textarea" name="recomendations">
                          <label for="recomendations">Рекомендации</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12 m8 offset-m2">
                          <input id="pills" class="materialize-textarea" name="pills">
                          <label for="pills">Лекарства</label>
                        </div>
                      </div>
          <button class="btn-small btn-floating right waves-effect waves-light blue submit" type="submit">
            <i class="material-icons">send</i>
          </button>
		  </div>
	</form>

';
        $med_query = "SELECT DATE(timestamp) as date, HOUR(timestamp) as hour, MINUTE(timestamp) as minute, complaint, anamnesis, recomendations, pills FROM med_diary WHERE patient_id ='".$_GET["id"]."' ORDER BY timestamp DESC";
        if($med_result = mysqli_query($link, $med_query)){
                while($med_row = mysqli_fetch_assoc($med_result)){
                        $med .= '
				<div class="row">
					<div class="card col s12 m8 offset-m2 blue darken-4 white-text">
						<div class="card-content">
							<span class="card-title right s1">'.$med_row["date"].' '.$med_row["hour"].':'.$med_row["minute"].'</span>
							<p class="s7">'.$med_row["complaint"].'</p>
							<br>
							<p>'.$med_row["anamnesis"].'</p>
						</div>
						<div class="card-action blue darken-3">
                                                        <p>'.$med_row["recomendations"].'</p>
							
                                                        <p class="right"><br>'.$med_row["pills"].'</p>
						</div>
					</div>

				</div>
				
			';
                }
        }
?>
