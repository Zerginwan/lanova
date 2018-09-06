<?php
        $med .= '</table>';

        $med = '<table><th>Время назначения</th><th>Назначенные лекарства</th>';

        $med_query = "SELECT DATE(timestamp) as date, HOUR(timestamp) as hour, MINUTE(timestamp) as minute, pills FROM med_diary WHERE patient_id ='".$_GET["id"]."' ORDER BY timestamp DESC";
        if($med_result = mysqli_query($link, $med_query)){
                while($med_row = mysqli_fetch_assoc($med_result)){
                        $med .= '<tr><td>'.$med_row["date"].' '.$med_row["hour"].':'.$med_row["minute"].'</td><td>'.$med_row["pills"].'</td></tr>';
                }
        }
        $med .= '</table>';
?>
