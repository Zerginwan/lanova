<?php
//уровень медика
if($_SESSION["auth_id"] != $_GET["id"]){
        $psy = ' 
        <div class="row">

                <div class="col s3 left blue-text">Основной диагноз:</div>
                <div id="diagnose" class="col s12 left textarea flow-text" name="psy_diagnose">
			'.$row["psy_diagnose"].'
		</div>
		
        </div>

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
