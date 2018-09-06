<?php
if ($_SESSION["level"] <  6 || $_SESSION["level"] == "9") {
//сортировка
if($_GET["asc"]){
$asc=$_GET["asc"];
}else{
$asc="DESC";
}

if($_GET["id"]){
	$asclink = $_SERVER['REQUEST_URI'].'&';
        if($_GET["do"] == "do"){
                $where = "WHERE changerid = '".$_GET["id"]."'";
        }elseif($_GET["do"] == "done"){
                $where = "WHERE changedid = '".$_GET["id"]."'";
	}
}else{
	$asclink = '?';
}

if($_GET["lab"]){
        $asclink = $_SERVER['REQUEST_URI'].'&';
        $where = "WHERE lab_num = '".$_GET["lab"]."'";
      
}else{
        $asclink = '?';
}         


if($asc == "DESC"){
$asc_link='<a class="left" href="'.$asclink.'asc=ASC"><i class="small material-icons">arrow_downward</i></a>';
}else{
$asc_link='<a class="left" href="'.$asclink.'asc=DESC"><i class="small material-icons">arrow_upward</i></a>';
}
//конец сортировки



$table = '<div><table class="striped highlight responsive-table">
		<thead>
			<tr>
				<th>'.$asc_link.'Время изменений</th>
				<th>Кто </th>
                                <th>Что сделал </th>
                                <th>UID Исследования</th>
			</tr>
		</thead>
		<tbody>

';

	$query = "SELECT DATE_ADD(timestamp, INTERVAL 482 YEAR) as timestamp, changerid, changedid, changes FROM  lab_log ".$where." ORDER BY timestamp ".$asc.";";
	    if ($result = mysqli_query($link, $query)) {
		while ($row = mysqli_fetch_assoc($result)) {
			$table .= '<tr><td>'.$row["timestamp"].'</td><td><a href="?do=do&id='.$row["changerid"].'">'.nameofid($row["changerid"]).'</a></td><td>'.$row["changes"].'</td><td><a href="tasks.html?task='.$row["changedid"].'">'.$row["changedid"].'</a></td></tr>';
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
