<?php
require 'auth.inc';
if($_SESSION["level"] > '3'){
if($_GET["id"]){
        $query1 = "UPDATE lab SET removed_by = '".$_SESSION["auth_id"]."', removed_in = CURTIME(), state = 'removed' WHERE id = '".$_GET['id']."';";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO lab_log (changedid, changerid, changes, lab_num) VALUES ('".$_GET['id']."', '".$_SESSION['auth_id']."', 'отменил', '".labnum($_SESSION['auth_id'])."')";
        mysqli_query($link, $query1);
}
}
header("Location: http://lanova.open-s.info/lab.html?task_num=".$_GET['id']);
?>
