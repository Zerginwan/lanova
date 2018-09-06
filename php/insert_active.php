<?php
require 'auth.inc';
if($_POST["active"]){
        $query1 = "UPDATE users SET active = 'true' WHERE id = '".$_GET['id']."';";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Активация аккаунта')";
        mysqli_query($link, $query1);
}else{
        $query1 = "UPDATE users SET active = 'false' WHERE id = '".$_GET['id']."';";
        mysqli_query($link, $query1);
        $query1 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$_GET['id']."', '".$_GET['id2']."', 'Деактивация аккаунта')";
        mysqli_query($link, $query1);

}

header("Location: http://lanova.open-s.info/change_user.html?id=".$_GET['id']);

?>
