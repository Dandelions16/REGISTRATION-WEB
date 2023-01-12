<?php
session_start();
unset($_SESSION['sesi']);
session_destroy();
header("Location:login.php");
?>