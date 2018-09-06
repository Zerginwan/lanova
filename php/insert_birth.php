<?php
require 'auth.inc';
if($_POST["birth"]){
        $query1 = "UPDATE docs SET birth = '".$_POST["fn"]."' WHERE id = '".$_GET['id']."';";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Дата рождения')";
        mysqli_query($link, $query1);
}

header("Location: http://lanova.open-s.info/change_user.html?id=".$_GET['id']);

?>
