<?php
session_start();
include('adminPanel/dbcon.php');
if(isset($_POST['login'])){
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];
    $query = $pdo->prepare('select * from users where email = :uEmail AND password = :uPassword ');
    $query->bindParam('uEmail',$userEmail);
    $query->bindParam('uPassword',$userPassword);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
//      print_r($user);
    if($user['role_id'] == 1){
            $_SESSION['adminEmail'] = $user['email'];
            $_SESSION['adminName'] = $user['name'];
            $_SESSION['adminId'] = $user['id'];
            echo "<script>alert('login successfully');
            location.assign('adminPanel/index.php')</script>";
    }
    else if($user['role_id'] == 2){
                        $_SESSION['userId'] = $user['id'];
                        $_SESSION['userEmail'] = $user['email'];
                        $_SESSION['userName'] = $user['name'];
                        echo "<script>alert('login successfully');
                        location.assign('index.php')</script>";
    }
    else{
        echo "<script>alert('invalid username or password');
                        location.assign('index.php')</script>";
    }
}

?>