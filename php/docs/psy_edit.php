<?php
//уровень медика
if($_SESSION["auth_id"] != $_GET["id"]){
        $psy = ' 
        <div class="row">
        <form action="php/insert_psy_diagnose.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form">

                <div class="col s3 left blue-text">Основной диагноз:</div>
                <div id="diagnose" class="col s12 left input-field"><textarea type="text" class="materialize-textarea" name="psy_diagnose" onchange="$(\'#psy_diagnose1\').removeClass(\'hide\'); $(\'#psy_diagnose2\').removeClass(\'hide\');">'.$row["psy_diagnose"].'</textarea></div>
		
        </div>
	  <button class="hide btn-small btn-floating right waves-effect waves-light green submit" type="submit" id="psy_diagnose1">
	    <i class="material-icons">send</i>
	  </button>
          <button class="hide btn-small btn-floating right waves-effect waves-light deep-light-green darken-3" type="reset" id="psy_diagnose2">
            <i class="material-icons">undo</i>
          </button>

	</form>
	<br><br>
	<div class="center">
		<button class="btn-large btn-floating waves-effect waves-light blue" onclick="$(\'#add_form\').removeClass(\'hide\'); $(this).addClass(\'hide\');">
			<i class="material-icons">add</i>
		</button>
	</div>
	
	<form action="php/insert_new_psy.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form hide" id="add_form">
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
        $psy_query = "SELECT DATE(timestamp) as date, HOUR(timestamp) as hour, MINUTE(timestamp) as minute, complaint, anamnesis, recomendations, pills FROM psy_diary WHERE patient_id ='".$_GET["id"]."' ORDER BY timestamp DESC";
        if($psy_result = mysqli_query($link, $psy_query)){
                while($psy_row = mysqli_fetch_assoc($psy_result)){
                        $psy .= '
				<div class="row">
					<div class="card col s12 m8 offset-m2 blue darken-4 white-text">
						<div class="card-content">
							<span class="card-title right s1">'.$psy_row["date"].' '.$psy_row["hour"].':'.$psy_row["minute"].'</span>
							<p class="s7">'.$psy_row["complaint"].'</p>
							<br>
							<p>'.$psy_row["anamnesis"].'</p>
						</div>
						<div class="card-action blue darken-3">
                                                        <p>'.$psy_row["recomendations"].'</p>
							
                                                        <p class="right"><br>'.$psy_row["pills"].'</p>
						</div>
					</div>

				</div>
				
			';
                }
        }

}
?>
