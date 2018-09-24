<?php
if ($_SESSION["is_auth"] == 'true' && $_SESSION["level"] > 4) {
//сортировка
if($_GET["asc"]){
$asc=$_GET["asc"];
}else{
$asc="ASC";
}
if($_GET["sort"]){
$sort=$_GET["sort"];
}else{
$sort="id";
}
if($asc == "DESC"){
$asc_link='<a class="right" href="?asc=ASC&sort='.$sort.'"><i class="small material-icons">arrow_downward</i></a>';
}else{
$asc_link='<a class="right" href="?asc=DESC&sort='.$sort.'"><i class="small material-icons">arrow_upward</i></a>';
}
//конец сортировки

//безопасникам - логи
if($_SESSION["level"] == "6" || $_SESSION["level"] == "9"){
	$log="true";
}

$table = '<div><table class="striped highlight responsive-table">
		<thead>
			<tr>
                                <th>'.$asc_link.'</th>
				<th><a href="?sort=first_name">Имя</a></th>
                                <th><a href="?sort=last_name">Фамилия</a></th>
                                <th><a href="?sort=birth">Дата Рождения</a></th>
                                <th><a href="?sort=death">Дата Смерти</a></th>
                                <th><a href="?sort=birth_place">Место рождения</a></th>
                                <th><a href="?sort=position">Должность</a></th>
			</tr>
		</thead>
		<tbody>

';

	$query = "SELECT id,first_name, last_name, photo, birth, death, birth_place, position FROM docs ORDER BY ".$sort." ".$asc.";";
	    if ($result = mysqli_query($link, $query)) {
		while ($row = mysqli_fetch_assoc($result)) {
			$table .= '<tr onclick="window.location.href=\'/docs.html?id='.$row["id"].'\'; "><td><img width="250" class="responsive-img circle" src="'.$row["photo"].'"></td><td>'.$row["first_name"].'</td><td>'.$row["last_name"].'</td><td>'.$row["birth"].'</td><td>'.$row["death"].'</td><td>'.$row["birth_place"].'</td><td>'.$row["position"].'</td>';
			if($log == "true"){
				$table .= '<td><a href="logs.html?do=do&id='.$row["id"].'">активность</a></td><td><a href="logs.html?do=done&id='.$row["id"].'">изменения</a></td>';
			}
			$table .='</tr>';
		}
	    }

$table .= '</tbody></table></div>';
echo $table;

}else{
echo '
	<div class="container">
		<div class="row">
			<div class="col center"><h4>Нет доступа</h4></div>
		</div>
	</div>
';
}

?>
