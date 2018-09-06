<?php
session_start();
session_destroy();
header("Location: http://lanova.open-s.info");
exit;
?>
