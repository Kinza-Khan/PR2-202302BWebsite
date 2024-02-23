<?php
include('query.php');
unset($_SESSION['userEmail']);
echo "<script>location.assign('index.php')</script>";
?>