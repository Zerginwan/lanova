<?php
        $sb = ' 
        <div class="container">


        <div class="row">
        <form action="php/insert_total.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form">

                <div class="col s3 left blue-text">Характеристика:</div>
                <div id="total" class="col s12 left input-field"><textarea class="materialize-textarea" type="text" name="sb_total" onchange="$(\'#sb_total1\').removeClass(\'hide\'); $(\'#sb_total2\').removeClass(\'hide\');">'.$row["total"].'</textarea></div>
		
        </div>
	  <button class="hide btn-small btn-floating right waves-effect waves-light green submit" type="submit" id="sb_total1">
	    <i class="material-icons">send</i>
	  </button>
          <button class="hide btn-small btn-floating right waves-effect waves-light deep-light-green darken-3" type="reset" id="sb_total2">
            <i class="material-icons">undo</i>
          </button>

	</form>
	<br><br>
	<div class="center">
		<button class="btn-large btn-floating waves-effect waves-light blue" onclick="$(\'#add_form\').removeClass(\'hide\'); $(this).addClass(\'hide\');">
			<i class="material-icons">add</i>
		</button>
	</div>
	
	<form action="php/insert_new_sb.php?id='.$_GET["id"].'&id2='.$_SESSION["auth_id"].'" method="post" class="form hide" id="add_form">
		  <div class="row">

		    
                      <div class="row">
                        <div class="input-field col s12 m8 offset-m2">
                          <input id="situation" class="materialize-textarea" name="situation">
                          <label for="situation">Происшествие</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="input-field col s12 m8 offset-m2">
                          <input id="result" class="materialize-textarea" name="result">
                          <label for="result">Предпринятые меры</label>
                        </div>
                      </div>
          <button class="btn-small btn-floating right waves-effect waves-light blue submit" type="submit">
            <i class="material-icons">send</i>
          </button>
		  </div>
	</form>

';
        $sb_query = "SELECT DATE(timestamp) as date, HOUR(timestamp) as hour, MINUTE(timestamp) as minute, situation, result FROM sb_diary WHERE subject_id ='".$_GET["id"]."' ORDER BY timestamp DESC";
        if($sb_result = mysqli_query($link, $sb_query)){
                while($sb_row = mysqli_fetch_assoc($sb_result)){
                        $sb .= '
				<div class="row">
					<div class="card col s12 m8 offset-m2 blue darken-4 white-text">
						<div class="card-content">
							<span class="card-title right s1">'.$sb_row["date"].' '.$sb_row["hour"].':'.$sb_row["minute"].'</span>
							<p>'.$sb_row["situation"].'</p>
						</div>
						<div class="card-action blue darken-3">
                                                        <p class="right"><br>'.$sb_row["result"].'</p>
						</div>
					</div>

				</div>
				
			';
                }
        }

?>
