<?php session_start();
session_destroy();
header("Location: User_Login.php");
exit;
?>
