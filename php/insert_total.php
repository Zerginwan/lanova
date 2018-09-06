<?php
require 'auth.inc';
if($_POST["sb_total"]){
	$query1 = "UPDATE docs SET total ='".$_POST["sb_total"]."' WHERE id = '".$_GET['id']."';";
	mysqli_query($link, $query1);
	$query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Характеристика')";
        mysqli_query($link, $query1);
}
header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']."#sb");
?>
