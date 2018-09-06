<?php
if($_SESSION["auth_id"] != $_GET["id"]){
	require 'psy_edit.php';
	require 'med_pills.php';
}
?>
