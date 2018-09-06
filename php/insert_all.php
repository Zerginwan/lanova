<?php
require 'auth.inc';
if($_POST){

	$query2 = "INSERT INTO docs (first_name, last_name, birth, death, birth_place, position, lab_num, bio) VALUES ('".$_POST['fn']."', '".$_POST['ln']."', '".$_POST['birth']."', '".$_POST['death']."', '".$_POST['bp']."', '".$_POST['position']."', '".$_POST['lab_num']."', '".$_POST['bio']."')";
        mysqli_query($link, $query2);

        $query1 = "SELECT id FROM docs ORDER BY id DESC LIMIT 1";
        if($result = mysqli_query($link, $query1)){
                while($row = mysqli_fetch_assoc($result)){
                        $id = $row["id"];
                }
        }
  
	if($_POST["login"] != '')
	{
        $query = "INSERT INTO users (id, level, pass, date, login) VALUES ('".$id."', '".$_POST['level']."','".$_POST['pass']."', DATE_ADD(CURDATE(), INTERVAL 482 YEAR), '".$_POST['login']."')";
        mysqli_query($link, $query); 

        $query3 = "INSERT INTO log (changedid, changerid, changes) VALUES ('".$id."', '".$_GET['id']."', 'Создание аккаунта')";
        mysqli_query($link, $query3);
	}


        header("Location: http://lanova.open-s.info/docs.html?id=".$id);


}

?>
