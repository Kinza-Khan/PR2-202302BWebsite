<?php
session_start();
// session_unset();
unset($_SESSION['userEmail']);
echo "<script>
location.assign('signin.php')</script>";
?>