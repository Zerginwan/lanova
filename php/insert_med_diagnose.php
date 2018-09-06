<?php
require 'auth.inc';
if($_POST["med_diagnose"]){
	$query1 = "UPDATE docs SET med_diagnose ='".$_POST["med_diagnose"]."' WHERE id = '".$_GET['id']."';";
	mysqli_query($link, $query1);
	$query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Основной диагноз')";
        mysqli_query($link, $query1);
}
header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']."#med");
?>
