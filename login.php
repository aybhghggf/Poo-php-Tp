<?php
require_once 'user.class.php'; 
require_once 'db.php';
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE Email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user) {
        // المستخدم كاين، جرب كلمة السر
        if(password_verify($password, $user['Password'])) {
            echo "✅ Login réussi";
        } else {
            echo "❌ Mot de passe incorrect";
        }
    } else {
        echo "❌ Email introuvable";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Se connecter</h2>

    <form action="login.php" method="POST" class="space-y-4">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" required class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
        <input type="password" name="password" id="password" required class="w-full mt-1 px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
        Se connecter
      </button>
    </form>

    <p class="text-sm text-center text-gray-600 mt-4">
      Vous n'avez pas de compte ? <a href="register.php" class="text-blue-600 hover:underline">Créer un compte</a>
    </p>
  </div>
</div>

</body>
</html>
