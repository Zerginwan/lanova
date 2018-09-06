<?php
if (($_SESSION["is_auth"] == 'true' && $_SESSION["level"] > 1 && $_SESSION["level"] < 6) || $_SESSION["level"] == 9) {
$year='2000';
$month='09';
$day='08';
$hour='20';
$minute='45';
$second ='00';

//карта задачи

if(isset($_GET["task_num"])){
$query = "SELECT * FROM lab WHERE id='".$_GET["task_num"]."';";
if ($result = mysqli_query($link, $query)) {
                while ($row_t = mysqli_fetch_assoc($result)) {

$task_card= '
<div class="col s12" id="task_card">
	<div class="card z-depth-3 green darken-4 flow-text">
	<div class="card-content white-text">
		<div class="card-title grey-text text-lighten-2"><span class="left">Задача #'.$row_t["id"].'| '.nameoftask($row_t["task"]).'</span><span class="right">Статус: '.russtate($row_t["state"]).'</span></div><br>

    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#info">Сведения</a></li>
        <li class="tab"><a href="#comment">Поясняющая записка</a></li>
        <li class="tab"><a href="#result">Результат</a></li>
      </ul>
    </div>
    <div class="card-content">
      <div id="info" class="row">
	<div class="left col s12 m4 ">Поставил</div>       <div class="center col s12 m4">'.nameofid($row_t["created_by"]).'</div>        <div class="right col s12 m4"><span class="right">| '.$row_t["created_in"].'</span></div><br>';
if($row_t["approved_by"] != ' '){
 $task_card .='<div class="left col s12 m4 ">Подтвердил</div>       <div class="center col s12 m4">'.nameofid($row_t["approved_by"]).'</div>        <div class="right col s12 m4"><span class="right">| '.$row_t["approved_in"].'</span></div><br>';
}
if($row_t["removed_by"] != ' '){ 
 $task_card .= ' <div class="left col s12 m4 ">Отменил</div>       <div class="center col s12 m4">'.nameofid($row_t["removed_by"]).'</div>        <div class="right col s12 m4"><span class="right">| '.$row_t["removed_in"].'</span></div><br>';
}
 $task_card  .= '<div class="left col s6 ">Время выполнения</div>      <div class="right col s6"><span class="right">'.timeoftask($row_t["task"]).' минут</span></div><br>
	
      </div>
      <div id="comment">'.$row_t["comment"].'</div>';
if($row_t["state"] == "finished"){ 
 $task_card .= '     <div id="result">'.$row_t["result"].'</div></div></div></div></div>';
}else{
 $task_card .= '     <div id="result">Результат не найден</div></div></div></div></div>';
}


	}

}
}
//конец карты задачи



$query = "SELECT id, task_name FROM tasks;";
if ($result = mysqli_query($link, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {
                        $task_options .= '<option value="'.$row["id"].'">'.$row["task_name"].'</option>';
                }
}  

//add task button

$select_task = '
	<div class="col s12 m5 left" >
		<div id="task_button" class="center">
<a class="btn btn-large btn-flat waves-effect waves-light light-green darken-3 white-text" onclick="$(this).toggleClass(\'hide\'); $(\'#task_card\').toggleClass(\'hide\');"><i class="material-icons left">add</i>Добавить задачу</a>
		</div>
		<div id="task_card" class="hide card z-depth-3 light-grey lighten-1">
			<form method="post" action="php/task_add.php?id='.$_SESSION["auth_id"].'" id="create_task">


                  		<label for="select">Выберите тип задачи</label>
		                <div class="input-field card-content">
		                    <select name="task" id="select">
                		      <option value="" disabled selected></option>
		                        '.$task_options.'
                		    </select>
		                </div>
			
	                <div class="input-field card-content">
		                        <textarea type="text" name="comment" class="materialize-textarea flow-text" id="text"></textarea>
		                        <label for="text">Сопроводительная записка</label>    
		        </div>    			
			<div class="card-action input-field">
				<button class="btn btn-flat waves-effect waves-green light-grey lighten-1 right send" >Поставить задачу<i class="material-icons">eject</i></button><br>
			</div>

			</form>
		</div>
	</div>
';

//search card

$search_task='        <div class="col s12 m5 left" >
		 <div id="search" class="center">
		</div>
		<div class="card z-depth-3 light-grey lighten-2">
		<div class="row">
		<form method="get" action="lab.html" class="center col s12">
			<p>
			<span class="card-title">Информация по задаче</span>
			<div class="input-field inline">
				<input name="task_num" type="text" placeholder="UID задачи">
					<button type="submit" class="right btn btn-floating light-grey lighten-1 waves-effect waves-blue"><i class="material-icons">search</i></button>
			</div>
			</p>
			
		</form>
		</div>
		</div>
	</div>
';


//timer stop start
$query = "SELECT id, state, finished_in, NOW() as time FROM lab ORDER BY id DESC LIMIT 1";
if ($result = mysqli_query($link, $query)) {
        while ($row = mysqli_fetch_assoc($result)){
		if ($row["state"] = "in_progress" && $row["finished_in"] < $row["time"]){
			$query = "UPDATE lab SET state = 'finished' WHERE id = '".$row['id']."'";
			mysqli_query($link, $query);
			
		}
		
	}
}


//timer stop end
$query = "SELECT * FROM lab ORDER BY id DESC LIMIT 1";
if ($result = mysqli_query($link, $query)) {
        while ($row = mysqli_fetch_assoc($result)){


	if($row["state"] == 'waiting' || $row["state"] == "in_progress"){
		$select_task='';
	}

	if($row['finished_in'] != NULL){
	$date = strtotime($row['finished_in']);
        $year=date('Y', $date);
        $month=date('m', $date);
        $day=date('d', $date);
        $hour=date('H', $date);
        $minute=date('i', $date);
        $second =date('s', $date);
	}
	if($_SESSION["level"] > 3){ 
		$id = '<form method="get"><input type="submit" name="task_num" value="'.$row["id"].'"></form>';
	}else{
		$id = $row["id"];
	}

	if($_SESSION["level"] > 3){
        $approve_cancel = '<a class="btn btn-small btn-flat waves-effect waves-red white red-text"  href="php/task_remove.php?id='.$row["id"].'">Отменить<i class="material-icons left">cancel</i></a>';
        }
if($row["state"] == 'in_progress'){
	$current_task_title = '      <span class="card-title left">До завершения задачи: </span>        <div class="flow-text" id="time"> </div>  ';
}elseif($row["state"] == 'waiting'){
        $current_task_title = '      <span class="card-title left">Задача ждет подтверждения </span>  ';
        $approve_cancel .= '<a class="btn btn-small btn-flat waves-effect waves-light green right white-text" href="php/task_approve.php?id='.$row["id"].'">Подтвердить<i class="material-icons left">done</i></a>'; 
}elseif($row["state"] == 'finished'){
        $current_task_title = '      <span class="card-title left">Исследование завершено</span>  ';
        $approve_cancel = '';
}elseif($row["state"] == 'removed'){
        $current_task_title = '      <span class="card-title left">Исследование отменено</span>  ';
        $approve_cancel = '';
}
            

echo '
<div class="row">

<div class ="col s12 m7 right">
  <div class="card z-depth-4">
    <div class="card-content">
'.$current_task_title.'
        <div class="flow-text">
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a href="#test4">Тип задачи</a></li>
        <li class="tab"><a href="#test5">Постановщик задачи</a></li>
        <li class="tab"><a href="#test6">UID задачи</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="test4">'.nameoftask($row["task"]).'</div>
      <div id="test5">'.nameofid($row["created_by"]).'</div>
      <div id="test6">'.$id.'</div>
    </div>
    </div>
'.$approve_cancel.'
 </div>
</div>
</div>';

echo $select_task.'<br>';
echo $search_task.'<br>';
echo $task_card;

}



}

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
