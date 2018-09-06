<?php
require 'auth.inc';
if($_POST["genetic"]){
        $query1 = "UPDATE docs SET genetic ='".$_POST["genetic"]."' WHERE id = '".$_GET['id']."';";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Генетический код')";
        mysqli_query($link, $query1);
}


header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']."#med");

?>
