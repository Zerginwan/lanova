<?php

//карта задачи

if($_GET["task"]){
$where ="WHERE id='".$_GET["task"]."'";
}
if($_GET["id"]){
$where = "WHERE created_by = '".$_GET["id"]."' OR  removed_by = '".$_GET["id"]."'  OR approved_by = '".$_GET["id"]."'";
}


if($_GET["lab"]){
$where =" WHERE lab_num='".$_GET["lab"]."'";
} 

$query = "SELECT * FROM lab ".$where." ORDER BY id DESC;";

if ($result = mysqli_query($link, $query)) {
                while ($row_t = mysqli_fetch_assoc($result)) {

$task_card.= '
<div class="col s12 m6" id="'.$row_t["id"].'">
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
	<div class="left col s12 m4 ">Поставил</div>       <a href="tasks.html?id='.$row_t["created_by"].'"><div class="center col s12 m4 white-text">'.nameofid($row_t["created_by"]).'</div></a>        <div class="right col s12 m4"><span class="right">| '.$row_t["created_in"].'</span></div><br>';
if($row_t["approved_by"] != ' '){
 $task_card .='<div class="left col s12 m4 ">Подтвердил</div>       <div class="center col s12 m4"><a class="white-text" href="tasks.html?id='.$row_t["approved_by"].'">'.nameofid($row_t["approved_by"]).'</a></div>        <div class="right col s12 m4"><span class="right">| '.$row_t["approved_in"].'</span></div><br>';
}
if($row_t["removed_by"] != ' '){ 
 $task_card .= ' <div class="left col s12 m4 ">Отменил</div>       <div class="center col s12 m4"><a class="white-text" href="tasks.html?id='.$row_t["removed_by"].'">'.nameofid($row_t["removed_by"]).'</a></div>        <div class="right col s12 m4"><span class="right">| '.$row_t["removed_in"].'</span></div><br>';
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

//конец карты задачи
echo $task_card;

?>
