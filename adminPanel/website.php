<?php
include('query.php');
?>
<h1>hello user</h1>
<?php
if(isset($_SESSION['userEmail'])){
    ?>
<a href="weblogout.php">logout</a>
    <?php
}
else{
    ?>
<a href="signin.php">login</a>
    <?php
}
?>
