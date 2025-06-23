<?php 
    require_once 'user.class.php';

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['avatar'])) {
    $name = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $avatar = $_POST['avatar'];
    if(isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    }
    User::updateProfile($name, $prenom, $phone, $email, $avatar, isset($password) ? $password : null);
}else {
    echo "<script>alert('Please fill all fields');</script>";
}

?>