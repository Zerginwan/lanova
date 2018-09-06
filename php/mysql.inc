<?php
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
}

?>
