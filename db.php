<?php
$host= "localhost";
$dbname= "oop_1";
$username= "root";
$password= "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (\Throwable $th) {
    echo 'database makhdamach';
}
function authentifikation($email=null,$password=null){
    global $pdo;
    $stmt= $pdo->prepare("SELECT * FROM users");
    $stmt->execute();
    $user= $stmt->fetch();
    if($user['Email']==$email){
        header("location:index.php");
    }else{
        echo 'madztich';
    }
}
?>