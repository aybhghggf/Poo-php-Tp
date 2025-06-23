<?php
require_once 'db.php';
class User
{
    private $name;
    private $prenom;
    private $phone;
    private $email;
    private $password;
    public function __construct(string $name, string $prenom, int  $phone, string $email, string $password)
    {
        $this->name = $name;
        $this->prenom = $prenom;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function __toString()
    {
        return 'Nom:' . $this->name . ' Prenom:' . $this->prenom . ' Phone:' . $this->phone . ' Email:' . $this->email . ' Password:' . $this->password;
    }
    public static function create($Nom, $Prenom, $phone, $email, $password)
    {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users(Nom,Prenom,Email,Telephone,Password) VALUES (?,?,?,?,?)");
        $stmt->execute([$Nom, $Prenom, $email, $phone, $password]);
    }
public static function Login($email, $password)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id_user'] = $user['id'];
        $_SESSION['user'] = true;
        $_SESSION['username'] = $user['name'];
        header('Location: index.php?message=login');
        exit();
    } else {
        header('Location: login.php?message=error');
        exit();
    }
}
}
