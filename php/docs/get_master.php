<?php
require '../auth.inc';
if($_POST["psy_login"]){

$auth_num_query = "SELECT id, pass, level, active FROM users WHERE login = '".$_POST["psy_login"]."'";
if ($result = mysqli_query($link, $auth_num_query)) {
        while ($row2 = mysqli_fetch_assoc($result)){
                $secret = $row2["pass"];
                $id = $row2["id"];
                $level = $row2["level"];
                $active = $row2["active"];
        }
}

if ($_POST["psy_password"] == "$secret" && $_POST["psy_password"] != "" && $active != "false" && $level == "8"){
        $_SESSION["psy_master"] = "true";
}
//print_r($_POST);
//print_r($_SESSION);
header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']."#psy");
}
  


if($_POST["med_login"]){

$auth_num_query = "SELECT id, pass, level, active FROM users WHERE login = '".$_POST["med_login"]."'";
if ($result = mysqli_query($link, $auth_num_query)) {
        while ($row2 = mysqli_fetch_assoc($result)){
                $secret = $row2["pass"];
                $id = $row2["id"];
                $level = $row2["level"];
                $active = $row2["active"];
        }
}

if ($_POST["med_password"] == "$secret" && $_POST["med_password"] != "" && $active != "false" && $level == "7"){
        $_SESSION["med_master"] = "true";
}

header("Location: http://lanova.open-s.info/docs.html?id=".$_GET['id']."#med"); 
}
?>
