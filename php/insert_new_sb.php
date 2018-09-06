<?php
require 'auth.inc';
        $query1 = "INSERT INTO sb_diary(situation, result, subject_id, sb_id) VALUES ('".$_POST['situation']."', '".$_POST['result']."', '".$_GET['id']."', '".$_GET['id2']."');";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Запись в личном деле')";
        mysqli_query($link, $query1);

header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']."#sb");

?>
