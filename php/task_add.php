<?php
require 'auth.inc';
if($_SESSION["level"] > '1'){
if($_POST["task"]){
        $query1 = "INSERT INTO lab  (task, comment, created_by, created_in, approved_in, state, lab_num, finished_in) VALUES ('".$_POST["task"]."', '".$_POST["comment"]."', '".$_SESSION["auth_id"]."', CURTIME(), CURTIME(), 'in_progress', '".labnum($_SESSION['auth_id'])."', DATE_ADD(NOW(), INTERVAL ".timeoftask($_POST['task'])." MINUTE) );";
        mysqli_query($link, $query1);

        $query1 = "SELECT id FROM lab ORDER BY id DESC LIMIT 1;";
        if($result = mysqli_query($link, $query1)){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
		}
	}
	if($_SESSION["level"] == '2'){
		$query1 = "UPDATE lab SET state = 'waiting', finished_in='NULL', approved_in='NULL' WHERE id = '".$id."';";
	        mysqli_query($link, $query1);
	}

        $query1 = "INSERT INTO lab_log (changedid, changerid, changes, lab_num) VALUES ('".$id."', '".$_SESSION['auth_id']."', 'создал', '".labnum($_SESSION['auth_id'])."')";
        mysqli_query($link, $query1);
}
}
header("Location: http://lanova.open-s.info/lab.html?task_num=".$id);
?>
