<?php
require 'auth.inc';
if($_POST["bio"]){
        $query1 = "UPDATE docs SET bio = '".$_POST["bio"]."' WHERE id = '".$_GET['id']."';";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Биография')";
        mysqli_query($link, $query1);
}

header("Location: http://lanova.open-s.info/change_user.html?id=".$_GET['id']);
?>
