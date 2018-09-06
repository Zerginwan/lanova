<?php
require 'auth.inc';
if($_POST["med_diagnose"]){
	$query1 = "UPDATE docs SET med_diagnose ='".$_POST["med_diagnose"]."' WHERE id = '".$_GET['id']."';";
	mysqli_query($link, $query1);
	$query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Диагноз')";
        mysqli_query($link, $query1);
	unset($_POST["med_diagnose"]);
}
if($_POST["blood"]){
        $query1 = "UPDATE docs SET blood = '".$_POST["blood"]."' WHERE id = '".$_GET['id']."';";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Группа крови')";
        mysqli_query($link, $query1);
        unset($_POST["blood"]);
}
if($_POST["genetic"]){
        $query1 = "UPDATE docs SET genetic ='".$_POST["genetic"]."' WHERE id = '".$_GET['id']."';";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Генетический код')";
        mysqli_query($link, $query1);
        unset($_POST["genetic"]);
}



//header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']);
?>
