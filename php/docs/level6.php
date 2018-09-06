<?php
if($_SESSION["auth_id"] != $_GET["id"] && levelofid($_GET["id"]) != "9"){
	require 'sb_edit.php';
	if($_SESSION["med_master"] == 'true'){
		require 'med_view.php';
	}else{
		require 'get_master_med.php';
	}
        if($_SESSION["psy_master"] == 'true'){
                require 'psy_view.php';
        }else{
                require 'get_master_psy.php';
        }      
}
?>
