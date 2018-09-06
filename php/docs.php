<?php
if ($_SESSION["is_auth"] == 'true' && $_SESSION["level"] > 1) {


$query = "SELECT * FROM docs WHERE id = '".$_GET['id']."';";
if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {



		if($row["death"]){
			$death_str='Умер: '.$row["death"];
		}
                if($row["birth_place"]){ 
                        $birth_place_str='Место рождения: '.$row["birth_place"];
                }
                if($row["position"]){
                        $position_str='Должность: '.$row["position"];
                }
                if($row["lab_num"]){
                        $lab_str='Лаборатория №'.$row["lab_num"];
                }

        $med = "<h5>Нет доступа</h5>";
        $psy = "<h5>Нет доступа</h5>";
        $sb = "<h5>Нет доступа</h5>";

//уровни доступа
if($_SESSION["level"] == 6){require 'docs/level6.php';}
if($_SESSION["level"] == 7){require 'docs/level7.php';}
if($_SESSION["level"] == 8){require 'docs/level8.php';}
if($_SESSION["level"] == 9){require 'docs/level9.php';}

//Рисуем табличку
/*
if($_SESSION["level"] != 6 && $_SESSION["level"] != 9){
	require 'docs/table.php';
}elseif($_SESSION["auth_id"] == $_GET["id"]){
        require 'docs/table.php';
}else{
	require 'docs/table_pro.php';
}
*/
require 'docs/table.php';
		}

}

}
?>
