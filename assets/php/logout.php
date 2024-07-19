<?php
require_once 'check_remember_me.php';
session_start();
session_unset();
session_destroy();
setcookie("t_user", "", time() - 1, "/");
header('Location: ../../login.html');
exit();
?>
