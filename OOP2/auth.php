<?php 
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    require_once 'user.class.php';
    User::login($email, $password);
}


?>