<?php
if($_SESSION["auth_id"] != $_GET["id"]){
        $med = ' 
        <div class="row">

                <div class="col s3 left blue-text">Основной диагноз:</div>
                <div id="diagnose" class="col s12 left textarea flow-text" name="med_diagnose">
			'.$row["med_diagnose"].'
		</div>
		
        </div>

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

}
?>
