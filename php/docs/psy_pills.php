<?php
        $psy .= '</table>';

        $psy = '<table><th>Время назначения</th><th>Назначенные лекарства</th>';

        $psy_query = "SELECT DATE(timestamp) as date, HOUR(timestamp) as hour, MINUTE(timestamp) as minute, pills FROM psy_diary WHERE patient_id ='".$_GET["id"]."' ORDER BY timestamp DESC";
        if($psy_result = mysqli_query($link, $psy_query)){
                while($psy_row = mysqli_fetch_assoc($psy_result)){
                        $psy .= '<tr><td>'.$psy_row["date"].' '.$psy_row["hour"].':'.$psy_row["minute"].'</td><td>'.$psy_row["pills"].'</td></tr>';
                }
        }
        $psy .= '</table>';
?>
