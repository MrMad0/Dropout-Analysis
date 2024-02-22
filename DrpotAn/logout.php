<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: Ministry_login_1.php");
exit();
?>
