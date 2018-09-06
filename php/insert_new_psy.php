<?php
require 'auth.inc';
        $query1 = "INSERT INTO psy_diary(complaint, anamnesis, recomendations, pills, patient_id, doctor_id) VALUES ('".$_POST['complaint']."', '".$_POST['anamnesis']."', '".$_POST['recomendations']."', '".$_POST['pills']."', '".$_GET['id']."', '".$_GET['id2']."');";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Запись психокорректора')";
        mysqli_query($link, $query1);


header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']."#psy");

?>
