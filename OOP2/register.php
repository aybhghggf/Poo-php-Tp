<?php 
if(isset($_POST['nom'])&& isset($_POST['prenom']) && isset($_POST['telephone']) && isset($_POST['email']) && isset($_POST['password'])) {
    require_once 'user.class.php';
    require_once 'db.php';
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    User::create($nom, $prenom, $telephone, $email, $password);
}

?>