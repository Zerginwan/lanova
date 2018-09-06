<?php
require 'auth.inc';
if($_POST["psy_diagnose"]){
	$query1 = "UPDATE docs SET psy_diagnose ='".$_POST["psy_diagnose"]."' WHERE id = '".$_GET['id']."';";
	mysqli_query($link, $query1);
	$query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Диагноз')";
        mysqli_query($link, $query1);
	unset($_POST["psy_diagnose"]);
}
header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']."#psy");
?>
