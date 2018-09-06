<?php
session_set_cookie_params(86400);
//$sespath = session_save_path ('/var/www/html/sessions');
session_start(); //Запускаем сессии

global $link;
$link = mysqli_connect("localhost", "phpmyadmin", "kfyjdfyfdctulf", "lanova");
$secret = '';
/* проверка соединения */

if (!$_SESSION["auth_id"]){

if (mysqli_connect_errno()) {
    printf("Соединение не удалось: %s\n", mysqli_connect_error());
    exit();
}else{
        if (!mysqli_set_charset($link, "utf8")) {
        printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($link));
        exit();
        }
}

$auth_num_query = "SELECT id, pass, level, active FROM users WHERE login = '".$_POST['login']."'";
if ($result = mysqli_query($link, $auth_num_query)) {
        while ($row = mysqli_fetch_assoc($result)){
                $secret = $row['pass'];
		$id = $row['id'];
                $level = $row['level'];
		$active = $row['active'];
        }
}
if ($_POST['password'] == "$secret" && $_POST['password'] != '' && $active != "false"){
        $_SESSION["is_auth"] = true;
        $_SESSION["auth_id"] = $id;
	$_SESSION["level"] = $level;
	$auth_name_query = "SELECT first_name, last_name FROM docs WHERE id = '".$id."'";
	if ($result = mysqli_query($link, $auth_name_query)) {
        	while ($row = mysqli_fetch_assoc($result)){
			$name .= $row['first_name'];
			$name .= " ";
                        $name .= $row['last_name'];
                	$_SESSION["auth_name"] = $name;
        	}
	}
} elseif ($active == "false") {
	$pass_er = 'Пользователь не активен';
}elseif($_POST['password']) {
        $pass_er = 'Пароль не верный';
}


}

if($pass_er != ''){
	$error = '
		<div class="row center light-green-text"><h5>
		'.$pass_er.'
		</h5></div>
	';
	$pass_er = '';
}
if ($_SESSION["is_auth"] != "true"){
	$loginbutton = '<a class="waves-effect waves-light btn light-green darken-3" onclick="$(\'#login\').modal(\'open\');">Войти</a>';

}else{
$loginbutton .= '<a class="waves-effect waves-light btn light-green darken-3" href="php/logout.php">Выйти</a>';

	if ($_SESSION["level"] == 6 || $_SESSION["level"] == 9){
	$logbutton = '<li><a href="logs.html" class="breadcrumb"><i class="material-icons">history</i>Логи</a></li>';
        $logbutton_m = '<li>
<a href="logs.html" class="breadcrumb blue-grey-text"><i class="material-icons">history</i>Логи</a>
	</li>';  
	}


}
function levelofid($id){
	$level_query = "SELECT level FROM users WHERE id = '".$id."'";
        $link = mysqli_connect("localhost", "phpmyadmin", "kfyjdfyfdctulf", "lanova");     
	if ($result = mysqli_query($link, $level_query)) {
	        while ($row = mysqli_fetch_assoc($result)){
               		return $row['level'];
 	       }
	}
}

function nameoflevel($level){
        $level_query = "SELECT name FROM level WHERE id = '".$level."'";
	$link = mysqli_connect("localhost", "phpmyadmin", "kfyjdfyfdctulf", "lanova");
        if ($result6 = mysqli_query($link, $level_query)) {
                while ($row6 = mysqli_fetch_assoc($result6)){
                        return $row6['name'];
               }
        }

}

function nameofid($id){
        $name_query = "SELECT first_name, last_name FROM docs WHERE id = '".$id."'";
        $link = mysqli_connect("localhost", "phpmyadmin", "kfyjdfyfdctulf", "lanova");
        if ($result = mysqli_query($link, $name_query)) {
                while ($row = mysqli_fetch_assoc($result)){
                        return $row['first_name'].' '.$row['last_name'];
               }
        }
}

function nameoftask($task){
        $task_query = "SELECT task_name FROM tasks WHERE id = '".$task."'";
        $link = mysqli_connect("localhost", "phpmyadmin", "kfyjdfyfdctulf", "lanova");
        if ($result6 = mysqli_query($link, $task_query)) {
                while ($row6 = mysqli_fetch_assoc($result6)){
                        return $row6['task_name'];
               }
        }

}

function timeoftask($task){
        $task_query = "SELECT task_time FROM tasks WHERE id = '".$task."'";
        $link = mysqli_connect("localhost", "phpmyadmin", "kfyjdfyfdctulf", "lanova");
        if ($result6 = mysqli_query($link, $task_query)) {
                while ($row6 = mysqli_fetch_assoc($result6)){
                        return $row6['task_time'];
               }
        }

}   
function russtate($task){
	if($task == "finished"){return "Завершена";}
        if($task == "removed"){return "Отменена";}
        if($task == "waiting"){return "Ждет подтверждения";}
        if($task == "in_progress"){return "Выполняется";}
}   

function labnum($id){
        $labnum_query = "SELECT lab_num FROM docs WHERE id = '".$id."'";
        $link = mysqli_connect("localhost", "phpmyadmin", "kfyjdfyfdctulf", "lanova");
        if ($result6 = mysqli_query($link, $labnum_query)) {
                while ($row6 = mysqli_fetch_assoc($result6)){
                        return $row6['lab_num'];
               }
        }

} 
function timeofid($id){
        $labnum_query = "SELECT task FROM lab WHERE id = '".$id."'";
        $link = mysqli_connect("localhost", "phpmyadmin", "kfyjdfyfdctulf", "lanova");
        if ($result6 = mysqli_query($link, $labnum_query)) {
                while ($row6 = mysqli_fetch_assoc($result6)){      
			return	timeoftask($row6['task']);
		}
	}
}

?>

