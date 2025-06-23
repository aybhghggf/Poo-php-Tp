<?php
require_once 'db.php';
class User
{
    private $name;
    private $prenom;
    private $phone;
    private $email;
    private $password;
    private $avatar;
    public function __construct(string $name, string $prenom, int  $phone, string $email, string $password, string $avatar)
    {
        $this->name = $name;
        $this->prenom = $prenom;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->avatar = $avatar;
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
    public function getAvatar()
    {
        return $this->avatar;
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
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
    public function __toString()
    {
        return 'Nom:' . $this->name . ' Prenom:' . $this->prenom . ' Phone:' . $this->phone . ' Email:' . $this->email . ' Password:' . $this->password . ' Avatar:' . $this->avatar;
    }
    public static function create($Nom, $Prenom, $phone, $email, $password)
    {
        $pathImage = "anonyme"; // Default avatar
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users(Nom,Prenom,Email,Telephone,Pass,PathImage) VALUES (?,?,?,?,?,?)");
        $stmt->execute([$Nom, $Prenom, $email, $phone, $password, $pathImage]);
        header("Location: login.php");
        exit();
    }
    public static function Login($email, $password)
    {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['Pass'])) {
            session_start();
            $_SESSION['user'] = new User(
                $user['Nom'],
                $user['Prenom'],
                $user['Telephone'],
                $user['Email'],
                $user['Pass'],
                $user['PathImage']
            );
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid email or password";
        }
    }

    public static function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
    public static function updateProfile($name, $prenom, $phone, $email, $avatar, $password = null)
    {
        global $pdo;
        session_start();
        $user = $_SESSION['user'];
        if ($password) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET Nom = ?, Prenom = ?, Email = ?, Telephone = ?, Pass = ?, PathImage = ? WHERE Email = ?");
            $stmt->execute([$name, $prenom, $email, $phone, $password, $avatar, $user->getEmail()]);
        }
        else {
            $stmt = $pdo->prepare("UPDATE users SET Nom = ?, Prenom = ?, Email = ?, Telephone = ?, PathImage = ? WHERE Email = ?");
            $stmt->execute([$name, $prenom, $email, $phone, $avatar, $user->getEmail()]);
        }
        // Update the session user object
        $_SESSION['user'] = new User($name, $prenom, $phone, $email, $password ?? $user->getPassword(), $avatar);
        header("Location: profile.php");
        exit();
    }
}
